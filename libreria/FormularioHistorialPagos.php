<?php
    class FormularioHistorialPagos implements IFormulario
    {
        function Crear()
        {
               // Datos de ejemplo del historial de pagos (podrían ser obtenidos de una base de datos u otro origen)
            $historialPagos = [
                [
                    'empleado' => 'Juan Pérez',
                    'fecha' => '2024-04-10',
                    'cantidad' => '$100',
                ],
                [
                    'empleado' => 'María García',
                    'fecha' => '2024-04-12',
                    'cantidad' => '$150',
                ],
            ];

            // Estructura de la tabla de historial de pagos
            $tablaHTML = '<table class="table">
                            <thead>
                                <tr>
                                    <th>Empleado</th>
                                    <th>Fecha</th>
                                    <th>Cantidad</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>';

            foreach ($historialPagos as $pago) {
                $tablaHTML .= '<tr>
                                    <td>' . $pago['empleado'] . '</td>
                                    <td>' . $pago['fecha'] . '</td>
                                    <td>' . $pago['cantidad'] . '</td>
                                    <td><button class="btn btn-success">Pagar</button></td>
                                </tr>';
            }

            $tablaHTML .= '</tbody>
                        </table>';

            // Estructura de la sección de filtros y búsqueda
            $filtroBusquedaHTML = '
                <div class="mt-4">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Buscar por nombre">
                                <button class="btn btn-outline-secondary" type="button">Buscar</button>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <input type="date" class="form-control" id="fechaFiltro" name="fechaFiltro">
                        </div>
                    </div>
                </div>';

            // Estructura completa del formulario
            $htmlCompleto = '
                <div class="container mt-5">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title text-center mb-4">Historial de Pagos</h5>
                                    ' . $filtroBusquedaHTML . '
                                    ' . $tablaHTML . '
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';

            return $htmlCompleto;        }
    }