<div class="form-group row mb-4">
    <label class="col-sm-2 col-form-label">{{ $title }}</label>
    <div class="col-sm-10">
        @if ($model)
            <div class="d-flex justify-content-start">
                <div class="card text-center media-card mr-2">
                    <div class="card-body d-flex align-items-center justify-content-center">
                        <a href="{{ getMediaLink($model) }}" data-toggle="lightbox" target="_blank">
                            <img src="{{ getMediaLink($model) }}" class="img-thumbnail rounded">
                        </a>
                    </div>
                    <div class="card-footer text-muted">
                        <button type="button" wire:click="deleteMedia('{{ $field }}')" class="btn btn-danger btn-sm"><i class="fas fa-trash" aria-hidden="true"></i></button>
                    </div>
                </div>
            </div>
        @endif
        <input type="file" wire:model="{{ $field }}" class="d-none" accept="image/*" id="{{ $field }}">
        @if ($model)
            <label for="{{ $field }}" type="button" class="btn btn-primary font-weight-normal mb-0">Заменить</label>
        @else
            <label for="{{ $field }}" type="button" class="btn btn-primary font-weight-normal mb-0">Выберите файл</label>
        @endif
    </div>
</div>
