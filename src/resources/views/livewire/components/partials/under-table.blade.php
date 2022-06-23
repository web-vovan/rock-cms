<div class="row d-flex justify-content-between">
    <div class="col">
        {{ $data->links() }}
    </div>
    <div class="col-auto">
        <select wire:model="perPage" class="form-control">
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="15">15</option>
        </select>
    </div>

</div>
