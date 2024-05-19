<?php
    class FormularioFactory
    {
       static function Mostrar($tipo)
       {
            switch($tipo)
            {
                case 'Login': return new FormularioLogin(); 
                    break;
                case 'Registro': return new FormularioRegistro(); 
                    break;
                case 'Home': return new FormularioHome();
                    break;
                case 'Reserva': return new FormularioReserva();
                    break;
                case 'Trabajos': return new FormularioTrabajos();
                    break;
                case 'Empleados': return new FormularioEmpleados();
                    break;
                case 'Admin': return new FormularioAdmin();
                    break;
                case 'Clientes': return new FormularioClientes();
                    break;
                case 'Autos': return new FormularioAutos();
                    break;
                case 'RegistroAutos': return new FormularioRegistroAutos();
                    break;
                case 'EmpleadoDia': return new FormularioEmpleadoDia();
                    break;
                case 'HistorialPagos': return new FormularioHistorialPagos();
                    break;
                case 'PagosDiarios': return new FormularioPagosDiarios();
                    break;
            }
       }
    }