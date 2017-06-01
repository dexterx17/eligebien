
@extends('layouts.app')

@section('content')
<div class="wrapper">
    <div class="main">
        <div class="section section-tabs">
            <div class="container">
                <ol class="breadcrumb">
                  <li><a href="{{ route('home') }}">Inicio</a></li>
                  <li class="active">Bot</li>
                </ol>
                <div class="row">
                    <div class="col-sm-9 col-lg-9">
                        <div class="stage">
                            <div class="ken stance"></div>
                        </div>

                        <div class="commands">
                          <h1>Controles</h1>

                            Punch: <button id="a">a</button><br>
                            Kick: <button id="z">z</button><br>
                            Reverse kick: <button id="e">e</button><br>
                            <br>
                            Tatsumaki: <button id="q">q</button><br>
                            Hadoken: <button id="s">s</button><br>
                            Shoryuken: <button id="d">d</button><br>
                            <br>
                            Jump: &nbsp;&nbsp;&nbsp;<button id="up">▲</button><br>
                            Walk: <button id="left">◀</button><button id="right">►</button><br>
                            Kneel: &nbsp;&nbsp;<button id="down">▼</button>
                        </div>
                        
                    </div>
                    <div class="col-sm-3 col-lg-3">
                        <div class="content-pig">
                            <div class="pig animado"></div>
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
