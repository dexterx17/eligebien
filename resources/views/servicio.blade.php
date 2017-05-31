@extends('layouts.app')

@section('content')
<div class="wrapper">
    <div class="section section-about-us">
        <div class="container">
            <ol class="breadcrumb">
              <li><a href="{{ route('home') }}">Inicio</a></li>
              <li class="active">Servicios</li>
            </ol>
            <div class="row">
                <div class="col-md-8 offset-md-2 text-center">
                    <h2 class="title">{{ $servicio->servicio }}</h2>
                    <h5 class="description"> Analice y compare cuál es la mejor alternativa para abrir <strong>{{ $servicio->servicio }}</strong> entre los {{ $servicio->bancos()->count() }} bancos registrados en nuestro sistema</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title ">
                              
                            </h4>
                        </div>

                        <div class="panel-body">
                            <div class="card">
                                <ul class="nav nav-tabs justify-content-center nav-justified" role="tablist">
                                    @foreach($servicio->parametros as $key=>$p)
                                    <li class="nav-item">
                                        <a class="nav-link @if($key=='cuentas') active @endif" data-toggle="tab" href="#param{{ $p->id }}" role="tab">
                                            {{ $p->parametro }}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                                <div class="card-block">
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        @foreach($servicio->parametros as $key=>$p)
                                        <div class="tab-pane @if($key==0) active @endif" id="param{{ $p->id }}" role="tabpanel">
                                            <table class="table table-responsive table-hover table-bordered">
                                                <tbody>
                                                    @foreach($servicio->bancos()->get() as $banco)
                                                    <tr>
                                                        <th width="30%">
                                                            {{ $banco->nombre }}
                                                        </th>
                                                        @foreach($servicio->parametrosByBanco($banco->id)->get() as $param)
                                                            @if($p->id ==$param->id)
                                                                <td width="70%" class="text-center">
                                                                    @if($param->unidad=="texto")
                                                                        <ul>
                                                                        @foreach(explode(";",$param->valor) as $v)
                                                                            <li>{{ $v }}</li>
                                                                        @endforeach
                                                                        </ul>
                                                                    @else
                                                                        {{ $param->valor }} 
                                                                    @endif
                                                                </td>
                                                            @endif
                                                        @endforeach
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div><!--/card-->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
