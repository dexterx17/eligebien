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
                        <h3 class="panel-title">Nuevo servicio de <strong>{{ $banco->nombre }}</strong></h3>
                    </div>

                    <div class="panel-body">
                        <form action="{{ route('valores.store') }}" method="post">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="servicio_id">Servicio</label>
                                        <select name="servicio_id" class="form-control" id="servicio" placeholder="">
                                            <option value="">Seleccione un servicio</option>
                                            @foreach($servicios as $s)
                                                @if(!in_array($s->id,$servicios_asignados))
                                                <option value="{{ $s->id }}">{{ $s->servicio }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <fieldset id="parametros">
                                <legend>Seleccione un servicio</legend>
                            </fieldset>
                            <input type="hidden" name="banco_id" value="{{ $banco->id }}">
                            <button type="submit" class="btn btn-info btn-fill pull-right">Actualizar servicio</button>
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

@section('js')
<script type="text/javascript" charset="utf-8">
    function main(){

    }

    function crear_input(dato){
        console.log(dato);
        var input = '<div class="row"><div class="col-md-12"><div class="form-group"><label>'
            input += dato.parametro+'</label>';
            switch (dato.unidad) {
                case "texto":
                    input += '<textarea name="param';
                    input += dato.id+'" rows="5" class="form-control" required="required" placeholder="';
                    input += dato.descripcion+'"></textarea>';
                    break;
                case "booleano":
                    input += '<select name="param';
                    input += dato.id+'" class="form-control" required="required" placeholder="';
                    input += dato.descripcion+'"><option value="1">SI</option><option value="0">NO</option></select>';
                    break;
                default:
                    input += '<input type="text" name="param';
                    input += dato.id+'" class="form-control" placeholder="';
                    input += dato.descripcion+'" required="required">';
                    break;
            }
            input += '</div></div></div>';
        return input;
    }
    $(document).on('change', '#servicio',function(){
        var servicio_id = $(this).val();
        
        if(servicio_id!=""){
            var $selected = $(this).find(":selected");
            $.get("{{ route('admin.parametros.list','') }}/"+servicio_id,function(data){
                $('#parametros').html('<legend>Parámetros de comparación <strong>'+$selected.html()+'</strong></legend>');
                for(var i=0; i<data.length; i++){
                    var d = data[i];
                    $('#parametros').append(crear_input(d));
                }
            },'json');
        }else{
            $('#parametros').html('<legend>Seleccione un servicio</legend>');
        }
    });
    $(document).ready(main);
</script>
@endsection