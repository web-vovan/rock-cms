<div>
    <div class="mb-4">
        <div class="row d-flex justify-content-between">
            <div class="col">
                @if (count($resource->selectList) > 0)
                    <button wire:click="deleteListResources" onclick="confirm('Подтвердите удаление') || event.stopImmediatePropagation();" class="btn btn-danger">
                        <i class="fa fa-fw fa-trash"></i> Удалить
                    </button>
                @endif
            </div>
            <div class="col-auto">
                <div class="row d-flex flex-nowrap align-items-center">
                    <div class="mr-2 col">
                        Поиск:
                    </div>
                    <div class="col-auto">
                        <input type="text" class="form-control" wire:model="searchWord" id="searchWord" placeholder="введите запрос">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
        <tr>
            @foreach($columns as $column)
                <th class="{{ $column->classList }}">
                    @if ($column->sortable)
                        @if ($resource->sortBy === $column->field)
                            @if ($resource->sortDirection === 'desc')
                                <div wire:click="setOrder('{{$column->field}}', 'asc')" role="button">
                                    {{ $column->getLabel() }} <i class="fas fa-sort-amount-down"></i>
                                </div>
                            @else
                                <div wire:click="setOrder('{{$column->field}}', 'desc')" role="button">
                                    {{ $column->getLabel() }} <i class="fas fa-sort-amount-down-alt"></i>
                                </div>
                            @endif
                        @else
                            <div wire:click="setOrder('{{$column->field}}', 'desc')" role="button">
                                {{ $column->getLabel() }} <i class="fas fa-sort-amount-down text-secondary"></i>
                            </div>
                        @endif
                    @else
                        {!! $column->getLabel() !!}
                    @endif
                </th>
            @endforeach
        </tr>
        </thead>
        <tbody>
        @foreach($data as $item)
            <tr>
                @foreach($columns as $column)
                    <td class="{{ $column->classList }}">
                        {{ $column->render()->with([
                            'item' => $item,
                            'resource' => $resource,
                        ]) }}
                    </td>
                @endforeach
            </tr>
        @endforeach
        </tbody>
    </table>

    @if ($data->total() === 0)
        <div class="text-center">Нет данных для показа</div>
    @endif

    <div class="row d-flex justify-content-between">
        <div class="col">
            {{ $data->links() }}
        </div>
        <div class="col-auto">
            <select wire:model="perPage" class="form-control">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="15">15</option>
            </select>
        </div>

    </div>
</div>
