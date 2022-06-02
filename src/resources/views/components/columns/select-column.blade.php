<div>
    <input
           type="checkbox"
           wire:click="addItemInSelectList({{$item->id}})"
           @if (in_array($item->id, $resource->selectList)) checked @endif
    >
</div>
