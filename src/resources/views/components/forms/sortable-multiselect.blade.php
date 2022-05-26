<div class="form-group row mb-4">
    <label class="col-sm-2 col-form-label">{{ $title }}</label>
    <div class="col-sm-10">
        <div wire:ignore class="mb-4">
            <select id="{{ $field }}" class="chosen form-control" data-placeholder="Выберите значение">
                <option value="0"></option>
                @foreach($items as $key => $item)
                    <option
                        value="{{ $item['id'] }}"
                    >{{ $item['title'] }}</option>
                @endforeach
            </select>
        </div>

        <div wire:sortable="{{ $updateMethod }}">
            @foreach ($selectedItems as $item)
                <div class="input-group mb-3" wire:sortable.item="{{ $loop->index }}" wire:key="{{$field}}-{{ $loop->index }}">
                    <div class="input-group-prepend">
                        <button class="btn btn-primary btn-sm" wire:sortable.handle="{{ $loop->index }}"><i class="fas fa-arrows-alt"></i></button>
                    </div>
                    <div class="form-control">{{ $item['title'] }}</div>
                    <div class="input-group-append">
                        <div class="btn btn-danger btn-sm" wire:click="{{$removeMethod}}({{ $loop->index }}, '{{$field}}')"><i class="fas fa-trash"></i></div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@push('js')
    <script>
        let {{$field}} = $('#{{$field}}');

        {{ $field }}.chosen();

        {{ $field }}.change(function() {
            let select = document.getElementById('{{ $field }}');
            @this.{{ $changeMethod }}(select.value);

            select.value = null;
        })
    </script>
@endpush()
