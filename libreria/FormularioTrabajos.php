<?php
    class FormularioTrabajos implements IFormulario
    {
    public function Crear()
    {
        $r = new Trabajos();
        $trabajos = array();
        $trabajos = $r->MostrarTrabajos('Espera');
        $output = '
        <div class="container mt-5">
            <h3 class="text-center mb-4">Trabajos Pendientes</h3>
            <div class="card-container">';

        foreach ($trabajos as $trabajo) {
            $output .= '
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">' . $trabajo['cliente'] . '</h5>
                    <p class="card-text">Matrícula: ' . $trabajo['matricula'] . '</p>
                    <p class="card-text">Tipo de Vehículo: ' . $trabajo['nombre_vehiculo'] . '</p>
                    <form action="trabajos" method="post">
                        <input type="hidden" name="cliente" value="'.$trabajo['cliente'].'">
                        <button class="btn-accept">Aceptar Trabajo</button>
                    </form>
                </div>
            </div>';
        }

        $output .= '
            </div>
        </div>';

        return $output;
    }
}
?>
<!--  
        foreach ($trabajos as $trabajo) {
            $output .= '
            <div class="card">
                <img src="' . $trabajo['imagen'] . '" alt="' . $trabajo['nombre_vehiculo'] . '">
                <div class="card-body">
                    <h5 class="card-title">' . $trabajo['cliente'] . '</h5>
                    <p class="card-text">Matrícula: ' . $trabajo['matricula'] . '</p>
                    <p class="card-text">Tipo de Vehículo: ' . $trabajo['nombre_vehiculo'] . '</p>
                    <button class="btn-accept">Aceptar Trabajo</button>
                </div>
            </div>';
        }


-->