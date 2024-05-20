<?php
    class FormularioClientesAtendidos implements IFormulario
    {
        function Crear()
        {
            $ca = new Clientes();
            $clientesAtendidos = array();
            $clientesAtendidos = $ca->MostrarClientesAtendidos('%');

            $tablaHTML = '<table class="table">
                            <thead>
                                <tr>
                                    <th>Cliente</th>
                                    <th>Empleado</th>
                                    <th>Vehículo</th>
                                    <th>Cantidad</th>
                                    <th>Fecha</th>
                                    <th>Matricula</th>
                                </tr>
                            </thead>
                            <tbody>';

            foreach ($clientesAtendidos as $cliente) {
                $tablaHTML .= '<tr>
                                    <td>' . $cliente['cliente'] . '</td>
                                    <td>' . $cliente['Nombre_Empleado'] . '</td>
                                    <td>' . $cliente['Tipo_Vehiculo'] . '</td>
                                    <td>' . $cliente['cantidad'] . '</td>
                                    <td>' . $cliente['fecha'] . '</td>
                                    <td>' . $cliente['matricula'] . '</td>
                                </tr>';
            }

            $tablaHTML .= '</tbody>
                        </table>';

            $htmlCompleto = '
                <div class="container mt-5">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title text-center mb-4">Reporte de Clientes Atendidos</h5>
                                    ' . $tablaHTML . '
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';

            return $htmlCompleto;
        }
    }
?>