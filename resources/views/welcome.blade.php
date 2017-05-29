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
                            Consulta cuál es la mejor solución financiera que se ajusta a tus necesidades.
                        </h4>
    <!--                    <hr>
                        @foreach($servicios as $servicio)
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                      <img class="media-object" src="{{ $servicio->icono }}" alt="{{ $servicio->servicio }}">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">{{ $servicio->servicio }}</h4>
                                    <ul>
                                        @foreach($servicio->parametros as $p)
                                            <li>{{ $p->parametro }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                        <hr>-->
                        <hr>
                        <table class="table table-responsive table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">Servicio</th>
                                    <th class="text-center">Parámetros de comparación</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($servicios as $servicio)
                                    <tr>
                                        <th class="text-center text-uppercase">{{ ucfirst($servicio->servicio) }}</th>
                                        <td>
                                            <ul>
                                                @foreach($servicio->parametros as $p)
                                                    <li>{{ $p->parametro }}</li>
                                                @endforeach
                                            </ul>
                                        </td>
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
