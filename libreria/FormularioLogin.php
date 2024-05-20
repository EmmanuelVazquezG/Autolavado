<?php
   class FormularioLogin implements IFormulario
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
                       <form method="POST" action="trabajos"> <!-- Aquí se agregó el atributo action -->
                         <div class="mb-3">
                           <label for="nombre" class="form-label">Usuario</label>
                           <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese su Usuario">
                         </div>
                         <div class="mb-3">
                           <label for="contra" class="form-label">Contraseña</label>
                           <input type="password" class="form-control" name="contra" id="contra" placeholder="Ingrese su contraseña">
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
   