@extends('app')
@section('content')
<div class="container">
	<div class="table-responsive searchable">
		<table class="table table-hover table-bordered">
			<thead>
				<tr>
					<th></th>
					<th>Plan</th>
					<th>Equipo</th>
					<th>Diferencia Equipo</th>
					<th>Renta Mensual</th>
					<th>Contrato</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				@foreach($compras as $key => $compra)
				<tr id="res">
					<td>{{$key + 1}}</td>
					<td>{{$compra->costoagregado->plan->getInfo()->nombre}}</td>
					<td>{{$compra->costoagregado->smartphone->nombre}}</td>
					<td>${{$compra->costoagregado->difEquipo($compra->contrato) }}</td>
					<td>${{$compra->costoagregado->plan->getInfo()->renta}}</td>
					<td>{{$compra->contrato}} meses</td>
					<td>{{$compra->status}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection