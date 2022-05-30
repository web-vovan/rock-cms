@php
$suffix = isset($type) ? '-' . $type : '';
@endphp

<ul class="nav nav-pills mb-3" role="tablist">
    <li class="nav-item" role="presentation" wire:ignore>
        <a class="nav-link active" id="ru-tab{{ $suffix }}" data-toggle="pill" href="#ru-content{{ $suffix }}" role="tab">ru</a>
    </li>
    <li class="nav-item" role="presentation" wire:ignore>
        <a class="nav-link" id="en-tab{{ $suffix }}" data-toggle="pill" href="#en-content{{ $suffix }}" role="tab">en</a>
    </li>
</ul>
<div class="tab-content">
    <div class="tab-pane fade show active" id="ru-content{{ $suffix }}" wire:ignore.self role="tabpanel">
        @yield('ru' . $suffix)
    </div>
    <div class="tab-pane fade" id="en-content{{ $suffix }}" wire:ignore.self role="tabpanel">
        @yield('en' . $suffix)
    </div>
</div>
