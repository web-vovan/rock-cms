<div class="form-group row mb-4">
    <label class="col-sm-2 col-form-label">{{ $title }}</label>
    <div class="col-sm-10">
        <div wire:ignore class="mb-4">
            <select id="{{ $selectedItemsField }}" class="chosen form-control" data-placeholder="Выберите значение">
                <option value="0"></option>
                @foreach($items as $key => $item)
                    <option
                        value="{{ $item['id'] }}"
                    >{{ $item['title'] }}</option>
                @endforeach
            </select>
        </div>

        <div wire:sortable="changeOrder">
            @foreach ($selectedItems as $item)
                <div class="input-group mb-3" wire:sortable.item="{{$selectedItemsField}}:{{ $loop->index }}" wire:key="{{$selectedItemsField}}-{{ $loop->index }}">
                    <div class="input-group-prepend">
                        <button class="btn btn-primary btn-sm" wire:sortable.handle="{{ $loop->index }}"><i class="fas fa-arrows-alt"></i></button>
                    </div>
                    <div class="form-control">{{ $item['title'] }}</div>
                    <div class="input-group-append">
                        <div class="btn btn-danger btn-sm" wire:click="removeListItem({{ $loop->index }}, '{{$selectedItemsField}}')"><i class="fas fa-trash"></i></div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@push('js')
    <script>
        let {{$selectedItemsField}} = $('#{{$selectedItemsField}}');

        {{ $selectedItemsField }}.chosen();

        {{ $selectedItemsField }}.change(function() {
            let select = document.getElementById('{{ $selectedItemsField }}');
        @this.addItemInSelectedItems('{{$itemsField}}', '{{$selectedItemsField}}', select.value);

            select.value = null;
        })
    </script>
@endpush()
