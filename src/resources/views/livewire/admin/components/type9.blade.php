<div>
    <form>
        <x-forms.collapse title="Пример" id="type9">
            @section('type9_collapse')
                <img src="{{ asset("/admin-resources/img/block-type/type9.png") }}">
            @endsection
        </x-forms.collapse>

        <x-forms.lang-tabs type="type1">
            @section('ru-type1')
                <x-forms.input field="title" title="Заголовок"/>

                <x-forms.sortable-blocks
                    :items="$blocks"
                    field="blocks"
                    title="Ссылки"
                    template="livewire.partials.sortable-blocks.components.type9"
                    updateMethod="updateBlocksOrder"
                    removeMethod="removeListItem"
                    addMethod="addBlocksItem"
                />
            @endsection

            @section('en-type1')
                <x-forms.input field="title_en" title="Заголовок (en)"/>

                <x-forms.sortable-blocks
                    :items="$blocks_en"
                    field="blocks_en"
                    title="Ссылки (en)"
                    template="livewire.partials.sortable-blocks.components.type9_en"
                    updateMethod="updateBlocksEnOrder"
                    removeMethod="removeListItem"
                    addMethod="addBlocksItem"
                />
            @endsection
        </x-forms.lang-tabs>
    </form>
</div>
