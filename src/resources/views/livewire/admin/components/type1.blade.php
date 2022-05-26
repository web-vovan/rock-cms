<div>
    <form>
        <x-forms.collapse title="Пример" id="type1">
            @section('type1_collapse')
                <img src="{{ asset("/admin-resources/img/block-type/type1.png") }}">
            @endsection
        </x-forms.collapse>

        <x-forms.lang-tabs type="type1">
            @section('ru-type1')
                <x-forms.input field="title" title="Заголовок"/>
                <x-forms.input field="left_title" title="Заголовок слева"/>
                <x-forms.editor :model="$desc" field="desc" title="Описание"/>

                <x-forms.sortable-blocks
                    :items="$blocks"
                    field="blocks"
                    title="Текстовые блоки"
                    template="livewire.partials.sortable-blocks.components.type1"
                    updateMethod="updateBlocksOrder"
                    removeMethod="removeListItem"
                    addMethod="addBlocksItem"
                />
            @endsection

            @section('en-type1')
                <x-forms.input field="title_en" title="Заголовок (en)"/>
                <x-forms.input field="left_title_en" title="Заголовок слева (en)"/>
                <x-forms.editor :model="$desc_en" field="desc_en" title="Описание (en)"/>

                <x-forms.sortable-blocks
                    :items="$blocks_en"
                    field="blocks_en"
                    title="Текстовые блоки (en)"
                    template="livewire.partials.sortable-blocks.components.type1_en"
                    updateMethod="updateBlocksEnOrder"
                    removeMethod="removeListItem"
                    addMethod="addBlocksItem"
                />
            @endsection
        </x-forms.lang-tabs>
    </form>
</div>
