@extends('app')

@section('content');
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<a href="{{ url('internet/create')}}"><button type="button" class="btn btn-primary">Crear plan de telefonia</button></a><br><br>
			<div class="input-group"> <span class="input-group-addon">Filtro</span>
	          <input id="filter" type="text" class="form-control" placeholder="Buscar">
	        </div>
	        <hr>
			<div class="table-responsive searchable">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Empresa</th>
							<th>Velocidad</th>
							<th>Renta</th>
							<th>Pago Inicial</th>
							<th>Status</th>
							<th>Editar</th>
						</tr>
					</thead>
					<tbody>
						@foreach($internets as $key => $internet)
							<tr id="res">
								<td class="col-md-2">{{$internet->nombre}}</td>
								<td class="col-md-2">{{$internet->empresa}}</td>
								<td class="col-md-2">{{$internet->velocidad}} MB</td>
								<td class="col-md-2">{{$internet->renta_mensual}}</td>
								<td class="col-md-2">{{$internet->pago_inicial}}</td>
								<td class="col-md-2">{{$internet->status}}</td>
								<td><a href="{{ action('InternetController@edit', $internet->id) }}"><button type="button" class="btn btn-warning">Editar</button></a></td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection