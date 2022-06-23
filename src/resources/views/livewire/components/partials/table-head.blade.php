<thead>
    <tr>
        @foreach($columns as $column)
            <th class="{{ $column->classList }}">
                @if ($column->sortable)
                    @if ($resource->sortBy === $column->field)
                        @if ($resource->sortDirection === 'desc')
                            <div wire:click="setOrder('{{$column->field}}', 'asc')" role="button">
                                {{ $column->getLabel() }} <i class="fas fa-sort-amount-down"></i>
                            </div>
                        @else
                            <div wire:click="setOrder('{{$column->field}}', 'desc')" role="button">
                                {{ $column->getLabel() }} <i class="fas fa-sort-amount-down-alt"></i>
                            </div>
                        @endif
                    @else
                        <div wire:click="setOrder('{{$column->field}}', 'desc')" role="button">
                            {{ $column->getLabel() }} <i class="fas fa-sort-amount-down text-secondary"></i>
                        </div>
                    @endif
                @else
                    {!! $column->getLabel() !!}
                @endif
            </th>
        @endforeach
    </tr>
</thead>
