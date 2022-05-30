<div class="form-group row mb-4">
    <label for="{{$field}}" class="col-sm-2 col-form-label">{{ $title }}</label>
    <div class="col-sm-10">
        <input wire:model="{{ $field }}"
               type="checkbox"
               id="{{$field}}">
    </div>
</div>
