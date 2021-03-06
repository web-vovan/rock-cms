<div class="form-group row mb-4">
    <label class="col-sm-2 col-form-label">{{ $title }}</label>
    <div class="col-sm-10">
        @if ($model)
            <div class="d-flex justify-content-start">
                <div class="card text-center media-card mr-2">
                    <div class="card-body d-flex align-items-center">
                        <div class="text-break">
                            <i class="fas fa-file"></i> {{ getMediaFileName($model) }}
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        <a href="{{ getMediaLink($model) }}" target="_blank" class="btn btn-secondary btn-sm"><i class="fas fa-eye" aria-hidden="true"></i></a>

                        @if (isset($readonly) === false)
                            <button type="button"
                                    wire:click="deleteMedia('{{ $field }}')"
                                    class="btn btn-danger btn-sm">
                                <i class="fas fa-trash" aria-hidden="true"></i>
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        @endif

        @if (isset($readonly) === false)
            <input type="file" wire:model="{{ $field }}" class="d-none" id="{{ $field }}">
            @if ($model)
                <label for="{{ $field }}" type="button" class="btn btn-primary font-weight-normal mb-0">Заменить</label>
            @else
                <label for="{{ $field }}" type="button" class="btn btn-primary font-weight-normal mb-0">Выберите файл</label>
            @endif
        @endif

        @if (isset($readonly) && $model === null)
            -
        @endif
    </div>
</div>
