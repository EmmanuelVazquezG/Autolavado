<?php
    class FormularioRegistro implements IFormulario
    {
      function Crear()
      {
          return '
            <div class="container mt-5">
              <div class="row justify-content-center">
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title text-center mb-4">Inicio de Sesión</h5>
                      <form action="registro" method="post">
                        <div class="mb-3">
                          <label for="inputEmail" class="form-label">Nombre de Usuario</label>
                          <input type="text" class="form-control" id="inputEmail" name="nombre" placeholder="Ingrese usuario" required>
                        </div>
                        <div class="mb-3">
                          <label for="inputPassword" class="form-label">Contraseña</label>
                          <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Ingrese su contraseña" required>
                        </div>
                        <div class="text-center">
                          <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
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