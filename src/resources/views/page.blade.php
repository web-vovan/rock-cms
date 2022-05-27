@extends('adminlte::master')

@inject('layoutHelper', 'JeroenNoten\LaravelAdminLte\Helpers\LayoutHelper')

@section('adminlte_css')
    @stack('css')
    @yield('css')
@stop

@section('adminlte_css_pre')
    <link rel="stylesheet" href="{{ asset('vendor/rock-cms/css/app.css') }}">
    <script src="{{ asset('vendor/rock-cms/js/app.js') }}"></script>

    @if (file_exists (public_path ('vendor/rock-cms/custom.css')))
        <link rel="stylesheet" href="{{ asset('vendor/rock-cms/custom.css') }}">
    @endif

    @if (file_exists (public_path ('vendor/rock-cms/custom.js')))
        <script src="{{ asset('vendor/rock-cms/js/custom.js.js') }}"></script>
    @endif
@stop

@section('classes_body', $layoutHelper->makeBodyClasses())

@section('body_data', $layoutHelper->makeBodyData())

@section('body')
    <div class="wrapper">

        {{-- Top Navbar --}}
        @if($layoutHelper->isLayoutTopnavEnabled())
            @include('adminlte::partials.navbar.navbar-layout-topnav')
        @else
            @include('adminlte::partials.navbar.navbar')
        @endif

        {{-- Left Main Sidebar --}}
        @if(!$layoutHelper->isLayoutTopnavEnabled())
            @include('adminlte::partials.sidebar.left-sidebar')
        @endif

        {{-- Flash Messages--}}
        @include('rock-cms::partials.flash-messages')

        {{-- Content Wrapper --}}
        @empty($iFrameEnabled)
            @include('adminlte::partials.cwrapper.cwrapper-default')
        @else
            @include('adminlte::partials.cwrapper.cwrapper-iframe')
        @endempty

        {{-- Footer --}}
        @include('rock-cms::partials.footer')

        {{-- Right Control Sidebar --}}
        @if(config('adminlte.right_sidebar'))
            @include('adminlte::partials.sidebar.right-sidebar')
        @endif

    </div>
@stop

@section('adminlte_js')
    @stack('js')
    @yield('js')
@stop
