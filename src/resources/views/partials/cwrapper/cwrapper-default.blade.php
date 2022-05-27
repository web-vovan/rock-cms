@inject('layoutHelper', 'JeroenNoten\LaravelAdminLte\Helpers\LayoutHelper')

@if($layoutHelper->isLayoutTopnavEnabled())
    @php( $def_container_class = 'container' )
@else
    @php( $def_container_class = 'container-fluid' )
@endif

{{-- Default Content Wrapper --}}
<div class="content-wrapper {{ config('adminlte.classes_content_wrapper', '') }}">
    {{-- Content Header --}}
    <div class="content-header">

        @hasSection('breadcrumbs')
            <div class="{{ config('adminlte.classes_content_header') ?: $def_container_class }}">
                @yield('breadcrumbs')
            </div>
        @endif

        @hasSection('buttons')
            <div class="{{ config('adminlte.classes_content_header') ?: $def_container_class }} my-3">
                @yield('buttons')
            </div>
        @endif

        @hasSection('content_title')
            <div class="{{ config('adminlte.classes_content_header') ?: $def_container_class }}">
                @yield('content_title')
            </div>
        @endif
    </div>

    {{-- Main Content --}}
    <div class="content">
        <div class="{{ config('adminlte.classes_content') ?: $def_container_class }}">
            <div class="card">
                <div class="card-body">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

</div>
