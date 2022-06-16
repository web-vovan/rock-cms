<div class="form-group row mb-4">
    <label class="col-sm-2 col-form-label">{{ $title }}</label>
    <div class="col-sm-10">
        @if ($model)
            <div class="d-flex flex-wrap justify-content-start" wire:sortable="changeOrderMedia">
                @foreach($model as $key => $image)
                    <div class="card text-center media-card mr-2" wire:sortable.item="{{$field}}:{{ $loop->index }}" wire:key="{{$field}}-{{ $loop->index }}">
                        <div class="card-body d-flex align-items-center justify-content-center">
                            <a href="{{ getMediaLink($image) }}" data-toggle="lightbox" target="_blank">
                                <img src="{{ getMediaLink($image) }}" class="img-thumbnail rounded">
                            </a>
                        </div>
                        <div class="card-footer text-muted">
                            <button type="button" wire:click="deleteMedia('{{ $field }}', {{ $key }})" class="btn btn-danger btn-sm"><i class="fas fa-trash" aria-hidden="true"></i></button>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
        <input wire:model="{{ $field }}" type="file" class="d-none" accept="image/*" multiple id="{{ $field }}" >
        @if ($model)
            <label for="{{ $field }}" type="button" class="btn btn-primary font-weight-normal mb-0"><i class="fas fa-plus" aria-hidden="true"></i> Добавить</label>
        @else
            <label for="{{ $field }}" type="button" class="btn btn-primary font-weight-normal mb-0">Выберите файл</label>
        @endif
    </div>
</div>
