<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprobante de Reserva - {{ $terreno->nombre ?? 'Lote' }}</title>
    <style>
        /* CSS Puro y Modular (Cero Tailwind) */
        :root {
            --primary: #1b4d3e;
            --primary-light: #eef5f2;
            --text-dark: #2d3748;
            --text-light: #718096;
            --border-color: #e2e8f0;
            --success: #2f855a;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            color: var(--text-dark);
            background-color: #f7fafc;
            line-height: 1.6;
            margin: 0;
            padding: 40px 20px;
        }

        .receipt-container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            border: 1px solid var(--border-color);
            overflow: hidden;
        }

        header {
            background-color: var(--primary);
            color: #ffffff;
            padding: 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo-area h1 {
            margin: 0;
            font-size: 28px;
            font-weight: 800;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .logo-area p {
            margin: 5px 0 0 0;
            font-size: 14px;
            opacity: 0.8;
        }

        .status-badge {
            background-color: var(--success);
            color: #ffffff;
            padding: 8px 16px;
            border-radius: 9999px;
            font-weight: 700;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .content-area {
            padding: 40px;
        }

        h2 {
            color: var(--primary);
            font-size: 20px;
            margin-top: 0;
            margin-bottom: 20px;
            border-bottom: 2px solid var(--primary-light);
            padding-bottom: 8px;
        }

        /* DL List for semantic details */
        dl.details-list {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin: 0 0 40px 0;
            padding: 0;
        }

        .details-list div {
            border-bottom: 1px solid var(--border-color);
            padding-bottom: 10px;
        }

        dt {
            font-size: 12px;
            text-transform: uppercase;
            color: var(--text-light);
            font-weight: 600;
            margin-bottom: 4px;
        }

        dd {
            font-size: 16px;
            color: var(--text-dark);
            font-weight: 700;
            margin: 0;
        }

        /* Financial Breakdown */
        .breakdown-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 45px;
        }

        .breakdown-table th {
            text-align: left;
            padding: 12px;
            border-bottom: 2px solid var(--border-color);
            color: var(--text-light);
            font-size: 13px;
            text-transform: uppercase;
        }

        .breakdown-table td {
            padding: 16px 12px;
            border-bottom: 1px solid var(--border-color);
            font-size: 15px;
        }

        .breakdown-table tr.total-row td {
            font-size: 20px;
            font-weight: 800;
            color: var(--primary);
            border-bottom: none;
            background-color: var(--primary-light);
        }

        .actions-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 24px;
            font-size: 14px;
            font-weight: 700;
            border-radius: 8px;
            text-decoration: none;
            transition: all 0.2s ease;
            cursor: pointer;
        }

        .btn-primary {
            background-color: var(--primary);
            color: #ffffff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #12342a;
        }

        .btn-secondary {
            background-color: #edf2f7;
            color: var(--text-dark);
            border: 1px solid var(--border-color);
        }

        .btn-secondary:hover {
            background-color: #e2e8f0;
        }

        footer {
            text-align: center;
            margin-top: 40px;
            color: var(--text-light);
            font-size: 12px;
        }

        /* Print Specific Styles */
        @media print {
            body {
                background-color: #ffffff;
                padding: 0;
            }

            .receipt-container {
                box-shadow: none;
                border: none;
                max-width: 100%;
            }

            .actions-section {
                display: none;
            }
        }
    </style>
</head>
<body>

<article class="receipt-container">
    <header>
        <div class="logo-area">
            <h1>Maz Terrenos</h1>
            <p>Comprobante Oficial de Reserva</p>
        </div>
        <div class="status-badge">
            {{ $transaccion->estadoPago }}
        </div>
    </header>

    <div class="content-area">
        <section>
            <h2>Detalles de la Transacción</h2>
            <dl class="details-list">
                <div>
                    <dt>Folio del Pago</dt>
                    <dd>#MT-{{ str_pad($transaccion->idTransaccion, 6, '0', STR_PAD_LEFT) }}</dd>
                </div>
                <div>
                    <dt>Fecha y Hora</dt>
                    <dd>{{ $transaccion->fechaTransaccion }}</dd>
                </div>
                <div>
                    <dt>Comprador</dt>
                    <dd>{{ $comprador->nombre }} {{ $comprador->apellido1 }}</dd>
                </div>
                <div>
                    <dt>Asesor de Ventas</dt>
                    <dd>{{ $vendedor->nombre }} {{ $vendedor->apellido1 }}</dd>
                </div>
                <div>
                    <dt>Método de Pago</dt>
                    <dd>{{ $transaccion->metodoPago }}</dd>
                </div>
                <div>
                    <dt>Propiedad</dt>
                    <dd>{{ $terreno->nombre ?? 'Terreno sin nombre' }}</dd>
                </div>
            </dl>
        </section>

        <section>
            <h2>Desglose de Conceptos</h2>
            <table class="breakdown-table">
                <thead>
                    <tr>
                        <th>Concepto</th>
                        <th style="text-align: right;">Monto</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <strong>{{ $terreno->nombre ?? 'Lote de Terreno' }}</strong>
                            <div style="font-size: 12px; color: var(--text-light); margin-top: 4px;">
                                Ubicación: {{ $terreno->ubicacion }} | Superficie: {{ $terreno->superficie ?? ($terreno->largo * $terreno->ancho) }} m²
                            </div>
                        </td>
                        <td style="text-align: right; font-weight: 600;">
                            ${{ number_format($terreno->precio, 2) }} MXN
                        </td>
                    </tr>
                    <tr>
                        <td>Gasto Administrativo (Fijo)</td>
                        <td style="text-align: right; font-weight: 600;">$1,500.00 MXN</td>
                    </tr>
                    <tr>
                        <td>IVA Aplicable (16%)</td>
                        <td style="text-align: right; font-weight: 600;">
                            ${{ number_format($terreno->precio * 0.16, 2) }} MXN
                        </td>
                    </tr>
                    <tr class="total-row">
                        <td>Total Reservado</td>
                        <td style="text-align: right;">
                            ${{ number_format($transaccion->monto, 2) }} MXN
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>

        <div class="actions-section">
            <a href="{{ route('terrenos.index') }}" class="btn btn-secondary">
                Volver al Catálogo
            </a>
            <button onclick="window.print()" class="btn btn-primary">
                Imprimir Comprobante
            </button>
        </div>
    </div>
</article>

<footer>
    <p>© {{ $year }} Maz Terrenos S.A. de C.V. Todos los derechos reservados.</p>
</footer>

<script>
    // Auto-imprimir al cargar para facilitar el flujo del usuario
    window.addEventListener('DOMContentLoaded', () => {
        setTimeout(() => {
            window.print();
        }, 800);
    });
</script>

</body>
</html>
