<?php
include("app/controllers/reCaptcha/keys.php");
//Esto trae el arreglo donde tenemos almacenadas las contraseñas
?>

<!doctype html <html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SDGV - Inicio</title>
    <link rel="shortcut icon" href="private/img/logo/huella.png" type="image/x-icon">
    <link rel="stylesheet" href="public/css/global.css">
    <link rel="stylesheet" href="public/css/navbar/navbar.css">
    <link rel="stylesheet" href="public/css/header/header.css">
    <link rel="stylesheet" href="public/css/main/main.css">
    <script src="https://kit.fontawesome.com/0b8bc254d8.js" crossorigin="anonymous"></script>
    <script src="https://www.google.com/recaptcha/api.js?render=<?php echo $claves['publica']; ?>"></script>
</head>

<body> 
    <nav class="nav">
        <section class="nav__logo">
            <img src="private/img/logo/Logo_SDGV-removebg.png" alt="logo-SDGV">
        </section>
        <section class="nav__links">
            <a href="login/index.php" class="nav__links_link">Citas</i></a>
            <a href="#testimonio" class="nav__links_link">Testimonios</a>
            <a href="login/index.php" class="nav__links_link">Acceso Colaboradores</a>
        </section>
        <section class="nav__buttons">
            <a href="login/index.php"><button class="nav__buttons_button">Iniciar sesión</button></a>
            <button class="nav__buttons_button"><i class="fa-solid fa-moon"></i></button>
        </section>
    </nav>

    <header class="header">
        <section class="header__container_bienvenida">
            <article class="header__container_mensaje">
                <span class="header__container_text--hombre">En nuestra Veterinaria</span> 
                <h3 class="header__container_text">
                <br> Cada mascota recibe cuidados con <span class="header__container_frase">amor</span> y 
                    <span class="header__container_frase">dedicación</span> porque para nosotros, 
                    su salud y felicidad es lo mas importante
                </h3>

                <a href="#ubicacion"><button class="nav__buttons_button">Conocenos</button></a>
            </article>
        </section>
        <section class="header__container_photo">
            <article class="header__container_images">
                <img class="header__container_images_image" loading="lazy" src="private/img/gatoperro.jpg" alt="client">
            </article>
        </section>
    </header>

    <main class="main">
        <section class="main__testimonios" id="testimonio">
            <h3 class="main__testimonios_text">Testimonios</h3>

            <section class="main__testimonio_container">
                <article class="main__testimonio_card">
                    <img class="main__testimonio_card_img" loading="lazy" src="private/img/clientes/perrito1.jpg" alt="testimonio-client">
                    <div class="main__testimonios_texts">
                        <span class="main_testimonios_name">Leon</span>
                        <span class="main__testimonios_servicios">Cirugia estomacal <i class="fa-solid fa-paw icon"></i></span>
                    </div>
                    <p class="main__testimonio_p">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam, ipsam totam,
                        recusandae quidem, magni velit rem necessitatibus 
                        magnam odit laboriosam architecto. Iste alias, provident debitis quod autem 
                        cupiditate magnam aliquam?m
                    </p>
                </article>

                <article class="main__testimonio_card">
                    <img class="main__testimonio_card_img" loading="lazy" src="private/img/clientes/gato1.jpg" alt="testimonio-client">
                    <div class="main__testimonios_texts">
                        <span class="main_testimonios_name">Michell</span>
                        <span class="main__testimonios_servicios">Colocación de chip <i class="fa-solid fa-microchip icon"></i></span>
                    </div>
                    <p class="main__testimonio_p">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam, ipsam totam,
                        recusandae quidem, magni velit rem necessitatibus 
                        magnam odit laboriosam architecto. Iste alias, provident debitis quod autem 
                        cupiditate magnam aliquam?m
                    </p>
                </article>

                <article class="main__testimonio_card">
                    <img class="main__testimonio_card_img" loading="lazy" src="private/img/clientes/perrito3.jpg" alt="testimonio-client">
                    <div class="main__testimonios_texts">
                        <span class="main_testimonios_name">Vegeta</span>
                        <span class="main__testimonios_servicios">Mi primera vacuna <i class="fa-solid fa-syringe icon"></i></span>
                    </div>
                    <p class="main__testimonio_p">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam, ipsam totam,
                        recusandae quidem, magni velit rem necessitatibus 
                        magnam odit laboriosam architecto. Iste alias, provident debitis quod autem 
                        cupiditate magnam aliquam?m
                    </p>
                </article>
            </section>
                <h3 class="main__testimonios_text main__testimonios_text--ubi">
                    ¿Eres un usuario nuevo? <span class="main__testimonios_text_gradient">Acercate a nuestra sucursal</span> y ¡regístrate!
                </h3>
            </section>
        </section>
        <section class="main__ubicacion" id="ubicacion">
            <h3 class="main__ubicacion_text">Ubicación y Contacto</h3>
            <section class="main__ubicacion_container">
                <article class="main__ubicacion_info">
                    <h3 class="main__ubicacion_infoText">SDGV</h3>

                    <form id="form" action="app/controllers/emails/email.php" class="main__ubicacion_form" method="post">
                    <?php
                        if (isset($_GET['error'])) {
                                $error = $_GET['error'];
                                echo "<p class='error_captcha'>$error</p>";
                        }
                    ?>
                        <h2 class="main__ubicacion_formTitle">Contactanos</h2>
                        <p class="main__ubicacion_formText">¡Si tienes alguna pregunta no dudes en escribirnos!</p>

                        <div class="main__ubicacion_formInputs">
                            <label class="main__ubicacion_formLabel">
                                <input type="text" placeholder=" " id="name" name="nombre" class="main__ubicacion_input">
                                <span class="main__ubicacion_name">Ingresa tu nombre</span>
                            </label>

                            <label class="main__ubicacion_formLabel">
                                <input type="email" placeholder=" " id="email" name="correo" class="main__ubicacion_input">
                                <span class="main__ubicacion_name">Ingresa tu correo</span>
                            </label>

                            <label class="main__ubicacion_formLabel">
                                <textarea id="message" placeholder=" " name="mensaje" class="main__ubicacion_input textArea"></textarea>
                                <span class="main__ubicacion_name">Comentario</span>
                            </label>
                        </div>
                        
                        <input type="hidden" id="token" name="token">
                        <input type="submit" value="Enviar" class="main__ubicacion_formBtn" id="btn" disabled>
                    </form>
                </article>

                <article class="main__ubicacion_maps">
                    <iframe class="main__ubicacion_mapa" src="<?php echo $mapa['URL']; ?>" width="500" height="500" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </article>
            </section>
        </section>
    </main>

    <footer class="footer">
        <div class="footer__container">
            <section class="footer__info">
                <article class="footer__infos">
                    <img class="footer__img" src="private/img/logo/Logo_SDGV-removebg.png" alt="logo-SDGV">
                    <p class="footer__mensaje">
                        SDGV nace en 2024 para ayudar a tus mascotas en su salud.
                    </p>
                </article>

                <article class="footer__infos">
                    <h2 class="footer__text">Centro medico</h2>
                    <div class="footer_ancors">
                        <a class="footer__ancor" href="#">Contacto</a>
                        <a class="footer__ancor" href="#">Ubicación</a>
                        <a class="footer__ancor" href="#">Veterinarios</a>
                    </div>
                </article>

                <article class="footer__infos">
                    <h2 class="footer__text">Servicios</h2>
                    <div class="footer_ancors">
                        <a class="footer__ancor" href="#">Contacto</a>
                        <a class="footer__ancor" href="#">Ubicación</a>
                        <a class="footer__ancor" href="#">Veterinarios</a>
                    </div>
                    
                </article>

                <article class="footer__infos">
                    <h2 class="footer__text">Soporte</h2>
                    <div class="footer_ancors">
                        <a class="footer__ancor" href="#">Contacto</a>
                        <a class="footer__ancor" href="#">Ubicación</a>
                        <a class="footer__ancor" href="#">Veterinarios</a>
                    </div>
                </article>
            </section>

            <section class="footer__socials">
                <article class="footer__btnSocials">
                    <div class="footer__frase">
                        <p class="footer__parrafo">
                            @Creado para ayudar a tus mascotas en el momento donde más lo necesitan
                        </p>
                    </div>
                    <div class="footer__rss">
                        <a href="#" class="footer__link"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#" class="footer__link"><i class="fa-brands fa-facebook"></i></a>
                        <a href="#" class="footer__link"><i class="fa-brands fa-whatsapp"></i></a>
                        <a href="#" class="footer__link"><i class="fa-brands fa-linkedin"></i></a>
                    </div>
                </article>
            </section>
        </div>
        
    </footer>


    <!-- ReCaptcha -->
    <!-- <script src="public/js/reCAPTCHA.js"></script> -->
    <script>
        (function() {
            grecaptcha.ready(() => {
                grecaptcha.execute('<?php echo $claves['publica']; ?>', {
                    action: 'formulario'
                }).then((token) => {
                    const idToken = document.getElementById('token');
                    const btn_disable = document.getElementById('btn');

                    idToken.value = token;

                    btn_disable.disabled = false;
                })
            })
        }())
    </script>

    
    <script src="public/js/validaFormClient.js"></script>
</body>

</html>