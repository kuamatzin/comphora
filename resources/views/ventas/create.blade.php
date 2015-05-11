@extends('app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			{!! Form::open(['url' => 'ventas']) !!}
				@include('ventas.form', ['submitButtonText' => 'Crear Venta'])
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection