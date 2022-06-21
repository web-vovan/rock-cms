@php
    /*
     фикс для сортируемых блоков
     иначе если в id есть точка, то js не сработает
     */
    $fieldId = str_replace('.', '_', $field);
@endphp

<div class="form-group row mb-4">
    <label for="{{$fieldId}}" class="col-sm-2 col-form-label">{{ $title }}</label>
    <div class="col-sm-10">
        <input wire:model="{{ $field }}"
               type="text"
               @isset($readonly) readonly @endisset
               class="form-control @error($field) is-invalid @enderror"
               id="{{$fieldId}}">
        @error($field) <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>
