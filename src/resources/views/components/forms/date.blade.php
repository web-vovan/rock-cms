@php
    /*
     иначе если в id есть точка, то js не сработает
     */
    $fieldId = str_replace('.', '_', $field);
    $format = $format ?? 'L';
@endphp

<div class="form-group row mb-4" wire:ignore>
    <label for="{{$field}}" class="col-sm-2 col-form-label">{{ $title }}</label>
    <div class="col-sm-10" >
        <input type="text" class="form-control datetimepicker-input" id="{{ $fieldId }}" data-toggle="datetimepicker" name="{{$field}}" data-target="#{{ $fieldId }}"/>
    </div>
</div>

@push('js')
    <script type="text/javascript">
        $(function () {
            $('#{{ $fieldId }}').datetimepicker({
                defaultDate: '{{ $date }}',
                locale: 'ru',
                format: '{{ $format }}',
            });

            $('#{{$fieldId}}').on("change.datetimepicker", ({date, oldDate}) => {
                console.log($('#{{$fieldId}}').val());
                if ($('#{{$fieldId}}').val()) {
                    @this.set('{{ $field }}', $('#{{$fieldId}}').val());
                } else {
                    @this.set('{{ $field }}', null);
                }
            })
        });
    </script>
@endpush()
