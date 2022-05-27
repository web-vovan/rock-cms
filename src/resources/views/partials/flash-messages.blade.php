@if (session()->has('resource-create'))
    @push('js')
        <script>
            const event = new Event('resource-create');
            window.dispatchEvent(event);
        </script>
    @endpush
@endif

@if (session()->has('resource-update'))
    @push('js')
        <script>
            const event = new Event('resource-update');
            window.dispatchEvent(event);
        </script>
    @endpush
@endif

@if (session()->has('resource-delete'))
    @push('js')
        <script>
            const event = new Event('resource-delete');
            window.dispatchEvent(event);
        </script>
    @endpush
@endif
