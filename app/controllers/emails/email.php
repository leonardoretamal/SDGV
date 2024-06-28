<?php
include("../../../app/config.php"); 

$nombre = filter_var($_POST['nombre']);
$correo = filter_var($_POST['correo']);
$mensaje = filter_var($_POST['mensaje']);

if(!empty($nombre) && !empty($correo) && !empty($mensaje)) {
    $destino = "jose.maldonado@alumnos.ipleones.cl";
    $asunto = "Mensaje desde SDGV";

    $cuerpo = '
        <html>
            <head>
                <title>Formulario SDGV contacto</title>
            </head>
            <body>
                <h1 style="color: #16ade3;">Has recibido un mensaje de: '.$nombre.'</h1>
                <p style="color: #0c5d80;">'.$mensaje.'</p>
            </body>
        </html>
    ';

    $headers = "MIME-version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset:utf-8\r\n";

    $headers .= "From: $nombre <$correo>\r\n";

    $headers .= "Return-path: $destino\r\n";

    mail($destino, $asunto, $cuerpo, $headers);

    $html = '
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="shortcut icon" href="/private/img/logo/huella.png" type="image/x-icon">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
            <title>Correo enviado</title>
            <style>
                body {
                    background: linear-gradient(90deg, #00aaff26, transparent);
                    height: 100vh;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    font-family: "Montserrat", Helvetica;
                }

                .container {
                    height: auto;
                    background: #87cdeb53;
                    padding: 3rem 4rem;
                    display: flex;
                    flex-direction: column;
                    justify-content: space-between;
                    gap: .9rem;
                    border-radius: 3rem;

                        h3 {
                            color: #0a3247;
                            font-weight: 600;

                            a {
                                background: none;
                                padding: 0;
                                color: rgba(27, 120, 27, 0.737);
                                font-size: 18px;
                                position: relative;
                                right: 45px;
                                cursor: default;
                            }

                            a:hover {
                                background: none;
                                transform: none;
                            }
                        }

                        p {
                            color: #0c5d80;
                            font-size: 14px
                        }

                        a {
                            display: inline-block;
                            padding: 12px 14px;
                            background: #16ade3;
                            color: #f1fafe;
                            text-decoration: none;
                            border-radius: 0.5rem;
                            transition: all .3s ease;
                            text-align: center;
                            width: 8rem;
                            cursor: pointer;
                        }

                        a:hover {
                            transform: translateY(-0.1rem);
                            background: #098bc0;
                        }
                    }
            </style>
        </head>
        <body>
            <div class="container">
                <h3>Mensaje enviado</h3>
                <p>Su consulta a sido enviada con exito</p>
                <a href="'.$URL.'">Volver al inicio</a>
            </div>
        </body>
        </html>
    ';

    echo $html;
} else {
    $htmlError = '
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="shortcut icon" href="/private/img/logo/huella.png" type="image/x-icon">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
            <title>Correo enviado</title>
            <style>
                body {
                    background: linear-gradient(90deg, #00aaff26, transparent);
                    height: 100vh;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    font-family: "Montserrat", Helvetica;
                }

                .container {
                    height: auto;
                    background: #87cdeb53;
                    padding: 3rem 4rem;
                    display: flex;
                    flex-direction: column;
                    justify-content: space-between;
                    gap: .9rem;
                    border-radius: 3rem;

                        h3 {
                            color: #0a3247;
                            font-weight: 600;

                            a {
                                background: none;
                                padding: 0;
                                color: rgba(120, 30, 27, 0.737);
                                font-size: 18px;
                                position: relative;
                                right: 45px;
                                cursor: default;
                            }

                            a:hover {
                                background: none;
                                transform: none;
                            }
                        }

                        p {
                            color: #0c5d80;
                            font-size: 14px
                        }

                        a {
                            display: inline-block;
                            padding: 12px 14px;
                            background: #16ade3;
                            color: #f1fafe;
                            text-decoration: none;
                            border-radius: 0.5rem;
                            transition: all .3s ease;
                            text-align: center;
                            width: 8rem;
                            cursor: pointer;
                        }

                        a:hover {
                            transform: translateY(-0.1rem);
                            background: #098bc0;
                        }
                    }
            </style>
        </head>
        <body>
            <div class="container">
                <h3>Mensaje no enviado</h3>
                <p>Su consulta no a sido recibida, intente nuevamente</p>
                <a href="'.$URL.'">Volver al inicio</a>
            </div>
        </body>
        </html>
    ';

    echo $htmlError;
}



?>