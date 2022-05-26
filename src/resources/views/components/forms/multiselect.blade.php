<div class="form-group row mb-4" wire:ignore>
    <label class="col-sm-2 col-form-label">{{ $title }}</label>
    <div class="col-sm-10">
        <select id="{{ $field }}" class="chosen form-control" data-placeholder="Выберите значение" multiple>
            @foreach($items as $key => $item)
                <option
                    value="{{ $item['id'] }}"
                    @if(in_array($item['id'], $selected)) selected @endif
                >{{ $item['title'] }}</option>
            @endforeach
        </select>
    </div>
</div>

@push('js')
    <script>
        let chosenBlock = $('#{{$field}}');

        chosenBlock.chosen();

        chosenBlock.change(function() {
            let select = document.getElementById('{{ $field }}');
            let selected = [...select.options]
                .filter(option => option.selected)
                .map(option => option.value);

            @this.set('{{ $field }}', selected);
        })
    </script>
@endpush()
