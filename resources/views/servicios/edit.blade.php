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
                        <h3 class="panel-title">Editar servicio</h3>
                    </div>

                    <div class="panel-body">
                        <form action="{{ route('servicios.update',$servicio->id) }}" method="post">
                            {{ csrf_field() }}
                             <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="servicio">Nombre</label>
                                        <input type="text" name="servicio" class="form-control" placeholder="Nombre del servicio" value="{{ $servicio->servicio }}" required="required">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Descripción</label>
                                        <textarea rows="5" name="descripcion" class="form-control" placeholder="Descripción del servicio">{{ $servicio->descripcion }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-info btn-fill pull-right">Actualizar servicio</button>
                            <a href="{{ route('admin.servicios') }}" class="btn btn-danger btn-fill pull-right">Cancelar</a>
                            <div class="clearfix"></div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection