<div>
    @if (array_key_exists($item->$field, $replaceItems))
        {{ $replaceItems[$item->$field] }}
    @else
        {{ $item->$field }}
    @endif
</div>
