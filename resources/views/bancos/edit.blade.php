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
                        <h3 class="panel-title">Editar banco</h3>
                    </div>

                    <div class="panel-body">
                        <form action="{{ route('bancos.update',$banco->id) }}" method="post">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" name="nombre" class="form-control" placeholder="Nombre del banco" value="{{ $banco->nombre }}" required="required">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="puntuacion">Puntuación</label>
                                        <input type="text" name="puntuacion" value="{{ $banco->puntuacion }}" class="form-control" placeholder="Puntuación del banco" required="required">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Web</label>
                                        <input type="text" name="web" class="form-control" placeholder="Sitio web del banco" value="{{ $banco->web }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Teléfono</label>
                                        <input type="text" name="telefonos" class="form-control" placeholder="Teléfono de Asistencia en línea del banco" value="{{ $banco->telefono }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Descripción</label>
                                        <textarea rows="5" name="descripcion" class="form-control" placeholder="Descripción del banco" value="{{ $banco->descripcion }}"></textarea>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-info btn-fill pull-right">Actualizar banco</button>
                            <a href="{{ route('admin.bancos') }}" class="btn btn-danger btn-fill pull-right">Cancelar</a>
                            <div class="clearfix"></div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection