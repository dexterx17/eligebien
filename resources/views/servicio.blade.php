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
                    <div class="panel-heading">Asistente financiero</div>

                    <div class="panel-body">
                        <h4 class="text-center">
                           {{ $servicio->bancos()->count() }} bancos le ofrecen <strong>{{ $servicio->servicio }}</strong>
                        </h4>
                        <hr>
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
@endsection
