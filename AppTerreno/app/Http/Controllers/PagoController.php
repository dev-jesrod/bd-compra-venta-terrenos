<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Terreno;
use App\Models\Transaccion;
use App\Models\Cuenta;
use App\Models\DatoCliente;
use App\Models\DatoVendedor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PagoController extends Controller
{
    /**
     * Muestra el formato de pago para un terreno.
     */
    public function show($id)
    {
        try {
            $terreno = Terreno::findOrFail($id);

            if ($terreno->estado !== 'DISPONIBLE') {
                return redirect()->route('terrenos.index')->with('error', 'El terreno ya no está disponible para reserva.');
            }

            // Cálculos del desglose financiero
            $landPrice = (float) $terreno->precio;
            $adminFee = 1500.00; // Cargo administrativo fijo
            $iva = $landPrice * 0.16; // 16% de IVA sobre el valor del terreno
            $total = $landPrice + $adminFee + $iva;

            return view('formato-pago', [
                'terreno' => $terreno,
                'logo_src' => asset('public/resources/logo.png'),
                'company_name' => 'Maz Terrenos',
                'hero_image' => !empty($terreno->imagenes) ? $terreno->imagenes[0] : 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=800&h=600&fit=crop',
                'property_title' => $terreno->nombre ?? 'Lote sin Nombre',
                'property_subtitle' => $terreno->descripcion,
                'land_price' => number_format($landPrice, 2, '.', ','),
                'admin_fee' => number_format($adminFee, 2, '.', ','),
                'iva' => number_format($iva, 2, '.', ','),
                'total' => number_format($total, 2, '.', ','),
                'payment_title' => 'Reserva tu Terreno',
                'payment_subtitle' => 'Completa tu información de pago para asegurar la propiedad.',
                'card_label' => 'Tarjeta de Crédito / Débito',
                'transfer_label' => 'Transferencia Bancaria SPEI',
                'confirm_text' => 'Confirmar y Pagar Reserva',
                'terms_text' => 'Al confirmar el pago, aceptas los términos y condiciones de Maz Terrenos.',
                'year' => date('Y'),
            ]);
        } catch (\Exception $e) {
            Log::error('Error al mostrar formato de pago: ' . $e->getMessage());
            return redirect()->route('terrenos.index')->with('error', 'Ocurrió un error al cargar el formato de pago.');
        }
    }

    /**
     * Procesa la transacción de pago de forma segura y concurrente.
     */
    public function process(Request $request, $id)
    {
        $request->validate([
            'metodoPago' => 'required|in:EFECTIVO,TRANSFERENCIA',
        ]);

        try {
            $user = Auth::user();

            // Buscar o crear perfil de DatoCliente para el usuario logueado
            $cliente = DatoCliente::firstOrCreate(
                ['idUsuario' => $user->idUsuario]
            );

            // Bloquear la transacción usando DB::transaction y lockForUpdate para evitar doble venta
            $transaccion = DB::transaction(function () use ($id, $cliente, $request, $user) {
                // Bloqueo pesimista lockForUpdate en InnoDB
                $terreno = Terreno::lockForUpdate()->findOrFail($id);

                if ($terreno->estado !== 'DISPONIBLE') {
                    throw new \Exception('Este terreno ya ha sido reservado o vendido por otro usuario.');
                }

                // Obtener el vendedor del terreno
                $vendedorUsuario = $terreno->usuario; // Usuario dueño del terreno
                if (!$vendedorUsuario) {
                    throw new \Exception('El terreno no tiene un vendedor asignado.');
                }

                $vendedor = DatoVendedor::where('idUsuario', $vendedorUsuario->idUsuario)->first();
                if (!$vendedor) {
                    throw new \Exception('El perfil de vendedor para esta propiedad no está configurado.');
                }

                // Cálculos financieros
                $landPrice = (float) $terreno->price ?? (float) $terreno->precio;
                $adminFee = 1500.00;
                $iva = $landPrice * 0.16;
                $total = $landPrice + $adminFee + $iva;

                // Cálculo de comisión (máximo 20% sobre el precio de venta)
                $utilidadPorcentaje = min((float) $vendedor->utilidad, 20.0);
                if ($utilidadPorcentaje <= 0) {
                    $utilidadPorcentaje = 20.0; // Por defecto 20% si no está definido
                }
                $comisionTotal = $landPrice * ($utilidadPorcentaje / 100.0);
                $comisionApp = $comisionTotal * 0.05; // 5% de la comisión para la aplicación
                $comisionVendedor = $comisionTotal - $comisionApp; // Resto para el vendedor

                // Crear o actualizar la cuenta entre cliente y vendedor
                $cuenta = Cuenta::firstOrCreate(
                    [
                        'idCliente' => $cliente->idCliente,
                        'idVendedor' => $vendedor->idVendedor
                    ],
                    ['saldo' => 0.0]
                );
                $cuenta->saldo += $comisionVendedor;
                $cuenta->save();

                // Cambiar el estado del terreno a RESERVADO
                $terreno->estado = 'RESERVADO';
                $terreno->fechaVenta = date('Y-m-d');
                $terreno->save();

                // Crear el registro de la transacción
                return Transaccion::create([
                    'idUsuario' => $user->idUsuario,
                    'idTerreno' => $terreno->idTerreno,
                    'idCuenta' => $cuenta->idCuenta,
                    'metodoPago' => $request->metodoPago,
                    'estadoPago' => 'COMPLETADO',
                    'monto' => $total,
                    'fechaTransaccion' => date('Y-m-d')
                ]);
            });

            return redirect()->route('comprobante.pago', $transaccion->idTransaccion)
                ->with('success', '¡Pago procesado con éxito! Tu terreno ha sido reservado.');

        } catch (\Exception $e) {
            Log::error('Error en el proceso de pago seguro: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error al procesar el pago: ' . $e->getMessage());
        }
    }

    /**
     * Muestra el comprobante de pago del terreno en un diseño limpio listo para imprimir (window.print).
     */
    public function comprobante($idTransaccion)
    {
        try {
            $transaccion = Transaccion::with(['terreno', 'usuario', 'cuenta.vendedor.usuario'])->findOrFail($idTransaccion);

            return view('comprobante-pago', [
                'transaccion' => $transaccion,
                'terreno' => $transaccion->terreno,
                'comprador' => $transaccion->usuario,
                'vendedor' => $transaccion->cuenta->vendedor->usuario,
                'year' => date('Y')
            ]);
        } catch (\Exception $e) {
            Log::error('Error al generar comprobante de pago: ' . $e->getMessage());
            return redirect()->route('terrenos.index')->with('error', 'No se pudo generar el comprobante de pago.');
        }
    }
}
