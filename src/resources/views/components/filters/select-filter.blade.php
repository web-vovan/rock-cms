<label for="{{ $field }}" class="font-weight-normal">{{ $label }}</label>
<select class="custom-select" name="" id="{{ $field }}" wire:model="filterFields.{{$field}}">
    <option value=null selected>-- Выберите значение --</option>
    @foreach ($data as $item)
        <option value="{{ $item['value'] }}">{{ $item['title'] }}</option>
    @endforeach
</select>
