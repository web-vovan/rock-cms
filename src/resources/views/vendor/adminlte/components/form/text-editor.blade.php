<textarea id="{{ $id }}" name="{{ $id }}"
    {{ $attributes->merge(['class' => $makeItemClass()]) }}
>{{ $getOldValue($errorKey, $slot) }}</textarea>

@empty($ajaxEditor)
    @push('js')
@endempty
<script>
    $(() => {
        let usrCfg = @json($config);

        usrCfg.toolbar = [
            ['style', ['style']],
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['view', ['codeview']]
        ];

        @if ($attributes->get('enableMedia'))
            usrCfg.toolbar.push(['insert', ['link', 'picture', 'video']])
        @else
            usrCfg.toolbar.push(['insert', ['link']])
        @endif

        // для поддержки livewire
        usrCfg.callbacks = {
            onChange: function(contents, $editable) {
                @this.set('{{$name}}', contents);
            }
        }

        @isset($attributes['placeholder'])
            usrCfg['placeholder'] = "{{ $attributes['placeholder'] }}";
        @endisset

        usrCfg['popover'] = {
            image: [
                ['custom', ['imageAttributes']],
                ['imagesize', ['imageSize100', 'imageSize50', 'imageSize25']],
                ['float', ['floatLeft', 'floatRight', 'floatNone']],
                ['remove', ['removeMedia']]
            ],
        }

        usrCfg['imageAttributes'] = {
            icon:'<i class="note-icon-pencil"/>',
            removeEmpty:false, // true = remove attributes | false = leave empty if present
            disableUpload: true // true = don't display Upload Options | Display Upload Options
        };

        usrCfg['lang'] = 'ru-RU';

        // Initialize the plugin.
        $('#{{ $id }}').summernote(usrCfg);

        // Check for disabled attribute.

        @isset($attributes['disabled'])
            $('#{{ $id }}').summernote('disable');
        @endisset
    })

</script>
@empty($ajaxEditor)
    @endpush
@endempty
