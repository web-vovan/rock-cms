<div>
    <x-adminlte-datatable
        id="{{ $resourceUri }}"
        :heads="$tableHeads"
        :config="$config"
        head-theme="light"
        bordered
    >
        @foreach($tableData as $row)
            <tr>
                @foreach($row as $cell)
                    <td>{!! $cell !!}</td>
                @endforeach
            </tr>
        @endforeach
    </x-adminlte-datatable>
</div>
