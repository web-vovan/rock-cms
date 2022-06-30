@php
    /*
     фикс для сортируемых блоков
     иначе если в id есть точка, то js не сработает
     */
    $fieldId = str_replace('.', '_', $field);
    $enableMedia = isset($enableMedia);
@endphp

<div class="form-group row mb-4" wire:ignore>
    <label for="{{$field}}" class="col-sm-2 col-form-label">{{ $title }}</label>
    <div class="col-sm-10">
        <textarea id="{{ $fieldId }}" name="{{ $field }}"
        >{{ $model }}</textarea>
    </div>
</div>

@empty($ajaxEditor)
    @push('js')
@endempty
    <script>
        $(() => {
            let usrCfg = {};

            usrCfg.toolbar = [
                ['cleaner',['cleaner']],
                ['style', ['style']],
                ['style', ['bold', 'italic', 'underline']],
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
                @this.set('{{$field}}', contents);
                },
                // загрузка картинок в редактор
                onImageUpload: function(files) {
                    let readers = [];

                    for (let i = 0; i < files.length; i++) {
                        let file = files[i];

                        readers[i] = new FileReader()

                        readers[i].readAsDataURL(file);

                        readers[i].onload = function() {
                        @this.editorUploadImages(readers[i].result)
                            .then(result => {
                                let imgNode = new Image()
                                imgNode.src = result
                                $('#{{ $fieldId }}').summernote('insertNode', imgNode);
                            })
                        };

                        readers[i].onerror = function() {
                            console.log(readers[i].error);
                        };
                    }
                },
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
                link: [
                    ['link', ['linkDialogShow', 'unlink']]
                ],
                table: [
                    ['add', ['addRowDown', 'addRowUp', 'addColLeft', 'addColRight']],
                    ['delete', ['deleteRow', 'deleteCol', 'deleteTable']],
                ],
                air: [
                    ['color', ['color']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['para', ['ul', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture']]
                ]
            }

            usrCfg['imageAttributes'] = {
                icon:'<i class="note-icon-pencil"/>',
                removeEmpty:false, // true = remove attributes | false = leave empty if present
                disableUpload: true // true = don't display Upload Options | Display Upload Options
            };

            usrCfg['lang'] = 'ru-RU';

            // Initialize the plugin.
            @if(isset($readonly))
            $('#{{ $fieldId }}').summernote('disable');
            @else
            $('#{{ $fieldId }}').summernote(usrCfg);
            @endif
        })
    </script>
@empty($ajaxEditor)
    @endpush
@endempty
