<div class="form-group row mb-4">
    <label class="col-sm-2 col-form-label">{{ $title }}</label>
    <div class="col-sm-10">
        <div wire:sortable="{{$updateMethod}}">
            <div class="mb-4">
                @foreach($componentTypeList as $item)
                    <div class="btn-group mb-2">
                        <div class="btn btn-primary" wire:click="openModal('{{ $item['type'] }}')">
                            <i class="fas fa-plus"></i> {{ $item['title'] }}
                        </div>
                        <button data-image={{ asset("/admin-resources/img/block-type/" . $item['type'] . '.png') }} type="button" class="btn btn-secondary modalTypeImage"><i class="fa fa-eye"></i></button>
                    </div>
                @endforeach
            </div>

            <div class="modal fade" id="modalTypeImage" tabindex="-1" aria-labelledby="componentModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <img class="mw-100" src="" alt="">
                        </div>
                    </div>
                </div>
            </div>

            @foreach ($items as $item)
                <div class="card w-100" wire:sortable.item="{{ $loop->index }}" wire:key="{{$field}}-{{ $loop->index }}">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-primary btn-sm" wire:sortable.handle="{{ $loop->index }}"><i class="fas fa-arrows-alt"></i></button>
                            <div>
                                <div class="btn btn-primary btn-sm" wire:click="openModal('type1', {{$item['id']}})" ><i class="fa fa-pen"></i></div>
                                <div class="btn btn-danger btn-sm" wire:click="{{$removeMethod}}({{ $loop->index }}, '{{$field}}')"><i class="fas fa-trash"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        {{$item['title']}}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
