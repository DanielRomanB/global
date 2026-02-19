
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{--
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    --}}
    {{--
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"> --}}
    {{-- <script src="https://kit.fontawesome.com/e642c4f3ce.js" crossorigin="anonymous"></script> --}}
    {{--
    <link rel="preconnect" href="https://fonts.googleapis.com"> --}}
    {{--
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> --}}
    {{-- <script src="https://www.google.com/recaptcha/api.js" async defer></script> --}}
    <link {{-- href="https://fonts.googleapis.com/css2?family=PT+Sans+Narrow:wght@400;700&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" --}} rel="stylesheet">
    <link href="{{ asset('css/login/index/loading-screen.css') }}" rel="stylesheet">
    <link href="{{ asset('css/login/index/style.css') }}" rel="stylesheet">
    <script src="{{ asset('js/login/loginscript.js') }}"></script>

    <link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-v5.3.3.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plugins/toastr/toastr.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/alerts.css') }}" rel="stylesheet">
    <script src="{{ asset('js/alerts.js') }}"></script>
    <script src="{{ asset('js/login.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- <script src="{{ asset('js/bootstrap.min.js') }}"></script> --}}

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
                                        <img src="{{ asset('img/login/logoazul.png') }}"
                                            class="rounded d-block w-100  imagenes " alt="...">
                                    </div>
                                    <div class="col-sm-6 d-flex align-items-center carousel-text">
                                        <p><b>Con LeonoSoft facturador electrónico</b> sdescubre una gestión de
                                            faturación <b>en menos de un minuto</b> y aumenta el flujo de tus ventas.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="carousel-item align-content-center">
                                <div class="row">
                                    <div class="col-sm-6  d-flex align-items-center">
                                        <img src="{{ asset('img/login/logoazul.png') }}"
                                            class="rounded d-block w-100  imagenes " alt="...">
                                    </div>
                                    <div class="col-sm-6 d-flex align-items-center carousel-text">
                                        <p><b>Con LeonoSoft facturador electrónico</b> sdescubre una gestión de
                                            faturación <b>en menos de un minuto</b> y aumenta el flujo de tus ventas.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="carousel-item align-content-center">
                                <div class="row">
                                    <div class="col-sm-6 d-flex align-items-center">
                                        <img src="{{ asset('img/login/logoazul.png') }}"
                                            class="rounded d-block w-100  imagenes " alt="...">
                                    </div>
                                    <div class="col-sm-6 d-flex align-items-center carousel-text">
                                        <p><b>Con LeonoSoft facturador electrónico</b> sdescubre una gestión de
                                            faturación <b>en menos de un minuto</b> y aumenta el flujo de tus ventas.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="carousel-item align-content-center">
                                <div class="row">
                                    <div class="col-sm-6  d-flex align-items-center">
                                        <img src="{{ asset('img/login/logoazul.png') }}"
                                            class="rounded d-block w-100  imagenes " alt="...">
                                    </div>
                                    <div class="col-sm-6 d-flex align-items-center carousel-text">
                                        <p><b>Con LeonoSoft facturador electrónico</b> sdescubre una gestión de
                                            faturación <b>en menos de un minuto</b> y aumenta el flujo de tus ventas.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- botones para la selección de ubicación de contenido del CARRUSEL - INDICADORES -->
                        <div class="carousel-indicators float-indicators">
                            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0"
                                class="active px-4" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                                class="px-4" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                                class="px-4" aria-label="Slide 3"></button>
                            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="3"
                                class="px-4" aria-label="Slide 4"></button>
                        </div>

                    </div>
                    <div class="text-center mt-5">
                        <button type="button" class="btn btn-light text-primary mt-4"><b class="px-3">Conoce
                                más</b></button>
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
                    <img src="{{ asset('img/login/leono soft.png') }}" alt="Leono Soft" class="mx-auto logo">
                    <!-- TÍTULO-->
                    <h5 class="text-center text-leono title-margin"><b>Facturador Electrónico</b></h5>
                    <!-- COMIENZO DEL FORM -->
                    <form onsubmit="handleFormSubmit(event)" class="login-form" id="FormBody">
                        <div class="input-box">
                            <label for="ruc"><i class="fa fa-building"></i> <strong>Ruc</strong></label>
                            <input type="text" id="rucRequest" required placeholder="Ingresa tu número de RUC">
                        </div>

                        <div class="input-box">
                            <label for="usuario"><i class="fa fa-user"></i> <strong>Usuario</strong></label>
                            <input type="text" id="emailRequest" type="email" required
                                placeholder="Ingresa tu usuario">
                        </div>

                        <div class="input-box password-container">
                            <label><i class="fa fa-lock"></i> <strong>Contraseña</strong></label>
                            <input type="password" id="passwordRequest" autocomplete="off" required
                                placeholder="Ingresa tu contraseña">
                            <span class="toggle-password" onclick="togglePassword()">
                                <i class="fa fa-eye-slash" id="eye-icon"></i> <!-- Cambiado a "fa-eye-slash" -->
                            </span>
                        </div>

                        <div class="form-check mb-3 text-center d-flex justify-content-center">
                            <a href="..." data-bs-toggle="modal" data-bs-target="#exampleModal"
                                class="link-offset-2 link-underline link-underline-opacity-0 float-end">Recuperar
                                contraseña</a>
                        </div>
                        <div class="d-grid gap-2 pb-2">
                            <button class="btn btn-primary" data-url="{{ route('login_leonosoft_api') }}" type="submit" id="loginButton">Iniciar sesión</button>
                        </div>
                        <p class="text-center pt-2">¿Quieres consultar un comprobante? <b><a href="#"
                                    class="link-offset-2 link-underline link-underline-opacity-0"
                                    data-bs-toggle="modal" data-bs-target="#exampleModalComprobante"> Consultar
                                </a></b></p>
                    </form>
                </div>


                <!-- Botón select - CONTÁCTANOS -->
                <div class="btn-group dropup contact-container" role="group">
                    <button class="contact-btn" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-phone"></i> Contáctanos <i class="fa fa-angle-up"></i>
                    </button>
                    <ul class="dropdown-menu contact-info px-2">
                        <li><a class="dropdown-item" href="tel:+51922546853">+51 922 546 853 <i
                                    class="bi bi-telephone-inbound-fill text-leono"></i></a></li>
                        <li><a class="dropdown-item" href="mailto:info@codecta.pe">info@codecta.pe <i
                                    class="bi bi-envelope-arrow-up-fill text-leono"></i></a></li>
                        <li><a class="dropdown-item" href="tel:+51922546863">+51 922 546 863 <i
                                    class="bi bi-headset text-leono"></i></a></li>
                        <li><a class="dropdown-item" href="...">Nuestras oficinas <i
                                    class="bi bi-geo-alt-fill text-leono"></i></a></li>
                    </ul>
                </div>
                <div id="alert-container">

                </div>
            </div>
        </div>
    </div>

    <!-- Modal - RECUPERAR CONTRASEÑA-->
    <div class="modal fade align-content-md-center" id="exampleModal" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content px-3">
                <div class="d-flex justify-content-end row p-2">
                    <button type="button"
                        class=" floating-close d-flex justify-content-center align-items-center col-sm-12"
                        data-bs-dismiss="modal" aria-label="Close">
                        <i class="bi bi-x-circle-fill"></i>
                    </button>
                    <h5 class="modal-title text-primary text-sm-center text-titulo" id="exampleModalLabel"
                        style="color: blue;">Recuperar Contraseña</h5>
                </div>

                <div class="modal-body text-sm-center">
                    <p class="mx-5">Ingresa tu Correo Electrónico para identificar tu cuenta. Te enviaremos una
                        contraseña al correo registrado para proceder al cambio de contraseña.</p>
                    <!-- FORMULARIO -->
                    <form action="">
                        <div class="mx-5 d-flex justify-content-center align-items-center">
                            <input type="email" class="correo" id="correo" required
                                placeholder="Ingresa su correo">
                        </div>
                        <div class="alert alert-success py-2 mt-3" role="alert">
                            <p style="color: green;"><i class="bi bi-info-circle-fill text-success"
                                    style="color: green;"></i> Recuerda que, una vez enviado el correo, tu contraseña
                                actual será inválida para iniciar sesión.</p>
                        </div>
                        <button type="button" class="btn btn-primary px-5" data-bs-toggle="modal"
                            data-bs-target="#exampleModalEnviado">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal - RECUPERAR CONTRASEÑA - CORREO ENVIADO -->
    <div class="modal fade align-content-md-center" id="exampleModalEnviado" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content px-3">
                <div class="p-2 d-flex justify-content-center">
                    <h1 class="modal-title fs-5 text-primary text-sm-center text-titulo" id="exampleModalLabel"
                        style="color: blue;">Recuperar Contraseña</h1>
                    <button type="button" class="floating-close d-flex justify-content-center align-items-center"
                        data-bs-dismiss="modal" aria-label="Close">
                        <i class="bi bi-x-circle-fill"></i>
                    </button>
                </div>
                <div class="modal-body text-sm-center">
                    <!-- ícono de check -->
                    <i class="bi bi-check-circle-fill text-success"></i>

                    <p class="mx-5">Enviamos un correo a "example@gmail.com"<br>Ingrese a su cuenta y siga las
                        instrucciones para la recuperación de la contraseña.</p>

                    <div class="alert alert-success py-2 mt-3" role="alert">
                        <p style="color: green;"><i class="bi bi-info-circle-fill text-success"
                                style="color: green;"></i> Recuerda que, una vez enviado el correo, tu contraseña
                            actual
                            será inválida para iniciar sesión.</p>
                    </div>

                    <button type="button" class="btn btn-primary px-5" data-bs-dismiss="modal"
                        aria-label="Close">Ok</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal - CONSULTAR COMPROBANTE -->
    <div class="modal fade align-content-md-center" id="exampleModalComprobant" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content p-2">
                <div class="modal-header">
                    <h1 class="modal-title fs-4 text-success-emphasis text-titulo fw-normal" id="exampleModalLabel"><i
                            class="bi bi-house-exclamation-fill text-leono"></i> Consulta de Comprobantes de Pago</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="m-2 p-2 bg-info-subtle text-center pt-4">
                        <p class="text-secondary">Una vez verificados los datos ingresados se procederá a mostrar el
                            CDP
                            emitido en su nombre, del cual también podrá descargarse un PDF y un archivo XML con todos
                            sus datos.</p>
                    </div>

                    <!-- FORMULARIO DE CONSULTAR COMPROBANTE -->
                    <p class="text-center">Por favor ingrese todos los datos que se solicitan a continuación:</p>
                    <form id="comprobanteForm1" class="text-center" onsubmit="return validateCaptcha(event)">
                        <div class="py-2">
                            <label for="">Tipo de Comprobante: </label>
                            <select name="" class="form-select-sm border border-secondary-subtle">
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
                            <input type="text" value="2005468910"
                                class="form-control-sm bg-primary-subtle border border-secondary-subtle" disabled
                                readonly>
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
                            {{-- <div class="g-recaptcha" data-sitekey="YOUR_SITE_KEY_HERE"></div> --}}
                        </div>
                        <button type="submit" class="btn btn-primary px-3">Consultar</button>
                    </form>

                </div>
            </div>
        </div>
    </div>


    <!-- Modal - CONSULTAR COMPROBANTE- NUEVO -->
    <div class="modal fade align-content-md-center" id="exampleModalComprobante" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg">
            <div class="modal-content px-3">
                <div class="modal-header d-flex justify-content-center">
                    <h1 class="modal-title fs-5 text-primary text-sm-center text-titulo" id="exampleModalLabel"
                        style="color: blue;">Consultar comprobante</h1>
                    <button type="button" class="floating-close d-flex justify-content-center align-items-center"
                        data-bs-dismiss="modal" aria-label="Close">
                        <i class="bi bi-x-circle-fill"></i>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form id="comprobanteForm2" class="">
                        @csrf
                        <div class="mb-2 row">
                            <label for="inputRuc" class="col-sm-3 col-form-label">Ruc Emisor:</label>
                            <div class="col-sm-9">
                                <input type="text" value=""
                                    class="form-control border border-primary-subtle" id="ruc_emisor"
                                    name="ruc_emisor" required>
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="inputRuc" class="col-sm-3 col-form-label">Ruc Receptor:</label>
                            <div class="col-sm-9">
                                <input type="text" value=""
                                    class="form-control border border-primary-subtle" id="ruc_receptor"
                                    name="ruc_receptor" required>
                            </div>
                        </div>

                        <div class="mb-2 row ">
                            <div class="col-sm-6">
                                <div class="row form-group">
                                    <label for="" class="col-sm-3 col-form-label">Tipo: </label>
                                    <div class="col-sm-9">
                                        <select name="tipo" class="form-control" id="comprobante_tipo" required>
                                            <option value="">Selecciona un comprobante</option>
                                            <option value="boleta">Boleta</option>
                                            <option value="factura">Factura</option>
                                            <option value="nota_debito">Nota Débito</option>
                                            <option value="nota_credito">Nota Crédito</option>
                                            {{-- <option value="comprobante_retenicion">Comprobante Retención</option>
                                            <option value="comprobante_percepcion">Comprobante Percepción</option> --}}
                                            <option value="guia_remision">Guía de Remisión Remitente</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row form-group">
                                    <label for="" class="col-sm-3 col-form-label">Emision: </label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control border border-secondary-subtle"
                                            name="emision" id="emision" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <div class="col-sm-6">
                                <div class="row form-group">
                                    <label for="" class="col-sm-3 col-form-label">Serie: </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control border border-secondary-subtle"
                                            placeholder="FA00-1" id="numero" name="numero" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row form-group">
                                    <label for="" class="col-sm-3 col-form-label">Total: </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control border border-secondary-subtle"
                                            placeholder="1,000.00" id="total" name="total" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class=" mx-5 my-2 d-flex justify-content-center">
                            <div class="g-recaptcha" data-sitekey="YOUR_SITE_KEY_HERE"></div>
                        </div> --}}

                        <div class="text-center pt-3" id="consulta-boton">
                            <button type="submit" class="btn btn-primary px-3 text-center">Consultar</button>
                        </div>

                    </form>
                    <div id="resultados">
                        <table class="table table-striped table-bordered align-middle" id="table-comprobantes">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Precio U.</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody id="itemsTableBody">

                            </tbody>
                            <tfoot id="tfootTable">

                            </tfoot>
                        </table>
                        <table class="table table-striped table-bordered align-middle" id="tabla_guia">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Precio U.</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody id="itemsTableBodyGuias">

                            </tbody>
                            <tfoot id="tfootTableGuias">

                            </tfoot>
                        </table>
                        <hr>
                        <div class="">
                            <div class="row">
                                <div class="col-sm-6 text-left">
                                    {{-- <button ></button> --}}
                                    <a id="pdf_button" download="" class="btn btn-primary button-customer">PDF</a>
                                    {{-- <button id="print_button" class="btn btn-secondary"></button> --}}
                                    <a id="print_button" target="_blank"
                                        class="btn btn-primary button-customer">Imprimir</a>
                                    {{-- <button id="xml_button" class="btn btn-success">XML</button> --}}
                                    <a id="xml_button" download="" class="btn btn-success button-customer">XML</a>
                                </div>
                                <div class="col-sm-6 text-end">
                                    <button id="cancelar" class="btn btn-primary btn-outline">Cancelar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Codigo para la pantalla de carga -->
    <div id="loadingScreen">
        <div class="loading-content">
            <img id="loadingLogo" src="{{ asset('img/login/logo.png') }}" alt="Logo de carga">
            <div class="spinner"></div>
        </div>
    </div>
    <style>
        #resultados {
            display: none;
        }

        #tabla_comprobantes,
        #tabla_guia {
            display: none;
            margin-top: 10px;
        }
    </style>
    <!-- Toastr script -->
    <script src="{{ asset('js/plugins/toastr/toastr.min.js') }}"></script>

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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        $('#comprobante_tipo').on('change', function(e) {
            if (this.value == 'guia_remision') {
                $('#total').val("");
                $('#total').attr('disabled', true);
                $('#total').attr('required', false);
            } else {
                $('#total').attr('disabled', false);
                $('#total').attr('required', true);
            }
        });
        $('#comprobanteForm2').on('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission
            $.ajax({
                url: "{{ route('leonosoft.consulta') }}", // Your route to handle the request
                method: "POST",
                data: $(this).serialize(), // Serialize form data
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                success: function(response) {
                    if (response.success === false || response.error == true) {
                        toastr.error("No se encontaron registros con los datos ingresados, por favor verifica e intenta nuevamente.");
                        return;
                    }
                    $('#consulta-boton').css('display', 'none');
                    var tipo = $('#comprobante_tipo').val();
                    $('#resultados').css('display', 'block')
                    if (tipo != "guia_remision") {
                        // var $('')
                        $('#tabla_comprobantes').css('display', 'contents');
                        $('#tabla_guia').css('display', 'none');
                        // Mostrar datos principales
                        // $('#emisor').val(response.data['cliente']);
                        // $('#fecha').val(response.data['fecha']);
                        // $('#total').val(response.data['total']);

                        // Limpiar tabla antes de agregar
                        $('#itemsTableBody').empty();
                        console.log(response.data);
                        // Agregar filas a la tabla
                        response.data['registros'].forEach(function(item) {
                            $('#itemsTableBody').append(`
                            <tr>
                                <td>1</td>
                                <td>${item.item}</td>
                                <td>${item.cantidad}</td>
                                <td>${item.precio_unitario}</td>
                                <td>${item.precio_total}</td>
                            </tr>
                        `);
                        });
                        $('#tfootTable').append(`
                        <tr>
                            <td colspan="4"></td>
                            <td>` + response.data['total'] + `</td>
                        </tr>
                    `);
                    } else {
                        console.log("a")
                        $('#tabla_comprobantes').css('display', 'none');
                        $('#tabla_guia').css('display', 'contents');

                        // $('#column_button').removeClass('col-sm-12');
                        // $('#column_button').addClass('col-sm-4');
                        // $('#column-4').removeClass('col-sm-');

                        // $('#emisor').val(response.data['cliente']);
                        // $('#fecha').val(response.data['fecha']);
                        // $('#total').val(response.data['total']);

                        // Limpiar tabla antes de agregar
                        $('#itemsTableBodyGuias').empty();

                        // Agregar filas a la tabla
                        response.data['registros'].forEach(function(item) {
                            $('#itemsTableBodyGuias').append(`
                            <tr>
                                <td>1</td>
                                <td>${item.item}</td>
                                <td>${item.cantidad}</td>
                                <td>${item.peso_unitario}</td>
                                <td>${item.peso_total}</td>
                            </tr>
                        `);
                        });
                        $('#tfootTableGuias').append(`
                        <tr>
                            <td colspan="4"></td>
                            <td>` + response.data['total'] + `</td>
                        </tr>
                    `);

                    }

                    $('#xml_button').attr('href', response.data['xml_link'])
                    $('#print_button').attr('href', response.data['print_link'])
                    $('#pdf_button').attr('href', response.data['pdf_link'])

                    // Mostrar contenedor si estaba oculto
                    $('#resultContainer').removeClass('d-none').show();

                    toastr.success('Comprobante consultado exitosamente');
                    console.log(response);
                },
                error: function(xhr) {
                    toastr.error('Error al consultar el comprobante');
                }
            });
        });
        $('#cancelar').on('click', function() {
            $('#comprobanteForm2').css('display', 'block');
            $('#resultados').css('display', 'none');
            $('#consulta-boton').css('display', 'block');
        });
    </script>
</body>

</html>
