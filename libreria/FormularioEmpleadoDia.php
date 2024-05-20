<?php
    class FormularioempleadoDia implements IFormulario
    {
        function Crear()
        {
            // Datos de ejemplo del empleado del día (podrían ser obtenidos de una base de datos u otro origen)
            $ed = new Esclavos();
            $empleados = array();
            $empleados = $ed->MostrarEmpleadoDia('%');
            // Estructura de la tabla de empleado del día
            $tablaHTML = '<table class="table">
                            <thead>
                                <tr>
                                    <th>Empleado</th>
                                    <th>Fecha</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>';

            foreach ($empleados as $empleado) {
                $tablaHTML .= '<tr>
                                    <td>' . $empleado['nombre_usuario'] . '</td>
                                    <td>' . $empleado['fecha'] . '</td>
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