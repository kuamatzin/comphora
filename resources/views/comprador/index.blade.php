@extends('customer')
@section('content')
<div class="container" ng-app="myApp">
	<div class="table-responsive searchable" ng-controller="DetalleController">
		<table class="table table-hover table-bordered">
			<thead class="customer-thead">
				<tr>
					<th></th>
					<th>Plan</th>
					<th>Equipo</th>
					<th>Diferencia Equipo</th>
					<th>Renta Mensual</th>
					<th>Contrato</th>
					<th>Status</th>
                    <th>Descargar</th>
                    <th>Subir Contrato</th>
				</tr>
			</thead>
			<tbody>
				@foreach($compras as $key => $compra)
				<tr id="res">
					<td>{{$key + 1}}</td>
					<td>
                        <div>
                            {!! Html::image('img/' . $compra->costoagregado->plan->getInfo()->compania . '.png', 'Comparahora', array('class' => 'img-responsive center-block')) !!}
                            {{$compra->costoagregado->plan->getInfo()->nombre}}
                            <br><br>
                            <button type="button" class="btn btn-info" ng-click="getPlan({{$compra->costoagregado->plan->id}});">Detalles</button>
                        </div> 
                    </td>
					<td>
                        <div>
                            {!! Html::image($compra->costoagregado->smartphone->imagen, 'Comparahora', array('class' => 'img-responsive center-block', 'style' => 'height:150px')) !!}
                            {{$compra->costoagregado->smartphone->nombre}}
                            <br><br>
                            <button type="button" class="btn btn-info" ng-click="getSmartphone({{$compra->costoagregado->smartphone->id}});">Detalles</button>
                        </div>
                    </td>
					<td>${{$compra->costoagregado->difEquipo($compra->contrato) }}</td>
					<td>${{$compra->costoagregado->plan->getInfo()->renta}}</td>
					<td>{{$compra->contrato}}</td>
					<td>{{$compra->status}}</td>
                    <td>
                        @if($compra->costoagregado->plan->getInfo()->compania == 'iusacell')
                            {!! Form::open(['action' => 'VentaPlanController@descargaContratoIusacell']) !!}
                                {!! Form::hidden('invisible', $compra->id) !!}
                                {!! Form::submit('Descargar', ['class' => 'btn btn-primary']) !!}
                            {!! Form::close() !!}

                        @elseif($compra->costoagregado->plan->getInfo()->compania == 'movistar')
                            {!! Form::open(['action' => 'VentaPlanController@descargaContratoMovistar']) !!}
                                {!! Form::hidden('invisible', $compra->id) !!}
                                {!! Form::submit('Descargar', ['class' => 'btn btn-primary']) !!}
                            {!! Form::close() !!}
                        
                        @else

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#{{$compra->costoagregado->plan->getInfo()->compania}}Modal">
                                Descargar
                            </button>
                        
                        @endif
                    </td>
                    <td>
                        {!! Form::open(['action' => 'VentaPlanController@storeContrato', 'files' => true]) !!}
                            {!! Form::hidden('invisible', $compra->id) !!}
                            {!! Form::file('contrato', ['title'=>'Seleccionar contrato', 'class' => 'filestyle', 'data-input' => 'false', 'data-buttonText' => 'Contrato', 'data-iconName' => 'glyphicon-file']) !!} <br>
                            {!! Form::submit('Subir', ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </td>
				</tr>
				@endforeach
			</tbody>
		</table>
        @include('comprador.modalPlan')
        @include('comprador.modalSmartphone')
	</div>
</div>
</div>
<!-- Modal -->
<div class="modal fade bs-example-modal-lg" id="telcelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Referencias</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(array('action' => 'VentaPlanController@descargaContratoTelcel')) !!}
                    <h3>Referencia 1</h3>
                    <!-- nombre Form input -->
                    <div class="form-group col-md-6">
                      {!! Form::text('nombre1', null, ['class' => 'form-control', 'placeholder' => 'Nombre y Apellidos']) !!}
                    </div>
                    <!-- direccion Form input -->
                    <div class="form-group col-md-6">
                      {!! Form::text('direccion1', null, ['class' => 'form-control', 'placeholder' => 'Dirección']) !!}
                    </div>
                    <!-- relación Form input -->
                    <div class="form-group col-md-6">
                      {!! Form::text('relacion1', null, ['class' => 'form-control', 'placeholder' => 'Relación']) !!}
                    </div>
                    <!-- telefono Form input -->
                    <div class="form-group col-md-6">
                      {!! Form::text('telefono1', null, ['class' => 'form-control', 'placeholder' => '(LADA) + Teléfono']) !!}
                    </div>
                    <h3>Referencia 2</h3>
                    <!-- nombre Form input -->
                    <div class="form-group col-md-6">
                        {!! Form::text('nombre2', null, ['class' => 'form-control', 'placeholder' => 'Nombre y Apellidos']) !!}
                    </div>
                    <!-- direccion Form input -->
                    <div class="form-group col-md-6">
                        {!! Form::text('direccion2', null, ['class' => 'form-control', 'placeholder' => 'Dirección']) !!}
                    </div>
                    <!-- relación Form input -->
                    <div class="form-group col-md-6">
                        {!! Form::text('relacion2', null, ['class' => 'form-control', 'placeholder' => 'Relación']) !!}
                    </div>
                    <!-- telefono Form input -->
                    <div class="form-group col-md-6">
                        {!! Form::text('telefono2', null, ['class' => 'form-control', 'placeholder' => '(LADA) + Teléfono']) !!}
                    </div>
                    <h3>Referencia 3</h3>
                    <!-- nombre Form input -->
                    <div class="form-group col-md-6">
                        {!! Form::text('nombre3', null, ['class' => 'form-control', 'placeholder' => 'Nombre y Apellidos']) !!}
                    </div>
                    <!-- direccion Form input -->
                    <div class="form-group col-md-6">
                        {!! Form::text('direccion3', null, ['class' => 'form-control', 'placeholder' => 'Dirección']) !!}
                    </div>
                    <!-- relación Form input -->
                    <div class="form-group col-md-6">
                        {!! Form::text('relacion3', null, ['class' => 'form-control', 'placeholder' => 'Relación']) !!}
                    </div>
                    <!-- telefono Form input -->
                    <div class="form-group col-md-6">
                        {!! Form::text('telefono3', null, ['class' => 'form-control', 'placeholder' => '(LADA) + Teléfono']) !!}
                    </div>
                    {!! Form::hidden('invisible', $compra->id) !!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                {!! Form::submit('Descargar', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<!-- Modal Movistar-->
<div class="modal fade bs-example-modal-lg" id="movistarModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Referencias</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(array('action' => 'VentaPlanController@descargaContratoTelcel')) !!}
                    <h3>Referencia 1</h3>
                    <!-- nombre Form input -->
                    <div class="form-group col-md-6">
                      {!! Form::text('nombre1', null, ['class' => 'form-control', 'placeholder' => 'Nombre y Apellidos']) !!}
                    </div>
                    <!-- direccion Form input -->
                    <div class="form-group col-md-6">
                      {!! Form::text('direccion1', null, ['class' => 'form-control', 'placeholder' => 'Dirección']) !!}
                    </div>
                    <!-- relación Form input -->
                    <div class="form-group col-md-6">
                      {!! Form::text('relacion1', null, ['class' => 'form-control', 'placeholder' => 'Relación']) !!}
                    </div>
                    <!-- telefono Form input -->
                    <div class="form-group col-md-6">
                      {!! Form::text('telefono1', null, ['class' => 'form-control', 'placeholder' => '(LADA) + Teléfono']) !!}
                    </div>
                    <h3>Referencia 2</h3>
                    <!-- nombre Form input -->
                    <div class="form-group col-md-6">
                        {!! Form::text('nombre2', null, ['class' => 'form-control', 'placeholder' => 'Nombre y Apellidos']) !!}
                    </div>
                    <!-- direccion Form input -->
                    <div class="form-group col-md-6">
                        {!! Form::text('direccion2', null, ['class' => 'form-control', 'placeholder' => 'Dirección']) !!}
                    </div>
                    <!-- relación Form input -->
                    <div class="form-group col-md-6">
                        {!! Form::text('relacion2', null, ['class' => 'form-control', 'placeholder' => 'Relación']) !!}
                    </div>
                    <!-- telefono Form input -->
                    <div class="form-group col-md-6">
                        {!! Form::text('telefono2', null, ['class' => 'form-control', 'placeholder' => '(LADA) + Teléfono']) !!}
                    </div>
                    <h3>Referencia 3</h3>
                    <!-- nombre Form input -->
                    <div class="form-group col-md-6">
                        {!! Form::text('nombre3', null, ['class' => 'form-control', 'placeholder' => 'Nombre y Apellidos']) !!}
                    </div>
                    <!-- direccion Form input -->
                    <div class="form-group col-md-6">
                        {!! Form::text('direccion3', null, ['class' => 'form-control', 'placeholder' => 'Dirección']) !!}
                    </div>
                    <!-- relación Form input -->
                    <div class="form-group col-md-6">
                        {!! Form::text('relacion3', null, ['class' => 'form-control', 'placeholder' => 'Relación']) !!}
                    </div>
                    <!-- telefono Form input -->
                    <div class="form-group col-md-6">
                        {!! Form::text('telefono3', null, ['class' => 'form-control', 'placeholder' => '(LADA) + Teléfono']) !!}
                    </div>
                    {!! Form::hidden('invisible', $compra->id) !!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                {!! Form::submit('Descargar', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
    angular.module('myApp', []).config(function($interpolateProvider){
        $interpolateProvider.startSymbol('{[{').endSymbol('}]}');
    })

    .controller('DetalleController', function($scope, $http){
        $scope.getPlan = function(id){
            $http.get('planes/' + id).success(function(plan){
                $scope.plan = plan;
                $('#modalPlan').modal('show');
            });
        }

        $scope.getSmartphone = function(id){
            $http.get('smartphones/' + id).success(function(smartphone){
                console.log(smartphone);
                $scope.smartphone = smartphone;
                $('#modalSmartphone').modal('show');
            });
        }
    })
    </script>
@endsection