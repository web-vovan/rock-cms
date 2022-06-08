<div class="form-group row mb-4">
    <label class="col-sm-2 col-form-label">{{ $title }}</label>
    <div class="col-sm-10">
        @if (isset($liveSearch))
            <div class="rock-multiselect {{$selectedItemsField}} mb-4" wire:ignore.self>
                <input class="form-control {{$selectedItemsField}}" placeholder="Выберите значение" type="text" />
                <ul class="list-group">
                    @if(count($items) > 0)
                        @foreach($items as $key => $item)
                            <div class="list-group-item list-group-item-action" wire:click="addItemInSelectedItems('{{$itemsField}}', '{{$selectedItemsField}}', {{$item['id']}})" role='button'>{{$item['title']}}</div>
                        @endforeach
                    @else
                        <div class="list-group-item">Ничего не найдено</div>
                    @endif
                </ul>
            </div>
        @else
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
        @endif

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

        @if (isset($liveSearch))
        $('.rock-multiselect .{{$selectedItemsField}}').on('input', function(event) {
        @this.{{$liveSearch}}(event.target.value)
        })

        $('.rock-multiselect .{{$selectedItemsField}}').on('focus', function(event) {
            $('.rock-multiselect.{{$selectedItemsField}}').addClass('active')
        })

        $('.rock-multiselect .{{$selectedItemsField}}').on('blur', function(event) {
            setTimeout(function() {
                $('.rock-multiselect.{{$selectedItemsField}}').removeClass('active')
            }, 500)
        })
        @endif
    </script>
@endpush()
