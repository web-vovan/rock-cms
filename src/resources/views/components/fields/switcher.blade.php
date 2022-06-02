<div class="form-group row mb-4">
    <label class="col-sm-2 col-form-label ">{{ $title }}</label>
    <div class="col-sm-10">
        <div class="custom-control custom-switch col-form-label @error($field) is-invalid @enderror">
            <input type="checkbox" class="custom-control-input" id="{{$field}}" wire:model="{{ $field }}">
            <label class="custom-control-label" for="{{$field}}"></label>
        </div>
        @error($field) <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>
