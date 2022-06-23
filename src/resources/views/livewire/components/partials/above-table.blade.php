<div class="mb-4">
    @if (count($filters))
        <div class="card">
            <div class="card-header ">
                <div class="d-flex justify-content-between align-items-center">
                    <strong>Фильтры</strong>
                    <button class="btn btn-secondary" wire:click="clearFilter">Сбросить</button>
                </div>
            </div>
            <div class="card-body">
                <div class="form-row align-items-end">
                    @foreach($filters as $filter)
                        <div class="col-3 form-group">
                            {{ (new $filter)->render() }}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
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
