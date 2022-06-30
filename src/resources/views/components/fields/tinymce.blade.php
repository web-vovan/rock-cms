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
    <div class="col-sm-10" >
        <textarea id="{{ $fieldId }}" name="{{ $field }}"
        >{{$model}}</textarea>
    </div>
</div>

@empty($ajaxEditor)
    @push('js')
@endempty
    <script>
        tinymce.init({
            selector: '#{{$fieldId}}',
            plugins: 'image code link textcolor lists table',
            toolbar: 'undo redo removeformat | bold italic underline forecolor backcolor | numlist bullist | link image | code',
            /* enable title field in the Image dialog*/
            language: 'ru',
            language_url: '/vendor/tinymce/ru.js',
            image_title: true,
            /* enable automatic uploads of images represented by blob or data URIs*/
            // automatic_uploads: true,
            /*
              URL of our upload handler (for more details check: https://www.tiny.cloud/docs/configure/file-image-upload/#images_upload_url)
              images_upload_url: 'postAcceptor.php',
              here we add custom filepicker only to Image dialog
            */
            file_picker_types: 'image',
            // images_upload_handler: example_image_upload_handler,
            /* and here's our custom image picker*/
            file_picker_callback: (cb, value, meta) => {
                const input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');

                input.addEventListener('change', (e) => {
                    const file = e.target.files[0];

                    const reader = new FileReader();
                    reader.addEventListener('load', () => {

                    @this.editorUploadImages(reader.result)
                        .then(result => {
                            cb(result, { title: file.name });
                        })
                    });
                    reader.readAsDataURL(file);
                });

                input.click();
            },
            setup: function (editor) {
                editor.on('init change', function () {
                    editor.save();
                });
                editor.on('change', function (e) {
                @this.set('{{$field}}', editor.getContent())
                });
            },
        });
    </script>
@empty($ajaxEditor)
    @endpush
@endempty
