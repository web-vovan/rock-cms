<div class="form-group row mb-4">
    <label class="col-sm-2 col-form-label">{{ $title }}</label>
    <div class="col-sm-10">
        <div @if (isset($withoutSorting) !== true) wire:sortable="changeOrderJson" @endif>
            <div class="btn btn-primary mb-4" wire:click="addItemInJson('{{$field}}', '{{$addMethod}}')"><i class="fas fa-plus"></i> Добавить</div>
            @foreach ($items as $item)
                <div class="card w-100" wire:sortable.item="{{$field}}:{{ $loop->index }}" wire:key="{{$field}}-{{ $loop->index }}">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>
                                @if (isset($withoutSorting) !== true)
                                    <div class="btn btn-primary btn-sm" wire:sortable.handle="{{ $loop->index }}">
                                        <i class="fas fa-arrows-alt"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="btn btn-danger btn-sm" wire:click="deleteItemJson({{ $loop->index }}, '{{$field}}')">
                                <i class="fas fa-trash"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @include($template, ['key' => $loop->index])
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
