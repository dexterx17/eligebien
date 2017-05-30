@extends('layouts.admin')

@section('left_menu')
    @include('partials.left_menu')
@endsection

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Listado de servicios</h3>
                        <a href="{{ route('servicios.create')}}" class="btn btn-primary btn-xs">Nuevo Servicio</a>
                    </div>

                    <div class="panel-body">
                        <table class="table table-responsive table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center" width="10%">Icono</th>
                                    <th class="text-center" width="20%">Servicio</th>
                                    <th class="text-center" width="10%">Parámetros</th>
                                    <th class="text-center" width="50%">Descripción</th>
                                    <th class="text-center" width="10%">Acciones</th>
                                </tr>
                            </thead>
                            <tbody> 
                                @foreach($servicios as $servicio)
                                <tr>
                                    <td class="text-center">
                                        <a href="{{ $servicio->web }}" title="{{ $servicio->servicio }}" target="_blanck">
                                            <img src="{{ $servicio->logo }}" alt="{{ $servicio->servicio }}" width="30" height="30">
                                        </a>
                                    </td>
                                    <td>{{ $servicio->servicio }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.parametros',$servicio->id) }}">{{ $servicio->parametros->count() }}</a>
                                    </td>
                                    <td class="text-center">{{ $servicio->puntuacion }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-info btn-xs" href="{{ route('servicios.edit',$servicio->id)}}">
                                            <i class="fa fa-edit">
                                            </i>
                                            Editar
                                        </a>
                                        <a class="btn btn-primary btn-xs" href="{{ route('servicios.destroy',$servicio->id) }}">
                                            <i class="fa fa-trash-o">
                                            </i>
                                            Eliminar
                                        </a>
                                    </td>
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
