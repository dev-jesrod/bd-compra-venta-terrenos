<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Terreno;
use App\Models\VisitaTerreno;
use Illuminate\Support\Facades\Log;
use Illuminate\Pagination\LengthAwarePaginator;

class TerrenoController extends Controller
{
    /**
     * Muestra el catálogo de terrenos con filtros, búsqueda y paginación.
     * Requiere autenticación.
     */
    public function index(Request $request)
    {
        try {
            $query = Terreno::with('usuario.vendedor.documentos')
                ->where('estado_verificacion', 'APROBADO')
                ->where('estado', 'DISPONIBLE');

            // Filtro por nombre 
            if ($request->filled('busqueda')) {
                $busqueda = $request->busqueda;
                $query->where(function ($q) use ($busqueda) {
                    $q->where('nombre', 'like', "%{$busqueda}%")
                      ->orWhere('ubicacion', 'like', "%{$busqueda}%")
                      ->orWhere('descripcion', 'like', "%{$busqueda}%");
                });
            }

            // Filtro por ubicación
            if ($request->filled('ubicacion')) {
                $query->where('ubicacion', 'like', '%' . $request->ubicacion . '%');
            }

            // Filtro por estado
            if ($request->filled('estado')) {
                $query->where('estado', $request->estado);
            }

            // Filtro por zonificación
            if ($request->filled('zonificacion')) {
                $query->where('zonificacion', $request->zonificacion);
            }

            // Precio mínimo
            if ($request->filled('precio_min')) {
                $query->where('precio', '>=', $request->precio_min);
            }

            // Precio máximo
            if ($request->filled('precio_max')) {
                $query->where('precio', '<=', $request->precio_max);
            }

            // Ordenar por más recientes
            $terrenos = $query->latest()->paginate(12);

            return view('terrenos.index', compact('terrenos'));

        } catch (\Exception $e) {
            Log::error('Error al cargar el catálogo de terrenos: ' . $e->getMessage());
            return view('terrenos.index', ['terrenos' => new LengthAwarePaginator([], 0, 12)]);
        }
    }

    /**
     * Muestra el detalle de un terreno específico.
     * Requiere autenticación.
     */
    public function show(string $id)
    {
        try {
            $terreno = Terreno::with('usuario.vendedor.documentos')->findOrFail($id);

            VisitaTerreno::create([
                'idTerreno' => $terreno->idTerreno,
                'idUsuario' => auth()->id(),
            ]);

            return view('detalles-terreno', compact('terreno'));
        } catch (\Exception $e) {
            return redirect()->route('terrenos.index')->with('error', 'Terreno no encontrado');
        }
    }
}