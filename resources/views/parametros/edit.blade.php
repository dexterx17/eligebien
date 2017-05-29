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
                        <h3 class="panel-title">Editar parámetro para <strong>{{ $servicio->servicio }}</strong></h3>
                    </div>

                    <div class="panel-body">
                        <form action="{{ route('parametros.update',$parametro->id) }}" method="post">
                            {{ csrf_field() }}
                             <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="parametro">Nombre</label>
                                        <input type="text" name="parametro" class="form-control" placeholder="Nombre del parámetro" value="{{ $parametro->parametro }}" required="required">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="unidad">Unidad</label>
                                        <input type="text" name="unidad" class="form-control" placeholder="Nombre del parámetro" value="{{ $parametro->unidad }}" required="required">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Descripción</label>
                                        <textarea rows="5" name="descripcion" class="form-control" placeholder="Descripción del servicio">{{ $parametro->descripcion }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-info btn-fill pull-right">Agregar servicio</button>
                            <a href="{{ route('admin.parametros',$servicio->id) }}" class="btn btn-danger btn-fill pull-right">Cancelar</a>
                            <div class="clearfix"></div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection