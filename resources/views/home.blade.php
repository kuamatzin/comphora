@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Comparahora Admin Panel</div>

				<div class="panel-body">
					{!! Html::image('img/logotipo.png', 'Comparahora', array('class' => 'img-responsive center-block')) !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
