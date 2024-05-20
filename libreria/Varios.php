<?php
    class login
    {
        public static function Verificar($usuario)
        {
            // $usuario_encontrado = false;
            $con = new mysqli(s,u,p,bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("select * from usuarios where nombre=?");
            $q->bind_param('s', $usuario);
            $q->execute();
            $q->bind_result($id,$nombre,$pass, $permiso);
            $q->fetch();
            $q->close();
            return array($id,$nombre,$pass, $permiso);
        }
        
    }
    class Esclavos
    {
        function InsertarEmpleado($nombre,$contra)
        {
            $con = new mysqli(s,u,p,bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("CALL InsertarUsuario(?,?)");
            $q->bind_param('ss',$nombre,$contra);
            $q->execute();
            $q->close();
        }

        // function InsertarEmpleado($nombre,$contra,$permisos)
        // {
        //     $con = new mysqli(s,u,p,bd);
        //     $con->set_charset("utf8");
        //     $q = $con->stmt_init();
        //     $q->prepare("insert into usuarios values(null,?,?,?)");
        //     $q->bind_param('sss',$nombre,$contra,$permisos);
        //     $q->execute();
        //     $q->close();
        // }
        function MostrarEmpleado($fill)
        {
            $con = new mysqli(s,u,p,bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("select * from usuarios where id like ?");
            $q->bind_param('s',$fill);
            $q->execute();
            $rs = $q->get_result();
            $q->close();
            return $rs;
        }
        function MostrarEmpleadoDia($fill)
        {
            $con = new mysqli(s,u,p,bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("select * from vista_empleadodia where turno like ?");
            $q->bind_param('s',$fill);
            $q->execute();
            $rs = $q->get_result();
            $q->close();
            return $rs;
        }
    }
    class Vehiculos
    {
        function InsertarVehiculo($nombre,$formacobro,$valor)
        {
            $con = new mysqli(s,u,p,bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("insert into vehiculos values(null,?,?,?)");
            $q->bind_param('ssd',$nombre,$formacobro,$valor);
            $q->execute();
            $q->close();
        }
        function MostrarVehiculos($fill)
        {
            $con = new mysqli(s,u,p,bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("select * from vehiculos where id like ?");
            $q->bind_param('s',$fill);
            $q->execute();
            $rs = $q->get_result();
            $q->close();
            return $rs;
        }
    }
    class Clientes
    {
        function InsertarReserva($cliente,$vehiculo,$matricula,$fecha,$cantidad)
        {
            $con = new mysqli(s,u,p,bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("CALL InsertarRegistro(?,?,?,?,?)");
            $q->bind_param('sissd',$cliente,$vehiculo,$matricula,$fecha,$cantidad);
            $q->execute();
            $q->close();
        }
        function MostrarReserva($fill)
        {
            $con = new mysqli(s,u,p,bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare('select * from vista_lista_reserva where Estado = ?');
            $q->bind_param('s',$fill);
            $q->execute();
            $rs = $q->get_result();
            $q->close();
            return $rs;
        }
        function EliminarReserva($cliente)
        {
            $con = new mysqli(s,u,p,bd);
            $con->set_charset("utf8");
            $q = $con->prepare("DELETE FROM registro WHERE cliente = ?");
            $q->bind_param('s', $cliente);
            $q->execute();
            $q->close();
        }
        function MostrarClientesAtendidos($fill)
        {
            $con = new mysqli(s,u,p,bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("select * from VistaClientesA where cliente like ?");
            $q->bind_param('s',$fill);
            $q->execute();
            $rs = $q->get_result();
            $q->close();
            return $rs;
        }
    }
    class Trabajos
    {
        function MostrarTrabajos($fill)
        {
            $con = new mysqli(s,u,p,bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("select * from vista_trabajos where Estado = ?");
            $q->bind_param('s',$fill);
            $q->execute();
            $rs = $q->get_result();
            $q->close();
            return $rs;
        }
        function AceptarTrabajo($estado,$cliente)
        {
            $con = new mysqli(s,u,p,bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("UPDATE registro SET Estado = 'Aceptado' WHERE Estado = ? AND cliente = ?");
            $q->bind_param('ss',$estado,$cliente);
            $q->execute();
            $q->close();
        }

        function ActualizarEmpleado($empleado,$cliente)
        {
            $con = new mysqli(s,u,p,bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("UPDATE registro SET fkidempleado = ? WHERE cliente = ?");
            $q->bind_param('is',$empleado,$cliente);
            $q->execute();
            $q->close();
        }
        public static function Obtener($nombre)
        {
            // $usuario_encontrado = false;
            $con = new mysqli(s,u,p,bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("select * from usuarios where nombre=?");
            $q->bind_param('s', $nombre);
            $q->execute();
            $q->bind_result($id,$nombre,$pass, $permiso);
            $q->fetch();
            $q->close();
            return array($id,$nombre,$pass, $permiso);
        }
        public static function ObtenerC($cliente)
        {
            // $usuario_encontrado = false;
            $con = new mysqli(s,u,p,bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("select * from registro where cliente=?");
            $q->bind_param('s', $cliente);
            $q->execute();
            $q->bind_result($id,$nombre,$pass, $permiso);
            $q->fetch();
            $q->close();
            return array($id,$nombre,$pass, $permiso);
        }
    }
    class Puntaje
    {
        function MostrarPuntaje($fill)
        {
            $con = new mysqli(s,u,p,bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("select * from VistaPuntaje where nombre_empleado like ?");
            $q->bind_param('s',$fill);
            $q->execute();
            $rs = $q->get_result();
            $q->close();
            return $rs;
        }
        function InsertarPagos($empleado,$fecha,$cantidad)
        {
            $con = new mysqli(s,u,p,bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("insert into pagos values(null,?,?,?)");
            $q->bind_param('isd',$empleado,$fecha,$cantidad);
            $q->execute();
            $q->close();
        }
    }
    class Pagos
    {
        function MostrarPagosDiarios($fill)
        {
            $con = new mysqli(s,u,p,bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("select * from vista_pagosdiarios where turno like ?");
            $q->bind_param('s',$fill);
            $q->execute();
            $rs = $q->get_result();
            $q->close();
            return $rs;
        }
        public static function EliminarPago($empleado, $fecha)
        {
            $con = new mysqli(s,u,p,bd);
            $con->set_charset("utf8");
            $q = $con->prepare("DELETE FROM puntaje WHERE fkidempleado = ? AND fecha = ?");
            $q->bind_param('is', $empleado, $fecha);
            $q->execute();
            $q->close();
        }
    }
?>