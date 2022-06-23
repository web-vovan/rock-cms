<div>
    @include('rock-cms::livewire.components.partials.above-table')

    <table class="table table-bordered">
        @include('rock-cms::livewire.components.partials.table-head')
        <tbody>
        @foreach($data as $item)
            <tr>
                @foreach($columns as $column)
                    <td class="{{ $column->classList }}">
                        {{ $column->render()->with([
                            'item' => $item,
                            'resource' => $resource,
                        ]) }}
                    </td>
                @endforeach
            </tr>
        @endforeach
        </tbody>
    </table>

    @if ($data->total() === 0)
        <div class="text-center">Нет данных для показа</div>
    @endif

    @include('rock-cms::livewire.components.partials.under-table')
</div>
