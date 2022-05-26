<div class="card card-collapse">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center" wire:ignore>
            <h5 class="mb-0">{{ $title }}</h5>
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#{{ $id }}" aria-expanded="false" aria-controls="{{ $id }}">
                <i class="fas fa-plus"></i>
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>

    <div class="collapse rock-collapse" id="{{ $id }}" wire:ignore.self>
        <div class="card-body">
            @yield($id . '_collapse')
        </div>
    </div>
</div>
