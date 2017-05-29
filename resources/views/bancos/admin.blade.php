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
                        <h3 class="panel-title">Listado de bancos</h3>
                        @if(Auth::user()->type=="admin")
                            <a href="{{ route('bancos.create')}}" class="btn btn-primary btn-xs">Nuevo Banco</a>
                        @endif
                    </div>

                    <div class="panel-body">
                        <table class="table table-responsive table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center" width="10%">Web</th>
                                    <th class="text-center" width="60%">Banco</th>
                                    <th class="text-center" width="10%">Puntuación</th>
                                    @if(Auth::user()->type=="admin")
                                        <th class="text-center" width="20%">Acciones</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody> 
                                @foreach($bancos as $banco)
                                <tr>
                                    <td class="text-center">
                                        <a href="{{ $banco->web }}" title="{{ $banco->nombre }}" target="_blanck">
                                            <img src="{{ $banco->logo }}" alt="Ir a {{ $banco->nombre }}" width="30" height="30">
                                        </a>
                                    </td>
                                    <td>{{ $banco->nombre }}</td>
                                    <td class="text-center">{{ $banco->puntuacion }}</td>
                                    @if(Auth::user()->type=="admin")
                                        <td class="text-center">
                                            <a class="btn btn-info btn-xs" href="{{ route('bancos.edit',$banco->id)}}">
                                                <i class="fa fa-edit">
                                                </i>
                                                Editar
                                            </a>
                                            <a class="btn btn-primary btn-xs" href="{{ route('bancos.destroy',$banco->id) }}">
                                                <i class="fa fa-trash-o">
                                                </i>
                                                Eliminar
                                            </a>
                                        </td>
                                    @endif
                                    
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
