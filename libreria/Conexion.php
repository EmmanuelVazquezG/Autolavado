<?php
    class Conexion
    {
        private static $objeto;
        private function _construct(){}

        public static function getObjeto()
        {
            if(!self::$objeto)
            {
                self::$objeto = new self();
            }
            return self::$objeto;
        }
        function InsertarUsuario($nombre, $contraseña)
        {
            $con = new mysqli(s,u,p,bd);
            $q = $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q-> prepare("CALL Insertarusuario(?,?)");
            $q->bind_param('ss', $nombre, $contraseña);
            $q->execute();
            $q->close();
        }

        function Insertar($fecha, $monto, $concepto)
        {
            $con = new mysqli(s,u,p,bd);
            $q = $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q-> prepare("insert into usuarios values (null,?,?,?)");
            $q->bind_param('sss', $fecha, $monto, $concepto);
            $q->execute();
            $q->close();
        }
        function Mostrar($fill)
        {
            $con = new mysqli(s,u,p,bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare('select * from ahorros where id like ?');
            $q->bind_param('s',$fill);
            $q->execute();
            $q->bind_result($id,$fecha,$monto,$concepto);
            $rs = '<table class="table table-bordered table-striped">
            <thead>
            <tr>
            <th>Id</th>
            <th>Fecha</th>
            <th>Monto</th>
            <th>Concepto</th>
            </tr></thead><tbody>';
            while ($q->fetch()) {
                $rs.="<tr>
                <td>$id</td>
                <td>$fecha</td>
                <td>$monto</td>
                <td>$concepto</td>
                </tr>";
            }
            $q->close();
            return $rs.'</tbody></table>';
        }
    }