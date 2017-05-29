<div class="sidebar" data-color="blue" data-image="assets/img/sidebar-5.jpg">

<!--

    Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
    Tip 2: you can also add an image using data-image tag

-->

	<div class="sidebar-wrapper">
        <div class="logo">
            <a href="{{ url('/') }}" class="simple-text">
                 {{ config('app.name', 'Laravel') }}
            </a>
        </div>

        <ul class="nav">

            <li @if($active=="dashboard") class="active" @endif>
                <a href="{{ route('home') }}">
                    <i class="pe-7s-graph"></i>
                    <p>Asistente Financiero</p>
                </a>
            </li>

            <li @if($active=="bancos") class="active" @endif>
                <a href="{{ route('admin.bancos') }}">
                    <i class="pe-7s-user"></i>
                    <p>Bancos</p>
                </a>
            </li>
            @if(Auth::user())
                @if(Auth::user()->type=="admin")
                    <li @if($active=="servicios") class="active" @endif>
                        <a href="{{ route('admin.servicios') }}">
                            <i class="pe-7s-note2"></i>
                            <p>Servicios</p>
                        </a>
                    </li>
                @endif
            @endif
        </ul>
	</div>
</div>