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
                        <h3 class="panel-title">Servicios de <strong>{{ $banco->nombre }}</strong></h3>
                        <a href="{{ route('valores.create',$banco->id)}}" class="btn btn-primary btn-xs">Asignar Servicio</a>
                    </div>

                    <div class="panel-body">
                        <table class="table table-responsive table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center" width="30%">Servicio</th>
                                    <th class="text-center" width="60%">Parámetros</th>
                                    <th class="text-center" width="10%">Acciones</th>
                                </tr>
                            </thead>
                            <tbody> 
                                @foreach($banco->servicios()->get() as $servicio)
                                <tr>
                                    <td>{{ $servicio->servicio }}</td>
                                    <td class="text-center">
                                        <table class="table table-bordered table-hover">
                                            <tbody>
                                                @foreach($servicio->parametrosByBanco($banco->id)->get() as $p)
                                                <tr>
                                                    <td>
                                                        {{ $p->parametro }} 
                                                    </td>
                                                    <td>
                                                        @if($p->unidad=="texto")
                                                            <ul>
                                                            @foreach(explode(";",$p->valor) as $v)
                                                                <li>{{ $v }}</li>
                                                            @endforeach
                                                            </ul>
                                                        @else
                                                            {{ $p->valor }} 
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </td>
                                    <td class="text-center">
                                        <a class="btn btn-info btn-xs" href="{{ route('valores.edit',[$banco->id,$servicio->id])}}">
                                            <i class="fa fa-edit">
                                            </i>
                                            Editar
                                        </a>
                                        <a class="btn btn-primary btn-xs" href="{{ route('valores.destroy',[$banco->id,$servicio->id]) }}">
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
