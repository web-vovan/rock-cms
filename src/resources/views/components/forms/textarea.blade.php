<div class="form-group row mb-4">
    <label for="{{$field}}" class="col-sm-2 col-form-label">{{ $title }}</label>
    <div class="col-sm-10">
        <textarea wire:model="{{ $field }}"
               name="{{ $field }}"
               class="form-control @error($field) is-invalid @enderror"
               id="{{$field}}">
        </textarea>
        @error($field) <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>
