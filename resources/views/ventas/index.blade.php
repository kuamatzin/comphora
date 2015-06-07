@extends('app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="input-group"> <span class="input-group-addon">Filtro</span>
	          <input id="filter" type="text" class="form-control" placeholder="Buscar">
	        </div>
	        <hr>
		</div>
	</div>
</div>
<div class="table-responsive searchable">
	<table class="table table-hover table-bordered">
		<thead>
			<tr>
				<th></th>
				<th>Nombre</th>
				<th>Email</th>
				<th>Plan</th>
				<th>Renta</th>
				<th>Equipo</th>
				<th>Contrato</th>
				<th>Dif. Equipo</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			@foreach($ventas as $key => $venta)
			<tr id="res">
				<td>{{$key + 1}}</td>
				<td>{{$venta->user->nombre}}</td>
				<td>{{$venta->user->email}}</td>
				<td>{{$venta->costoagregado->plan->getInfo()->nombre}}</td>
				<td>${{$venta->costoagregado->plan->getInfo()->renta}}</td>
				<td>{{$venta->costoagregado->smartphone->nombre}}</td>
				<td>{{$venta->contrato}}</td>
				<td>${{$venta->costoagregado->difEquipo($venta->contrato) }}</td>
				<td>
					{!! Form::open(['action' => 'VentaPlanController@updateStatus']) !!}
                        {!! Form::hidden('invisible', $venta->id) !!}
                        {!! Form::select('status', ['1' => 'Activo', '2' => 'Buro de Crédito', '3' => 'Aprobado'], $venta->getOriginal('status'), ['class' => 'form-control']) !!}
						{!! Form::submit('Actualizar', ['class' => 'btn btn-sm btn-primary']) !!}
                    {!! Form::close() !!}
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection