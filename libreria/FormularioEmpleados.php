<?php
    class FormularioEmpleados implements IFormulario
    {
        function Crear()
        {
            $empleados = [
            [
                'nombre' => 'Alberto Sanchez', 
                'puntuacion' => '51', 
                'sueldo' => '2500', 
            ],
            [
                'nombre' => 'Fulano De tal', 
                'puntuacion' => '27', 
                'sueldo' => '1850', 
            ]
        ];


        $tablaHTML = '<table class="table">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Puntuación</th>
                                <th>Sueldo</th>
                            </tr>
                        </thead>
                        <tbody>';

        foreach ($empleados as $empleado) {
            $tablaHTML .= '<tr>
                                <td>' . $empleado['nombre'] . '</td>
                                <td>' . $empleado['puntuacion'] . '</td>
                                <td>' . $empleado['sueldo'] . '</td>
                            </tr>';
        }

        $tablaHTML .= '</tbody>
                    </table>';

        $htmlCompleto = '
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-center mb-4">Listado de Empleados</h5>
                                ' . $tablaHTML . '
                                <div class="text-center mt-3">
                                    <button class="btn btn-primary" onclick="generarReporte()">Generar Reporte</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';

        return $htmlCompleto;
        }
    }