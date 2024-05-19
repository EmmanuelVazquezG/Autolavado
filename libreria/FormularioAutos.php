<?php
    class FormularioAutos implements IFormulario
    {
        function Crear()
        {
            $a = new Vehiculos();
            $autos = array();
            $autos = $a->MostrarVehiculos('%');

                $tablaHTML = '<table class="table">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Forma de Cobro</th>
                                        <th>Valor</th>
                                    </tr>
                                </thead>
                                <tbody>';

                foreach ($autos as $auto) {
                    $tablaHTML .= '<tr>
                                        <td>' . $auto['nombre'] . '</td>
                                        <td>' . $auto['formacobro'] . '</td>
                                        <td>' . $auto['valor'] . '</td>
                                    </tr>';
                }

                $tablaHTML .= '</tbody>
                            </table>';

                $htmlCompleto = '
                    <div class="container mt-5">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                            <div class="col text-end">
                        <a href="registroautos" class="btn btn-primary">Registrar</a>
                    </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title text-center mb-4">Listado de Autos</h5>
                                        ' . $tablaHTML . '
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';

                return $htmlCompleto;
        }
    }
