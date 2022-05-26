<div class="form-group row mb-4">
    <label for="{{$field}}" class="col-sm-2 col-form-label">{{ $title }}</label>
    <div class="col-sm-10">
        <select class="form-control @error($field) is-invalid @enderror" wire:model="{{ $field }}">
            <option hidden selected>-- Выберите значение --</option>
            @foreach ($items as $item)
                <option value="{{ $item['id'] }}" >{{ $item['title'] }}</option>
            @endforeach
        </select>
        @error($field) <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>
