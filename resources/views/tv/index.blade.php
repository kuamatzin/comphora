@extends('app')

@section('content');
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<a href="{{ url('tv/create')}}"><button type="button" class="btn btn-primary">Crear plan de tv</button></a><br><br>
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
							<th>Canales</th>
							<th>Canales SD</th>
							<th>Canales HD</th>
							<th>Renta</th>
							<th>Pago Inicial</th>
							<th>Status</th>
							<th>Editar</th>
						</tr>
					</thead>
					<tbody>
						@foreach($tvs as $key => $tv)
							<tr id="res">
								<td class="col-md-2">{{$tv->nombre}}</td>
								<td class="col-md-2">{{$tv->empresa}}</td>
								<td class="col-md-2">{{$tv->canales}}</td>
								<td class="col-md-2">{{$tv->canales_SD}}</td>
								<td class="col-md-2">{{$tv->canales_HD}}</td>
								<td class="col-md-2">{{$tv->renta_mensual}}</td>
								<td>{{$tv->pago_inicial}}</td>
								<td class="col-md-2">{{$tv->status}}</td>
								<td><a href="{{ action('TvController@edit', $tv->id) }}"><button type="button" class="btn btn-warning">Editar</button></a></td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection