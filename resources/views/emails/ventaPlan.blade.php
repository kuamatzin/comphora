<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <style>
        body {
            background-color: #eef1f2;
        }

        p {
            font-size: 17px;
            color: #999999;
        }
        .image {
            float:left;
        }
    </style>
    <title>Document</title>
</head>
<body>
<div class="container">
    <br/><br/>

    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title">
                {!! Html::image('img/logotipo.png', 'Comparahora', array('class' => 'img-responsive center-block'))!!}
            </h3>
        </div>
        <div class="panel-body">
            <h3>Has comprado {{$nombre_plan}}</h3>

            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            {!! Html::image($image_smartphone, 'Comparahora', array('class' => 'img-responsive center-block'))!!}
                        </div>
                        <div class="col-md-6">
                            {!! Html::image('img/Telcel.png', 'Comparahora', array('width' => '50%'))!!}

                            {!! Html::image('img/costo.png', 'Comparahora', array('width' => '27px', 'class' => 'image'))!!}
                            <p>Renta Mensual: <strong>${{$renta_plan}}</strong></p>

                            {!! Html::image('img/internet.png', 'Comparahora', array('width' => '27px', 'class' => 'image'))!!}
                            <p>Datos: <strong>{{$datos}} MB</strong></p>

                            {!! Html::image('img/minutos.png', 'Comparahora', array('width' => '27px', 'class' => 'image'))!!}
                            <p>Minutos: <strong>{{$minutos}}</strong></p>

                            {!! Html::image('img/sms.png', 'Comparahora', array('width' => '27px', 'class' => 'image'))!!}
                            <p>SMS: <strong>{{$sms}}</strong></p>

                        </div>
                    </div>
                </div>
            </div>

            <p>Felicidades, has comprado un plan {{$nombre_plan}} con un smartphone {{$smartphone}}, el proceso completo
                de contratación y la entrega del equipo hasta tu domicilio durará aproximadamente 3 días </p>
            <br/>
            <h4>Ingresa a tu cuenta en Comparahora</h4>
            <p>Ingresa a tu cuenta en comparahora con el mail que proporcionaste para iniciar tu trámite de contratación,
                el password es tu primer nombre más el número de celular que registraste, sin espacios. P.E. (Carlos2225630362).
                No olvides cambiar tu contraseña.
            </p>
            <p>Desde tu cuenta tendrás la oportunidad de ver el status en el que se encuentra el proceso de contratación</p>

            <a href="http://localhost:8000/registrar/confirmacion/{{$codigo_confirmacion}}"><button type="button" class="btn btn-info center-block">Ingresar a mi cuenta</button></a>
            <br/>
        </div>
    </div>
</div>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>
</html>