<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
	<title>Comparahora</title>
	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/main.css') }}" rel="stylesheet">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
</head>
<body>
	<nav id="menu" class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Comparahora</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<a href="index.php"><img src="img/logocom1.png" width="200px" class="pull-left"></a>
				<ul class="nav navbar-nav">
					@if (Auth::user() && Auth::user()->isManager())
					<li><a href="{{ url('/') }}">Home</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Planes<span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/planes') }}">Lista</a></li>
								<li><a href="{{ url('/planes/create') }}">Crear Plan</a></li>								
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Smartphones<span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/smartphones') }}">Lista</a></li>
								<li><a href="{{ url('/smartphones/create') }}">Crear Smartphone</a></li>								
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Internet<span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/internet') }}">Lista</a></li>
								<li><a href="{{ url('/internet/create') }}">Crear Plan</a></li>								
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Telefonía<span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/telefonia') }}">Lista</a></li>
								<li><a href="{{ url('/telefonia/create') }}">Crear Plan</a></li>								
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">TV<span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/tv') }}">Lista</a></li>
								<li><a href="{{ url('/tv/create') }}">Crear Plan</a></li>								
							</ul>
						</li>
						<li><a href="{{ url('/cargamasiva') }}">Carga Masiva</a></li>
						<li><a href="{{ url('/costoagregado') }}">Costo Agregado</a></li>
						<li><a href="{{ url('/ventas') }}">Ventas</a></li>
					@endif
				</ul>

				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="{{ url('/auth/login') }}">Login</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->nombre }} {{ Auth::user()->apellido_paterno }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>
	
	@include('flash::message')
	@yield('content')
	<br>
	<hr>
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
                            <li><a href="https://www.facebook.com/comparahora" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                            </li>
                            <li><a href="https://plus.google.com/" class="btn-social btn-outline"><i class="fa fa-fw fa-google-plus"></i></a>
                            </li>
                            <li><a href="https://twitter.com/" class="btn-social btn-outline"><i class="fa fa-fw fa-twitter"></i></a>
                            </li> 
                        </ul>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>Contactanos</h3>
                        <p>E-mail: contacto@comparahora.com</p>
                    </div>
                </div>
                <div class="row">
                	<div class="col-md-10 col-md-offset-1">
                		<img src="img/fedex.jpg" width="10%" style="float:right">
                		<img src="img/verisign.png" width="10%" style="float:right">
                	</div>
                </div>
            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright © 2014 - COMPARAHORA
                    </div>
                </div>
            </div>
        </div>
    </footer>
	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
	<script src="http://markusslima.github.io/bootstrap-filestyle/js/bootstrap-filestyle.min.js"></script>
	<script>
    $(document).ready(function () {
      (function ($) {
        $('#filter').keyup(function () {
          var rex = new RegExp($(this).val(), 'i');
          $('.searchable #res').hide();
          $('.searchable #res').filter(function () {
          return rex.test($(this).text());
        }).show();
      })
      }(jQuery));
      $('#session').delay(2000).fadeOut('slow');
    });
  	</script>
  @yield('scripts')

</body>
</html>
