<?php
require 'libreria/Varios.php';
    class FormularioAdmin implements IFormulario
    {
        function Crear()
        {
            $me = new Esclavos();
            $empleados = array();
            $empleados = $me->MostrarEmpleado('%');
        // Generar filas de la tabla con un foreach
        $filasTabla = '';
        foreach ($empleados as $empleado) {
            $filasTabla .= '
                <tr>
                    <td>'.$empleado['nombre'].'</td>
                    <td>'.$empleado['contra'].'</td>
                    <td>'.$empleado['permisos'].'</td>
                </tr>
            ';
        }

        // Estructura del encabezado con título y botón de registro
        $encabezado = '
            <div class="container mt-5">
                <div class="row">
                    <div class="col">
                        <h5 class="mb-4">Lista de Empleados</h5>
                    </div>
                    <div class="col text-end">
                        <a href="registro" class="btn btn-primary">Registrar</a>
                    </div>
                </div>
            </div>';

        // Estructura de la tabla de empleados
        $tablaEmpleados = '
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <table class="table">
                                <thead>
                                    <tr>
                                        <th>Usuario</th>
                                        <th>Contraseña</th>
                                        <th>Permisos</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    ' . $filasTabla . '
                                    <!-- Agregar más filas según los datos de los empleados -->
                                </tbody>
                            </table>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>';

        // Concatenar todas las secciones para formar el HTML completo
        $htmlCompleto =  $encabezado . $tablaEmpleados;
        return $htmlCompleto;
        }
        
    }
