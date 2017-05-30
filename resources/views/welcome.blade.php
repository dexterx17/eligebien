@extends('layouts.app')

@section('content')
<div class="wrapper">
    <div class="section section-tabs">
        <div class="container">
            <ol class="breadcrumb">
              <li class="active">Inicio</li>
            </ol>
            <div class="row">
                <div class="col-md-12 offset-md-1 col-xl-6 offset-xl-0">
                    <p class="category text-center">Consulta cuál es la mejor solución financiera que se ajusta a tus necesidades</p>
                    <!-- Nav tabs -->
                    <div class="card">
                        <ul class="nav nav-tabs justify-content-center nav-justified" role="tablist">
                            @foreach($servicios as $key=>$grupo)
                            <li class="nav-item">
                                <a class="nav-link @if($key=='cuentas') active @endif" data-toggle="tab" href="#{{ $key }}" role="tab">
                                    <i class="now-ui-icons business_bank"></i> {{ ucfirst($key) }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                        <div class="card-block">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                @foreach($servicios as $key=>$grupo)
                                <div class="tab-pane @if($key=='cuentas') active @endif" id="{{ $key }}" role="tabpanel">
                                    <p>
                                    </p>
                                        <div class="list-group">
  
                                             @foreach($grupo as $servicio)
                                                <a href="{{ route('servicio',$servicio->slug) }}" class="list-group-item">
                                                    <p>
                                                        <i class="now-ui-icons business_bank"></i> 
                                                        {{ $servicio->servicio }} 
                                                        <small class="pull-right">{{ $servicio->bancos()->count() }} bancos</small>
                                                    </p>
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
</div>
@endsection
