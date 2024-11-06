<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"> --}}
    <script src="https://kit.fontawesome.com/e642c4f3ce.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans+Narrow:wght@400;700&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/login/index/style.css') }}">
    <link href="loading-screen.css" rel="stylesheet">
    <title>Facturador Electrónico</title>
</head>
<body>


    <div class="container-fluid ">
        <div class="row h-100">
            <!-- Primera columana de la fila -->
            <div class="col-sm-12 col-md-12 col-lg-7  px-5 align-item bg-leono desaparece">
                <!-- CARRUSEL -->
                <div class="p-3 align-items-center">
                    <div id="carouselExampleDark" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item align-content-center active">
                                <div class="row">
                                    <div class="col-sm-6  d-flex align-items-center">
                                        <img src="./img/logoazul.png" class="rounded d-block w-100  imagenes " alt="...">
                                    </div>
                                    <div class="col-sm-6 d-flex align-items-center carousel-text">
                                        <p><b>Con LeonoSoft facturador electrónico</b> sdescubre una gestión de faturación <b>en menos de un minuto</b> y aumenta el flujo de tus ventas.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="carousel-item align-content-center">
                                <div class="row">
                                    <div class="col-sm-6  d-flex align-items-center">
                                        <img src="./img/logoazul.png" class="rounded d-block w-100  imagenes " alt="...">
                                    </div>
                                    <div class="col-sm-6 d-flex align-items-center carousel-text">
                                        <p><b>Con LeonoSoft facturador electrónico</b> sdescubre una gestión de faturación <b>en menos de un minuto</b> y aumenta el flujo de tus ventas.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="carousel-item align-content-center">
                                <div class="row">
                                    <div class="col-sm-6 d-flex align-items-center">
                                        <img src="./img/logoazul.png" class="rounded d-block w-100  imagenes " alt="...">
                                    </div>
                                    <div class="col-sm-6 d-flex align-items-center carousel-text">
                                        <p><b>Con LeonoSoft facturador electrónico</b> sdescubre una gestión de faturación <b>en menos de un minuto</b> y aumenta el flujo de tus ventas.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="carousel-item align-content-center">
                                <div class="row">
                                    <div class="col-sm-6  d-flex align-items-center">
                                        <img src="./img/logoazul.png" class="rounded d-block w-100  imagenes " alt="...">
                                    </div>
                                    <div class="col-sm-6 d-flex align-items-center carousel-text">
                                        <p><b>Con LeonoSoft facturador electrónico</b> sdescubre una gestión de faturación <b>en menos de un minuto</b> y aumenta el flujo de tus ventas.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- botones para la selección de ubicación de contenido del CARRUSEL - INDICADORES -->
                        <div class="carousel-indicators float-indicators">
                            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active px-4" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" class="px-4" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" class="px-4" aria-label="Slide 3"></button>
                            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="3" class="px-4" aria-label="Slide 4"></button>
                        </div>

                    </div>
                    <div class="text-center mt-5">
                        <button  type="button" class="btn btn-light text-primary mt-4"><b class="px-3">Conoce más</b></button>
                    </div>
                </div>

                <footer>
                    <p>&copy; 2024 - Codecta.pe</p>
                </footer>

            </div>

            <!-- Segunda columna de la fila -->
            <div class="col-sm-12 col-md-12 col-lg-5 align-item right-side">
                <!-- FORMULARIO -->
                <div class="p-3 div-small">
                    <!-- LOGO -->
                    <img src="./img/leono soft.png" alt="Leono Soft" class="mx-auto logo">
                    <!-- TÍTULO-->
                    <h5 class="text-center text-leono title-margin"><b>Facturador Electrónico</b></h5>
                    <!-- COMIENZO DEL FORM -->
                    <form action="" class="login-form">
                        <div class="input-box">
                            <label for="ruc"><i class="fa-solid fa-building"></i> <strong>Ruc</strong></label>
                            <input type="text" id="ruc" required placeholder="Ingresa tu número de RUC">
                        </div>

                        <div class="input-box">
                            <label for="usuario"><i class="bi bi-person-fill"></i> <strong>Usuario</strong></label>
                            <input type="text" id="usuario" required placeholder="Ingresa tu usuario">
                        </div>

                        <div class="input-box password-container">
                            <label for="password-input"><i class="fa-solid fa-lock"></i> <strong>Contraseña</strong></label>
                            <input type="password" id="password-input" required placeholder="Ingresa tu contraseña">
                            <span class="toggle-password" onclick="togglePassword()">
                                <i class="fa-solid fa-eye-slash" id="eye-icon"></i> <!-- Cambiado a "fa-eye-slash" -->
                            </span>
                        </div>

                        <div class="form-check mb-3">
                            <input class="form-check-input shadow-none" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">Recordar datos</label>
                            <a href="..." data-bs-toggle="modal" data-bs-target="#resetPassword" class="link-offset-2 link-underline link-underline-opacity-0 float-end">Recuperar contraseña</a>
                        </div>
                        <div class="d-grid gap-2 pb-2">
                            <button class="btn btn-primary" type="button" id="loginButton">Iniciar sesión</button>
                        </div>
                        <p class="text-center pt-2">¿Quieres consultar un comprobante? <b><a href="#" class="link-offset-2 link-underline link-underline-opacity-0" data-bs-toggle="modal" data-bs-target="#consultarComprobante"> Consultar </a></b></p>
                    </form>
                </div>


                <!-- Botón select - CONTÁCTANOS -->
                <div class="btn-group dropup contact-container" role="group">
                    <button class="contact-btn" aria-haspopup="true" aria-expanded="false">
                        <i class="bi bi-telephone-fill"></i> Contáctanos <i class="fa-solid fa-angle-up"></i>
                    </button>
                    <ul class="dropdown-menu contact-info px-2">
                        <li><a class="dropdown-item" href="tel:+51922546853">+51 922 546 853 <i class="bi bi-telephone-inbound-fill text-leono"></i></a></li>
                        <li><a class="dropdown-item" href="mailto:info@codecta.pe">info@codecta.pe <i class="bi bi-envelope-arrow-up-fill text-leono"></i></a></li>
                        <li><a class="dropdown-item" href="tel:+51922546863">+51 922 546 863 <i class="bi bi-headset text-leono"></i></a></li>
                        <li><a class="dropdown-item" href="...">Nuestras oficinas <i class="bi bi-geo-alt-fill text-leono"></i></a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal - RECUPERAR CONTRASEÑA-->
    {{-- <div class="modal fade align-content-md-center" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content px-3">
                <div class="d-flex justify-content-end row p-2">
                    <button type="button" class=" floating-close d-flex justify-content-center align-items-center col-sm-12" data-bs-dismiss="modal" aria-label="Close">
                        <i class="bi bi-x-circle-fill"></i>
                    </button>
                    <h5 class="modal-title text-primary text-sm-center text-titulo" id="exampleModalLabel" style="color: blue;">Recuperar Contraseña</h5>
                </div>

                <div class="modal-body text-sm-center">
                    <p class="mx-5">Ingresa tu Correo Electrónico para identificar tu cuenta. Te enviaremos una contraseña al correo registrado para proceder al cambio de contraseña.</p>
                    <!-- FORMULARIO -->
                    <form action="">
                        <div class="mx-5 d-flex justify-content-center align-items-center">
                            <input type="email" class="correo" id="correo" required placeholder="Ingresa su correo">
                        </div>
                        <div class="alert alert-success py-2 mt-3" role="alert">
                            <p style="color: green;"><i class="bi bi-info-circle-fill text-success" style="color: green;"></i> Recuerda que, una vez enviado el correo, tu contraseña actual será inválida para iniciar sesión.</p>
                        </div>
                        <button type="button" class="btn btn-primary px-5" data-bs-toggle="modal" data-bs-target="#exampleModalEnviado">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Modal - RECUPERAR CONTRASEÑA-->
    <x-modal id="resetPassword" title="Recuperar Contraseña">
            <p class="mx-5">Ingresa tu Correo Electrónico para identificar tu cuenta. Te enviaremos una contraseña al correo registrado para proceder al cambio de contraseña.</p>
             <!-- FORMULARIO -->
            <form action="">
                <div class="mx-5 d-flex justify-content-center align-items-center">
                    <input type="email" class="correo" id="correo" required placeholder="Ingresa su correo">
                </div>
                <div class="alert alert-success py-2 mt-3" role="alert">
                    <p style="color: green;"><i class="bi bi-info-circle-fill text-success" style="color: green;"></i> Recuerda que, una vez enviado el correo, tu contraseña actual será inválida para iniciar sesión.</p>
                </div>
                <button type="button" class="btn btn-primary px-5" data-bs-toggle="modal" data-bs-target="#correoEnviado">Enviar</button>
            </form>
    </x-modal>


    <!-- Modal - RECUPERAR CONTRASEÑA - CORREO ENVIADO -->
    {{-- <div class="modal fade align-content-md-center" id="exampleModalEnviado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content px-3">
                <div class="p-2 d-flex justify-content-center">
                    <h1 class="modal-title fs-5 text-primary text-sm-center text-titulo" id="exampleModalLabel" style="color: blue;">Recuperar Contraseña</h1>
                    <button type="button" class="floating-close d-flex justify-content-center align-items-center" data-bs-dismiss="modal" aria-label="Close">
                        <i class="bi bi-x-circle-fill"></i>
                    </button>
                </div>
                <div class="modal-body text-sm-center">
                    <!-- ícono de check -->
                    <i class="bi bi-check-circle-fill text-success"></i>

                    <p class="mx-5">Enviamos un correo a "example@gmail.com"<br>Ingrese a su cuenta y siga las instrucciones para la recuperación de la contraseña.</p>

                    <div class="alert alert-success py-2 mt-3" role="alert">
                        <p style="color: green;"><i class="bi bi-info-circle-fill text-success" style="color: green;"></i> Recuerda que, una vez enviado el correo, tu contraseña actual será inválida para iniciar sesión.</p>
                    </div>

                    <button type="button" class="btn btn-primary px-5" data-bs-dismiss="modal" aria-label="Close">Ok</button>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Modal - RECUPERAR CONTRASEÑA - CORREO ENVIADO -->
    <x-modal id="correoEnviado" title="Recuperar Contraseña">
        <i class="bi bi-check-circle-fill text-success"></i>
            <p class="mx-5">Enviamos un correo a "example@gmail.com"<br>Ingrese a su cuenta y siga las instrucciones para la recuperación de la contraseña.</p>

            <div class="alert alert-success py-2 mt-3" role="alert">
             <p style="color: green;"><i class="bi bi-info-circle-fill text-success" style="color: green;"></i> Recuerda que, una vez enviado el correo, tu contraseña actual será inválida para iniciar sesión.</p>
            </div>
            <button type="button" class="btn btn-primary px-5" data-bs-dismiss="modal" aria-label="Close">Ok</button>
    </x-modal>


    <!-- Modal - CONSULTAR COMPROBANTE -->
    {{-- <div class="modal fade align-content-md-center" id="exampleModalComprobant" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content p-2">
                <div class="modal-header">
                    <h1 class="modal-title fs-4 text-success-emphasis text-titulo fw-normal" id="exampleModalLabel"><i class="bi bi-house-exclamation-fill text-leono"></i> Consulta de Comprobantes de Pago</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="m-2 p-2 bg-info-subtle text-center pt-4">
                        <p class="text-secondary">Una vez verificados los datos ingresados se procederá a mostrar el CDP emitido en su nombre, del cual también podrá descargarse un PDF y un archivo XML con todos sus datos.</p>
                    </div>

                    <!-- FORMULARIO DE CONSULTAR COMPROBANTE -->
                    <p class="text-center">Por favor ingrese todos los datos que se solicitan a continuación:</p>
                        <form id="comprobanteForm" class="text-center" onsubmit="return validateCaptcha(event)">
                            <div class="py-2">
                                <label for="">Tipo de Comprobante: </label>
                                <select name="" id="" class="form-select-sm border border-secondary-subtle">
                                    <option value="boleta">Boleta</option>
                                    <option value="factura" selected>Factura</option>
                                    <option value="nota_debito">Nota Débito</option>
                                    <option value="nota_credito">Nota Crédito</option>
                                    <option value="comprobante_retenicion">Comprobante Retención</option>
                                    <option value="comprobante_percepcion">Comprobante Percepción</option>
                                    <option value="guia_remision">Guía de Remisión Remitente</option>
                                </select>
                            </div>
                            <div class="py-2 ">
                                <label for="" class="">Ruc Emisor: </label>
                                <input type="text" value="2005468910" class="form-control-sm bg-primary-subtle border border-secondary-subtle"  disabled readonly>
                                <!-- FORMULARIO DE CONSULTAR COMPROBANTE

                                <input type="text" class="form-control-sm border border-secondary-subtle" style="color: rgb(88, 155, 255);">
                                -->
                            </div>
                            <div class="py-2">
                                <label for="">N° Serie: </label>
                                <input type="text" class="form-control-sm border border-secondary-subtle">
                            </div>
                            <div class="py-2">
                                <label for="">N° Correlativo: </label>
                                <input type="text" class="form-control-sm border border-secondary-subtle">
                            </div>
                            <div class="py-2">
                                <label for="">Monto Total: </label>
                                <input type="text" class="form-control-sm border border-secondary-subtle">
                            </div>
                            <div class="py-4 mx-5 my-3">
                                <div class="g-recaptcha" data-sitekey="YOUR_SITE_KEY_HERE"></div>
                            </div>
                            <button type="submit" class="btn btn-primary px-3">Consultar</button>
                        </form>

                </div>
            </div>
        </div>
    </div> --}}

    <!-- Modal - CONSULTAR COMPROBANTE -->
    <x-modalCustom id="consultarComprobante" title="Consulta de Comprobantes de Pago">
        <div class="m-2 p-2 bg-info-subtle text-center pt-4">
            <p class="text-secondary">Una vez verificados los datos ingresados se procederá a mostrar el CDP emitido en su nombre, del cual también podrá descargarse un PDF y un archivo XML con todos sus datos.</p>
        </div>

        <!-- FORMULARIO DE CONSULTAR COMPROBANTE -->
        <p class="text-center">Por favor ingrese todos los datos que se solicitan a continuación:</p>
            <form id="comprobanteForm" class="text-center" onsubmit="return validateCaptcha(event)">
                <div class="py-2">
                    <label for="">Tipo de Comprobante: </label>
                    <select name="" id="" class="form-select-sm border border-secondary-subtle">
                        <option value="boleta">Boleta</option>
                        <option value="factura" selected>Factura</option>
                        <option value="nota_debito">Nota Débito</option>
                        <option value="nota_credito">Nota Crédito</option>
                        <option value="comprobante_retenicion">Comprobante Retención</option>
                        <option value="comprobante_percepcion">Comprobante Percepción</option>
                        <option value="guia_remision">Guía de Remisión Remitente</option>
                    </select>
                </div>
                <div class="py-2 ">
                    <label for="" class="">Ruc Emisor: </label>
                    <input type="text" value="2005468910" class="form-control-sm bg-primary-subtle border border-secondary-subtle"  disabled readonly>
                    <!-- FORMULARIO DE CONSULTAR COMPROBANTE

                    <input type="text" class="form-control-sm border border-secondary-subtle" style="color: rgb(88, 155, 255);">
                    -->
                </div>
                <div class="py-2">
                    <label for="">N° Serie: </label>
                    <input type="text" class="form-control-sm border border-secondary-subtle">
                </div>
                <div class="py-2">
                    <label for="">N° Correlativo: </label>
                    <input type="text" class="form-control-sm border border-secondary-subtle">
                </div>
                <div class="py-2">
                    <label for="">Monto Total: </label>
                    <input type="text" class="form-control-sm border border-secondary-subtle">
                </div>
                <div class="py-4 mx-5 my-3">
                    <div class="g-recaptcha" data-sitekey="YOUR_SITE_KEY_HERE"></div>
                </div>
                <button type="submit" class="btn btn-primary px-3">Consultar</button>
            </form>
    </x-modalCustom>

    <!-- Modal - CONSULTAR COMPROBANTE- NUEVO -->
    <div class="modal fade align-content-md-center" id="exampleModalComprobante" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content px-3">
                <div class="modal-header d-flex justify-content-center">
                    <h1 class="modal-title fs-5 text-primary text-sm-center text-titulo" id="exampleModalLabel" style="color: blue;">Consultar comprobante</h1>
                    <button type="button" class="floating-close d-flex justify-content-center align-items-center" data-bs-dismiss="modal" aria-label="Close">
                        <i class="bi bi-x-circle-fill"></i>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form id="comprobanteForm" class="" onsubmit="return validateCaptcha(event)">

                        <div class="mb-2 row">
                            <label for="inputRuc" class="col-sm-3 col-form-label">Ruc Emisor:</label>
                            <div class="col-sm-9">
                              <input type="number" value="2005468910" class="form-control bg-primary-subtle border border-secondary-subtle" id="inputRuc" disabled readonly>
                            </div>
                        </div>

                        <div class="my-2 row">
                            <div class="col-5">
                                <label for="" class="pe-2">Tipo: </label>
                                <select name="" id="" class="form-select-sm border border-secondary-subtle">
                                    <option value="boleta">Boleta</option>
                                    <option value="factura" selected>Factura</option>
                                    <option value="nota_debito">Nota Débito</option>
                                    <option value="nota_credito">Nota Crédito</option>
                                    <option value="comprobante_retenicion">Comprobante Retención</option>
                                    <option value="comprobante_percepcion">Comprobante Percepción</option>
                                    <option value="guia_remision">Guía de Remisión Remitente</option>
                                </select>
                            </div>

                            <div class="col d-flex justify-content-end">
                                <label for="" class="px-2">Fecha de emisión: </label>
                                <input type="text" class="form-control-sm border border-secondary-subtle">
                            </div>
                        </div>

                        <div class="row my-2">
                            <div class="col">
                                <label for="" class="pe-1">Serie: </label>
                                <input type="text" class="form-control-sm border border-secondary-subtle">
                            </div>
                            <div class="col d-flex justify-content-end">
                                <label for="" class="px-2">Correlativo: </label>
                                <input type="text" class="form-control-sm border border-secondary-subtle">
                            </div>
                        </div>

                        <div class=" mx-5 my-2 d-flex justify-content-center">
                            <div class="g-recaptcha" data-sitekey="YOUR_SITE_KEY_HERE"></div>
                        </div>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary px-3 text-center">Consultar</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Codigo para la pantalla de carga -->
    <div id="loadingScreen">
        <div class="loading-content">
            <img id="loadingLogo" src="logo.png" alt="Logo de carga">
            <div class="spinner"></div>
        </div>
    </div>

    <script>
        function validateCaptcha(event) {
            event.preventDefault(); // Prevent form submission
            const response = grecaptcha.getResponse();
            if (response.length === 0) {
                alert("Por favor, confirme que no es un robot.");
                return false; // Prevent form submission
            } else {
                alert("Formulario enviado correctamente.");
                // Here you can add the logic to submit the form or display the results
                // e.g., document.getElementById('comprobanteForm').submit();
                return true; // Allow form submission
            }
        }
    </script>
    <script src="loginscript.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
