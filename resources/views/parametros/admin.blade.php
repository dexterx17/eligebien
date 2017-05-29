@extends('layouts.app')

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
                        <h3 class="panel-title">Parámetros de comparación para <strong>{{ $servicio->servicio }}</strong></h3>
                        <a href="{{ route('parametros.create',$servicio->id)}}" class="btn btn-primary btn-xs">Nuevo Parámetro</a>
                    </div>

                    <div class="panel-body">
                        <table class="table table-responsive table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center" width="10%">Parámetro</th>
                                    <th class="text-center" width="20%">Unidad</th>
                                    <th class="text-center" width="60%">Descripción</th>
                                    <th class="text-center" width="10%">Acciones</th>
                                </tr>
                            </thead>
                            <tbody> 
                                @foreach($servicio->parametros as $parametro)
                                <tr>
                                    <td>{{ $parametro->parametro }}</td>
                                    <td class="text-center">
                                        {{ $parametro->unidad }}
                                    </td>
                                    <td class="text-center">{{ $parametro->descripcion }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-info btn-xs" href="{{ route('parametros.edit',$parametro->id)}}">
                                            <i class="fa fa-edit">
                                            </i>
                                            Editar
                                        </a>
                                        <a class="btn btn-primary btn-xs" href="{{ route('parametros.destroy',$parametro->id) }}">
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
