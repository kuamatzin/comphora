@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="input-group"><span class="input-group-addon">Filtro</span>
                    <input id="filter" type="text" class="form-control" placeholder="Buscar">
                </div>
                <hr>
                <div class="table-responsive searchable">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Imagen</th>
                            <th>Nombre</th>
                            <th>Marca</th>
                            <th>OS</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($equipos as $key => $equipo)
                            <tr id="res">
                                <td class="col-md-1"><img src="{{$equipo->imagen}}" alt="" class="img-responsive"></td>
                                <td class="col-md-2">{{$equipo->nombre}}</td>
                                <td class="col-md-2">{{$equipo->marca}}</td>
                                <td class="col-md-2">{{$equipo->os}}</td>
                                <td><a href="{{ action('EquipoController@edit', $equipo->id) }}">
                                        <button type="button" class="btn btn-warning">Editar</button>
                                    </a></td>
                                <td>
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
