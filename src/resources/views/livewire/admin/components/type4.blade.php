<div>
    <form>
        <x-forms.collapse title="Пример" id="type4">
            @section('type4_collapse')
                <img src="{{ asset("/admin-resources/img/block-type/type4.png") }}">
            @endsection
        </x-forms.collapse>

        <x-forms.lang-tabs type="type4">
            @section('ru-type4')
                <x-forms.input field="title" title="Заголовок"/>

                <x-forms.sortable-blocks
                    :items="$blocks"
                    field="blocks"
                    title="Текстовые блоки"
                    template="livewire.partials.sortable-blocks.components.type4"
                    updateMethod="updateBlocksOrder"
                    removeMethod="removeListItem"
                    addMethod="addBlocksItem"
                />
            @endsection

            @section('en-type4')
                <x-forms.input field="title_en" title="Заголовок (en)"/>

                <x-forms.sortable-blocks
                    :items="$blocks_en"
                    field="blocks_en"
                    title="Текстовые блоки (en)"
                    template="livewire.partials.sortable-blocks.components.type4_en"
                    updateMethod="updateBlocksEnOrder"
                    removeMethod="removeListItem"
                    addMethod="addBlocksItem"
                />
            @endsection
        </x-forms.lang-tabs>
    </form>
</div>
