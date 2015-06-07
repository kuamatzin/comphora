<div class="col-md-8">
    <div class="row">
        <div class="col-md-12">
            <h2>Datos Personales</h2>
            <hr/>
            <!-- nombre Form input -->
            <div class="form-group col-md-6">
              {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre(s)']) !!}
            </div>
            <!-- apellidoPaterno Form input -->
            <div class="form-group col-md-6">
              {!! Form::text('apellido_paterno', null, ['class' => 'form-control', 'placeholder' => 'Apellido Paterno']) !!}
            </div>
            <!-- apellidoMaterno Form input -->
            <div class="form-group col-md-6">
              {!! Form::text('apellido_materno', null, ['class' => 'form-control', 'placeholder' => 'Apellido Materno']) !!}
            </div>
            <!-- email Form input -->
            <div class="form-group col-md-6">
              {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
            </div>
            <!-- telefono Form input -->
            <div class="form-group col-md-6">
              {!! Form::text('telefono', null, ['class' => 'form-control', 'placeholder' => 'Telefono (LADA + Número)']) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h2>Dirección</h2>
            <hr/>
            <!-- calle Form input -->
            <div class="form-group col-md-6">
              {!! Form::text('calle', null, ['class' => 'form-control', 'placeholder' => 'Calle']) !!}
            </div>
            <!-- numero_exterior Form input -->
            <div class="form-group col-md-2">
              {!! Form::text('numero_exterior', null, ['class' => 'form-control', 'placeholder' => 'N. Exterior']) !!}
            </div>
            <!-- numero_interior Form input -->
            <div class="form-group col-md-2">
              {!! Form::text('numero_interior', null, ['class' => 'form-control', 'placeholder' => 'N. Interior']) !!}
            </div>
            <!-- codigo postal Form input -->
            <div class="form-group col-md-2">
                {!! Form::text('codigo_postal', null, ['class' => 'form-control', 'placeholder' => 'C.P.']) !!}
            </div>
            <!-- colonia Form input -->
            <div class="form-group col-md-6">
              {!! Form::text('colonia', null, ['class' => 'form-control', 'placeholder' => 'Colonia']) !!}
            </div>
            <!-- municipio Form input -->
            <div class="form-group col-md-6">
              {!! Form::text('municipio', null, ['class' => 'form-control', 'placeholder' => 'Municipio']) !!}
            </div>
            <!-- ciudad Form input -->
            <div class="form-group col-md-6">
              {!! Form::text('ciudad', null, ['class' => 'form-control', 'placeholder' => 'Ciudad']) !!}
            </div>
            <!-- estado Form input -->
            <div class="form-group col-md-6">
              {!! Form::text('estado', null, ['class' => 'form-control', 'placeholder' => 'Estado']) !!}
            </div>
        </div>
    </div>
    <!--
    <hr>
    <div class="row">
        <div class="col-md-6">
            <h3 style="margin-top:0px">Formas de Pago</h3>

            <div class="radio">
                <label>
                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                    Tarjeta de Débito/Crédito
                </label>
            </div>
            Paga en línea con Visa, Mastercard o Amex protegido por SSL y respaldado por Banorte
            <br>
            <div class="radio">
                <label>
                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                    Pago en efectivo
                </label>
            </div>
            Paga en más de 20,000 establecimientos incluyendo bancos y sucursales Oxxo
        </div>
        <div class="col-md-6">
            <input type="text" class="form-control" id="tarjeta_c" placeholder="Número de tarjeta">
            <br>

            <select class="form-control" id="bancos" style="width:110px; display:inline">
                <option value="bank">Banco:</option>
                <option value="banamex">Banamex</option>
                <option value="bancomer">Bancomer</option>
                <option value="santander">Santander</option>
                <option value="scotianbank">ScotiaBank</option>
                <option value="banorte">Banorte</option>
                <option value="hsbc">HSBC</option>
            </select>

            Fecha Exp.
            <select class="form-control" style="width:70px; display:inline">
                <option>01</option>
                <option>02</option>
                <option>03</option>
                <option>04</option>
                <option>05</option>
                <option>06</option>
                <option>07</option>
                <option>08</option>
                <option>09</option>
                <option>10</option>
                <option>11</option>
                <option>12</option>
            </select>

            <p style="display:inline">/</p>
            <select class="form-control" style="width:110px; display:inline">
                <option>2015</option>
                <option>2016</option>
                <option>2017</option>
                <option>2018</option>
                <option>2019</option>
                <option>2020</option>
                <option>2021</option>
                <option>2022</option>
                <option>2023</option>
                <option>2024</option>
                <option>2025</option>
                <option>2026</option>
            </select>
            Código de expiración
            <input type="text" class="form-control" id="code" placeholder="CVC"
                   style="height:30px; margin-bottom:5px; display:inline; width:70px" maxlength="3">

        </div>
    </div>-->
</div>
{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary pull-right']) !!}