@extends('app')
@section('content')
<div class="container">
	<div class="input-group"> <span class="input-group-addon">Filtro</span>
      <input id="filter" type="text" class="form-control" placeholder="Buscar">
    </div>
    <hr>
	<div class="table-responsive searchable">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Renta</th>
					<th>Minutos</th>
					<th>SMS</th>
					<th>Internet</th>
					<th>Compañia</th>
					<th>Contrato</th>
					<th>Status</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
				@foreach($planes as $key => $plan)
				<tr id="res">
					<td class="col-md-2">{{$plan->getInfo()->nombre}}</td>
					<td>{{$plan->getInfo()->renta}}</td>
					<td>{{$plan->getInfo()->minutos_incluidos}}</td>
					<td>{{$plan->getInfo()->sms}}</td>
					<td>{{$plan->getInfo()->internet}} MB</td>
					<td>{{$plan->getInfo()->compania}}</td>
					<td>{{$plan->getInfo()->controlado}}</td>
					<td>{{$plan->status}}</td>
					<td><a href="{{ action('PlanController@edit', $plan->id) }}"><button type="button" class="btn btn-warning">Editar</button></a></td>
					<td><button type="button" class="btn btn-danger">Eliminar</button></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection