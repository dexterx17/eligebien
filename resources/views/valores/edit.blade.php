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
                        <h3 class="panel-title">Editar servico de <strong>{{ $banco->nombre}}</strong></h3>
                    </div>

                    <div class="panel-body">
                        <form action="{{ route('valores.update',$servicio->id) }}" method="post">
                            {{ csrf_field() }}
                            <fieldset id="parametros">
                                <legend>Parámetros de comparación <strong>{{ $servicio->servicio }}</strong></legend>
                            </fieldset>

                            @foreach($servicio->parametrosByBanco($banco->id)->get() as $p)

                                @if($p->unidad=="texto")
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>{{ $p->parametro }}</label>
                                            <textarea name="param{{ $p->id}}" class="form-control" required="required" placeholder="{{ $p->descripcion }}">{{ $p->valor }} </textarea>
                                        </div>
                                    </div>
                                </div>
                                @endif

                                @if($p->unidad=="numero")
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>{{ $p->parametro }}</label>
                                            <input type="number" name="param{{ $p->id}}" class="form-control" required="required" placeholder="{{ $p->descripcion }}" value="{{ $p->valor }}" />
                                        </div>
                                    </div>
                                </div>
                                @endif

                                @if($p->unidad=="booleano")
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>{{ $p->parametro }}</label>
                                            <select name="param{{ $p->id}}" class="form-control" required="required" placeholder="{{ $p->descripcion }}">
                                                <option value="1" @if($p->valor=="1") selected @endif>SI</option>
                                                <option value="0" @if($p->valor=="0") selected @endif>NO</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                @endif

                            @endforeach
                            <input type="hidden" name="banco_id" value="{{ $banco->id }}">
                            <input type="hidden" name="servicio_id" value="{{ $servicio->id }}">
                            <button type="submit" class="btn btn-info btn-fill pull-right">Agregar servicio</button>
                            <a href="{{ route('admin.valores',$banco->id) }}" class="btn btn-danger btn-fill pull-right">Cancelar</a>
                            <div class="clearfix"></div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection