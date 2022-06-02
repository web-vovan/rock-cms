<div>
    <div class="btn-group">
        @if ($resource->activeEditButton)
            <a class="btn btn-default text-secondary" href="{{route($resource->nameRouteResourceEdit, $item->id)}}">
                <i class="fa fa-fw fa-pen"></i>
            </a>
        @endif

        @if ($resource->activeDeleteButton)
            <button wire:click="$emit('deleteResource',{{ $item->id }})" onclick="confirm('Подтвердите удаление') || event.stopImmediatePropagation();" class="btn btn-danger">
                <i class="fa fa-fw fa-trash"></i>
            </button>
        @endif
    </div>
</div>
