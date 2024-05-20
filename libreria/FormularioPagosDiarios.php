<?php
    class FormularioPagosDiarios implements IFormulario
    {
        function Crear()
        {
            // Datos de ejemplo del historial de pagos (podrían ser obtenidos de una base de datos u otro origen)
            $pd = new Pagos();
            $pagos = array();
            $pagos = $pd->MostrarPagosDiarios('%');

            // Estructura de la tabla de historial de pagos
            $tablaHTML = '<table class="table">
                            <thead>
                                <tr>
                                    <th>Empleado</th>
                                    <th>Fecha</th>
                                    <th>Pago</th>
                                </tr>
                            </thead>
                            <tbody>';

            foreach ($pagos as $pago) {
                $tablaHTML .= '<tr>
                                    <td>' . $pago['nombre_usuario'] . '</td>
                                    <td>' . $pago['fecha'] . '</td>
                                    <td>' . $pago['cantidad'] . '</td>
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
                                    <h5 class="card-title text-center mb-4">Reporte de Pagos</h5>
                                    ' . $tablaHTML . '
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';

            return $htmlCompleto;
        }
    }