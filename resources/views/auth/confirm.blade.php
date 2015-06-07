<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/logo.png">
    <link rel="shortcut icon" href="img/logo.png"/>

    <title>COMPARA AHORA</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link href="{{ asset('/css/main.css') }}" rel="stylesheet">

    <!-- Fonts from Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Lato:700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:500,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,900' rel='stylesheet' type='text/css'>
    <link href="{{ asset('/css/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/sweet-alert.css') }}" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<!-- Fixed navbar -->
<div id="menu" class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><b></b></a>
            <img src="" alt="">
        </div>
        <div class="navbar-collapse collapse">
            <a href="index.php">{!! Html::image('img/logocom1.png', 'Comparahora', array('width' => '200px')) !!}</a>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <strong>Telecomunicaciones</strong> <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a style="cursor:pointer" onClick="telefoniaFija()">Telefonía fija</a></li>
                        <li><a style="cursor:pointer" onClick="television()">Televisión</a></li>
                        <li><a style="cursor:pointer" onClick="internet()">Internet</a></li>
                        <li><a style="cursor:pointer" onClick="doblePlay()">Doble Play</a></li>
                        <li><a style="cursor:pointer" onClick="triplePlay()">Triple Play</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <strong>Telefonía Móvil</strong> <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="planescelulares.php">Planes celulares</a></li>
                        <li><a href="recargas.php">Recargas celulares</a></li>
                        <li><a href="smartphones.php">Smartphones</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <strong>Finanzas</strong> <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a onClick="proximamente()">Tarjetas de crédito</a></li>
                        <li><a onClick="proximamente()">Crédito Hipotecario</a></li>
                        <li><a onClick="proximamente()">Crédito automotriz</a></li>
                        <li><a onClick="proximamente()">Cuentas bancarias</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <strong>Turismo</strong> <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="viajes.php">Hotel + Avión</a></li>
                        <li><a href="viajes.php">Hoteles</a></li>
                        <li><a href="viajes.php">Vuelos</a></li>
                        <li><a href="viajes.php">Autos</a></li>
                        <li><a href="viajes.php">Tours</a></li>
                        <li><a href="viajes.php">Transladosviajes</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <strong>Nosotros</strong> <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="quienes_somos.php">¿Quiénes Somos?</a></li>
                        <li><a href="contratar.php">¿Por Qué Contratar?</a></li>
                        <li><a href="terminosycondiciones.php">Terminos y Condiciones de Uso</a></li>
                        <li><a href="avisoprivacidad.php">Aviso de Privacidad</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <img src="http://www.oas.org/imgs/flags/small/sm_mexico.jpg" width="20px" height="13px" alt="">
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="quienes_somos.php"><img src="http://www.oas.org/imgs/flags/small/sm_mexico.jpg"
                                                             width="20px" height="13px" alt="">&nbsp;México</a></li>
                        <li><a href="contratar.php"><img
                                        src="http://www.banderas-e-himnos.com/images/banderas/bandera-chile-flagge-rechteckigweiss-28x42.gif"
                                        width="20px" height="13px" alt="">&nbsp;Chile</a></li>
                    </ul>
                </li>
            </ul>

        </div>
        <!--/.nav-collapse -->
    </div>
</div>
<div class="container">
    @include('errors')

    <div class="row">
        <h1 class="text-center">Activar Cuenta</h1>

        <p class="text-center">Antes de poder ingresar a tu cuenta y verificar el estatus de tu contratación asegurate
            de elegir una contraseña para tu cuenta</p>

        <div class="col-md-4 col-md-offset-4">
            {!! Form::open(['action' => ['RegistrarController@storeUser', $codigo_confirmacion]]) !!}
            <!-- password Form input -->
            <div class="form-group">
                {!! Form::label('password', 'Password') !!}
                {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
            </div>

            <!-- confirmar password Form input -->
            <div class="form-group">
                {!! Form::label('confirmar', 'Confirmar Password') !!}
                {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirmar Password']) !!}
            </div>

            {!! Form::submit('Activar Cuenta', ['class' => 'btn btn-primary center-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
<footer class="text-center">
    <div class="footer-above">
        <div class="container">
            <div class="row">
                <div class="footer-col col-md-4">
                    <h3>Comparahora</h3>
                    <a href="quienes_somos.php">¿Quiénes Somos?</a> <br>
                    <a href="contratar.php">¿Por Qué Contratar?</a> <br>
                    <a href="terminosycondiciones.php">Terminos y Condiciones de Uso</a> <br>
                    <a href="avisoprivacidad.php">Aviso de Privacidad</a>
                </div>
                <div class="footer-col col-md-4">
                    <h3>Redes Sociales</h3>
                    <ul class="list-inline">
                        <li><a href="https://www.facebook.com/comparahora" class="btn-social btn-outline"><i
                                        class="fa fa-fw fa-facebook"></i></a>
                        </li>
                        <li><a href="https://plus.google.com/" class="btn-social btn-outline"><i
                                        class="fa fa-fw fa-google-plus"></i></a>
                        </li>
                        <li><a href="https://twitter.com/" class="btn-social btn-outline"><i
                                        class="fa fa-fw fa-twitter"></i></a>
                        </li>
                        <!--
                                                    <li><a href="https://mx.linkedin.com/" class="btn-social btn-outline"><i class="fa fa-fw fa-linkedin"></i></a>
                                                    </li>
                                                    <li><a href="https://dribbble.com/" class="btn-social btn-outline"><i class="fa fa-fw fa-dribbble"></i></a>-->
                        </li>
                    </ul>
                </div>
                <div class="footer-col col-md-4">
                    <h3>Cóntactanos</h3>

                    <p>E-mail: contacto@comparahora.com</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    {!! Html::image('img/fedex.jpg', 'Comparahora', array('width' => '10%', 'style' => 'float:right'))
                    !!}
                    {!! Html::image('img/verisign.png', 'Comparahora', array('width' => '10%', 'style' =>
                    'float:right')) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="footer-below">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    Copyright &copy; 2014 - COMPARAHORA
                </div>
            </div>
        </div>
    </div>
</footer>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
{!! HTML::script('https://code.jquery.com/jquery-1.10.2.min.js') !!}
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<!--Dropdown automático en menu-->
{!! HTML::script('/js/sweet-alert.min.js') !!}
</body>
</html>
