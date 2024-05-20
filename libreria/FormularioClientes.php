<?php
    class FormularioClientes implements IFormulario
    {
        function Crear()
        {
            $r = new Clientes();
            // Datos de ejemplo de reservas (podrían ser obtenidos de una base de datos u otro origen)
            $reservas = array();
            $reservas = $r->MostrarReserva('Aceptado');
            // Estructura de la tabla de reservas
            $tablaHTML = '<table class="table">
                            <thead>
                                <tr>
                                    <th>Cliente</th>
                                    <th>Vehículo</th>
                                    <th>Fecha</th>
                                    <th>Estado</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>';

            foreach ($reservas as $reserva) {
                $tablaHTML .= '<tr>
                                    <td>' . $reserva['cliente'] . '</td>
                                    <td>' . $reserva['nombre_vehiculo'] . '</td>
                                    <td>' . $reserva['fecha'] . '</td>
                                    <td>' . $reserva['estado'] . '</td>
                                    <td>
                                        <form action="clientes" method="post">
                                            <input type="hidden" name="cliente" value="'.$reserva['cliente'].'">
                                            <button class="btn btn-danger">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>';
            }

            $tablaHTML .= '</tbody>
                        </table>';

            // Estructura completa del formulario
            $htmlCompleto = '
                <div class="container mt-5">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title text-center mb-4">Listado de Reservas</h5>
                                    ' . $tablaHTML . '
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';

            return $htmlCompleto;
        }
    }