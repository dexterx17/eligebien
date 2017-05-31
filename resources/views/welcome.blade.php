@extends('layouts.app')

@section('content')
<div class="wrapper">
    <div class="main">
        <div class="section section-tabs">
            <div class="container">
                <ol class="breadcrumb">
                  <li class="active">Inicio</li>
                </ol>
                <div class="row">
                    <div class="col-md-12 offset-md-1 offset-xl-0">
                        <p class="category text-center">Consulta cuál es la mejor solución financiera que se ajusta a tus necesidades</p>
                        <!-- Nav tabs -->
                        <div class="card">
                            <ul class="nav nav-tabs justify-content-center nav-justified" role="tablist">
                                @foreach($servicios as $key=>$grupo)
                                <li class="nav-item">
                                    <a class="nav-link @if($key=='cuentas') active @endif" data-toggle="tab" href="#{{ $key }}" role="tab">
                                        {{ ucfirst($key) }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                            <div class="card-block">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    @foreach($servicios as $key=>$grupo)
                                    <div class="tab-pane @if($key=='cuentas') active @endif" id="{{ $key }}" role="tabpanel">
                                            <div class="list-group">
                                                 @foreach($grupo as $servicio)
                                                    <a href="{{ route('servicio',$servicio->slug) }}" class="list-group-item list-item-servicio">
                                                        <i class="{{ $servicio->icono }}"></i> 
                                                        <span>{{ $servicio->servicio }}</span>
                                                        <small class="badge badge-default" rel="tooltip" title="{{ $servicio->bancos()->count() }} bancos ofrecen este servicio" data-placement="top">
                                                            {{ $servicio->bancos()->count() }} 
                                                            <i class="now-ui-icons business_bank"></i>
                                                        </small>
                                                    </a>
                                                @endforeach
                                            </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Section Tabs -->
        <div class="section section-download" id="#download-section" data-background-color="black">
            <div class="container">
                <div class="row justify-content-md-center sharing-area text-center">
                    <div class="text-center col-md-12 col-lg-8">
                        <h3>Síguenos y ayúdanos a llegar a más personas!</h3>
                    </div>
                    <div class="text-center col-md-12 col-lg-8">
                        <a target="_blank" href="#" class="btn btn-neutral btn-icon btn-twitter" rel="tooltip" title="Follow us">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a target="_blank" href="#" class="btn btn-neutral btn-icon btn-facebook" rel="tooltip" title="Like us">
                            <i class="fa fa-facebook-square"></i>
                        </a>
                        <a target="_blank" href="#" class="btn btn-neutral btn-icon btn-linkedin" rel="tooltip" title="Follow us">
                            <i class="fa fa-linkedin"></i>
                        </a>
                        <a target="_blank" href="#" class="btn btn-neutral btn-icon btn-github" rel="tooltip" title="Star on Github">
                            <i class="fa fa-github"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/main-->
</div>
@endsection
