<?php
    class FormularioRegistroAutos implements IFormulario
    {
        function Crear()
        {
            return '
              <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-center mb-4">Registro de Auto</h5>
                                <form action="registroautos" method="POST">
                                    <div class="mb-3">
                                        <label for="autoNombre" class="form-label">Nombre del Auto</label>
                                        <input type="text" class="form-control" id="autoNombre" name="autoNombre" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="formaCobro" class="form-label">Forma de Cobro</label>
                                        <input type="text" class="form-control" id="formaCobro" name="formaCobro" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="valor" class="form-label">Valor</label>
                                        <input type="number" class="form-control" id="valor" name="valor" required>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Registrar Auto</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            ';
        }
    }