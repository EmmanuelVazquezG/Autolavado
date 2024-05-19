<?php
    class FormularioHome implements IFormulario
    {
        function Crear()
        {
            return '
            
            <div class="contenedor" id="home" style="position: relative; width: 100%; height: 49vw; max-width: 100vw; max-height: 99.78vh; background-color: darkgrey;">
                <img src="images/fondo.jpg" style="object-fit: cover; width: 100%; height: 100%;" alt="fondo">
                <div class="bottom-right" style="position: absolute; bottom: 10%; right: 5%; padding: 10px;">
                    <a href="reserva" class="btn btnAgendar" style="background-color: #ff6600; font-size: 1.2rem; padding: 12px 24px; border-radius: 20px; text-decoration: none; color: white;">Agendar Cita</a>

                </div>
            </div>
            <div>
                <div class="row" id="nosotros">
                    <div class="col-6 mt-5 me-5 ms-5">
                        <h1>Autolavado GAFES</h1>
                        <h3>Quienes Somos?</h3>
                        <p>En GAFES, nos enorgullece ofrecerte más que un simple servicio de lavado de autos. Somos un equipo apasionado de profesionales dedicados a brindarte una experiencia excepcional de cuidado y limpieza para tu vehículo.</p>
                        <h3>Nuestra Historia</h3>
                    <p>
                    Desde nuestros humildes comienzos hemos estado comprometidos con la excelencia en el cuidado automotriz. Con años de experiencia en la industria, hemos perfeccionado nuestras técnicas y procesos para ofrecerte resultados impecables y un servicio sin igual.
                    </p>

                    <h3>Nuestra Misión</h3>
                    <p>
                    En GAFES, nuestra misión es superar las expectativas de nuestros clientes en cada visita. Nos esforzamos por proporcionar un lavado de autos de primera clase que no solo mantenga tu vehículo limpio y reluciente, sino que también ahorre tu tiempo y garantice tu satisfacción en cada interacción.
                    </p>

                    <h3>Nuestro Compromiso</h3>
                    <p>
                    Nos comprometemos a utilizar productos de alta calidad y técnicas de lavado respetuosas con el medio ambiente para garantizar que tu vehículo reciba el mejor cuidado posible. Además, nuestro equipo está dedicado a brindarte un servicio amable y profesional en un ambiente limpio y acogedor.
                    </p>

                    <p>
                    En GAFES, no solo lavamos autos, creamos experiencias. Confía en nosotros para mantener tu vehículo en su mejor estado y hacer que tu próxima visita sea una experiencia excepcional.
                    </p>

                    </div>
                    <div class="col-4 mt-5 ms-5 me-5">
                        <img src="images/lavado.jpg" class="d-block img-medium" alt="Carro">
                    </div>
                </div>
                <div class="row" id="servicios">
                    <div class="mt-5 me-5 ms-5">
                    <div class="row">
                        <div class="col-8">
                            <h3>Servicios de Lavado</h3>
                            <h4>Carro</h4>
                            <p>Si quieres lavar tu carro no importa de que tamaño sea, podemos hacerlo por tan solo $120. Incluso si tienes</p>
                                <ul>
                                <li>Sedán</li>
                                <li>Hatchback</li>
                                <li>Deportivo</li>
                            </ul>
                        </div>
                        <div class="col-4">
                            <img src="images/carro.png" class="d-block img-medium" alt="Carro">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <h4>Camioneta</h4>
                            <p>El lavado de camioneta incluye lavado exterior e interior. El precio base es de $15 y se añade un costo adicional dependiendo del número de puertas.</p>
                            <ul>
                                <li>2 puertas: +$150</li>
                                <li>4 puertas: +$175</li>
                                <li>6 puertas: +$200</li>
                            </ul>
                        </div>
                        <div class="col-4">
                            <img src="images/camioneta.png" class="d-block img-medium" alt="Camioneta">
                        </div>
                    </div>
                        <div class="row">
                            <div class="col-8">
                                <h4>Tracto Camión</h4>
                                <p>El lavado de tracto camión incluye lavado exterior e interior. El precio base es de $20 y se añade un costo adicional dependiendo de la longitud del camión.</p>
                                <ul>
                                    <li>Pequeño: +$300</li>
                                    <li>Mediano: +$350</li>
                                    <li>Grande: +$400</li>
                                </ul>
                            </div>
                            <div class="col-4">
                                <img src="images/camion.jpg" class="d-block img-medium" alt="Tracto Camión">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            ';
        }
    }
?>
