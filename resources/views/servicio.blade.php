@extends('layouts.app')

@section('content')
<div class="wrapper">
    <div class="section section-tabs">
        <div class="container">
            <ol class="breadcrumb">
              <li><a href="{{ route('home') }}">Inicio</a></li>
              <li class="active">{{ $servicio->servicio }}</li>
            </ol>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title ">
                               {{ $servicio->bancos()->count() }} bancos le ofrecen <strong>{{ $servicio->servicio }}</strong>
                            </h4>
                        </div>

                        <div class="panel-body">
                            <table class="table table-responsive table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center" rowspan="2" width="20%">Banco</th>
                                        <th class="text-center" colspan="{{ $servicio->parametros()->count() }}">Parámetros de comparación</th>
                                    </tr>
                                    <tr>
                                        @foreach($servicio->parametros as $p)
                                            <td class="text-center">{{ $p->parametro }}</td>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($servicio->bancos()->get() as $banco)
                                    <tr>
                                        <th>
                                            {{ $banco->nombre }}
                                        </th>
                                        @foreach($servicio->parametrosByBanco($banco->id)->get() as $p)
                                            <td class="text-center">{{ $p->valor }}</td>
                                        @endforeach
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
</div>
@endsection
