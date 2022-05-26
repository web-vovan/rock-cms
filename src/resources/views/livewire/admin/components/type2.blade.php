<div>
    <form>
        <x-forms.collapse title="Пример" id="type2">
            @section('type2_collapse')
                <img src="{{ asset("/admin-resources/img/block-type/type2.png") }}">
            @endsection
        </x-forms.collapse>

        <x-forms.lang-tabs type="type2">
            @section('ru-type2')
                <x-forms.input field="title" title="Заголовок"/>

                <x-forms.sortable-blocks
                    :items="$blocks"
                    field="blocks"
                    title="Текстовые блоки"
                    template="livewire.partials.sortable-blocks.components.type2"
                    updateMethod="updateBlocksOrder"
                    removeMethod="removeListItem"
                    addMethod="addBlocksItem"
                />
            @endsection

            @section('en-type2')
                <x-forms.input field="title_en" title="Заголовок (en)"/>

                <x-forms.sortable-blocks
                    :items="$blocks_en"
                    field="blocks_en"
                    title="Текстовые блоки (en)"
                    template="livewire.partials.sortable-blocks.components.type2_en"
                    updateMethod="updateBlocksEnOrder"
                    removeMethod="removeListItem"
                    addMethod="addBlocksItem"
                />
            @endsection
        </x-forms.lang-tabs>
    </form>
</div>
