<?php

class FormularioReserva implements IFormulario
{
    function Crear()
    {
        $v = new Vehiculos();
        $resultados = array();
        $resultados = $v->MostrarVehiculos('%');

        $options = '';
        foreach ($resultados as $vehiculo) {
            $options .= '<option value="' . $vehiculo['id'] . '">' . $vehiculo['nombre'] . '</option>';
        }

        return '
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center mb-4">Reservar Cita</h5>
                            <form id="reservaForm" action="reserva">
                                <!-- Nombre del Cliente -->
                                <div class="mb-3">
                                    <label for="nombreUsuario" class="form-label">Nombre del Cliente</label>
                                    <input type="text" class="form-control" id="nombreUsuario" name="nombreUsuario" placeholder="Ingrese su nombre">
                                </div>
                                <!-- Matrícula del Auto -->
                                <div class="mb-3">
                                    <label for="matriculaAuto" class="form-label">Matrícula del Auto</label>
                                    <input type="text" class="form-control" id="matriculaAuto" name="matriculaAuto" placeholder="Ingrese la matrícula del auto">
                                </div>

                                <!-- Tipo de vehiculo -->
                                <div class="mb-3">
                                    <label for="vehiculos" class="form-label">Tipo de Vehiculo</label>
                                    <select class="form-control" id="vehiculos" name="vehiculos">
                                        <option value="" disabled selected>-- Selecciona el vehiculo --</option>
                                        ' . $options . '
                                    </select>
                                </div>

                                <!-- Cantidad -->
                                <div class="mb-3">
                                    <label for="Cantidad" class="form-label">Cantidad</label>
                                    <input type="number" class="form-control" id="Cantidad" name="Cantidad" placeholder="Ingrese la cantidad" step="0.1">
                                </div>
                                
                                <!-- Fecha -->
                                <div class="mb-3">
                                    <label class="texte" for="fecha">Fecha</label><br>
                                    <input class="inpute" type="date" id="fecha" name="fecha"><br>
                                </div>



                                <!-- Botón de Reservar -->
                                <div class="text-center mt-3">
                                    <button type="submit" class="btn btn-primary">Reservar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                document.getElementById("btnCarro").addEventListener("click", function() {
                    mostrarTarjeta("tarjetaCarro");
                });

                document.getElementById("btnCamioneta").addEventListener("click", function() {
                    mostrarTarjeta("tarjetaCamioneta");
                });

                document.getElementById("btnTractoCamion").addEventListener("click", function() {
                    mostrarTarjeta("tarjetaTractoCamion");
                });

                function mostrarTarjeta(idTarjeta) {
                    var tarjetas = document.getElementsByClassName("tarjeta");
                    for (var i = 0; i < tarjetas.length; i++) {
                        tarjetas[i].style.display = "none";
                    }
                    document.getElementById(idTarjeta).style.display = "block";
                }

                document.getElementById("reservaForm").addEventListener("submit", function(event) {
                    event.preventDefault();
                });
            });
        </script>
        ';
    }
}
?>
