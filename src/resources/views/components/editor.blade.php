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
        <x-adminlte-text-editor name="{{ $field }}" id="{{ $fieldId }}" enableMedia={{$enableMedia}}>
            {{ $model }}
        </x-adminlte-text-editor>
    </div>
</div>
