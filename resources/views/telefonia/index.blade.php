@extends('app')

@section('content');
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<a href="{{ url('telefonia/create')}}"><button type="button" class="btn btn-primary">Crear plan de telefonia</button></a><br><br>
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
							<th>Locales</th>
							<th>Larga Inter</th>
							<th>Celular</th>
							<th>Renta</th>
							<th>Status</th>
							<th>Editar</th>
						</tr>
					</thead>
					<tbody>
						@foreach($telefonias as $key => $telefonia)
							<tr id="res">
								<td class="col-md-2">{{$telefonia->nombre}}</td>
								<td class="col-md-2">{{$telefonia->empresa}}</td>
								<td class="col-md-2">{{$telefonia->locales}}</td>
								<td class="col-md-2">{{$telefonia->larga_internacional}}</td>
								<td class="col-md-2">{{$telefonia->celular}}</td>
								<td class="col-md-2">{{$telefonia->renta_mensual}}</td>
								<td class="col-md-2">{{$telefonia->status}}</td>
								<td><a href="{{ action('TelefoniaController@edit', $telefonia->id) }}"><button type="button" class="btn btn-warning">Editar</button></a></td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection