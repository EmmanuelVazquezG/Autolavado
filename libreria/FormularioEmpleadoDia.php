<?php
    class FormularioempleadoDia implements IFormulario
    {
        function Crear()
        {
            // Datos de ejemplo del empleado del día (podrían ser obtenidos de una base de datos u otro origen)
            $empleados = [
                [
                    'empleado' => 'Juan Pérez',
                    'fecha' => '2024-04-10',
                    'lavados' => '5',
                    'total' => '$100',
                ],
                [
                    'empleado' => 'María García',
                    'fecha' => '2024-04-12',
                    'lavados' => '7',
                    'total' => '$150',
                ],
            ];

            // Estructura de la tabla de empleado del día
            $tablaHTML = '<table class="table">
                            <thead>
                                <tr>
                                    <th>Empleado</th>
                                    <th>Fecha</th>
                                    <th>Lavados</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>';

            foreach ($empleados as $empleado) {
                $tablaHTML .= '<tr>
                                    <td>' . $empleado['empleado'] . '</td>
                                    <td>' . $empleado['fecha'] . '</td>
                                    <td>' . $empleado['lavados'] . '</td>
                                    <td>' . $empleado['total'] . '</td>
                                </tr>';
            }

            $tablaHTML .= '</tbody>
                        </table>';

            // Estructura completa del formulario
            $htmlCompleto = '
                <div class="container mt-5">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title text-center mb-4">Empleado del Día</h5>
                                    ' . $tablaHTML . '
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';

            return $htmlCompleto;
        }
    }