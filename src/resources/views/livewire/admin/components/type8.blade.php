<div>
    <form>
        <x-forms.collapse title="Пример" id="type8">
            @section('type8_collapse')
                <img src="{{ asset("/admin-resources/img/block-type/type8.png") }}">
            @endsection
        </x-forms.collapse>

        <x-forms.lang-tabs type="type1">
            @section('ru-type1')
                <x-forms.input field="title" title="Заголовок"/>
                <x-forms.input field="subtitle" title="Подзаголовок"/>

                <x-forms.sortable-blocks
                    :items="$blocks"
                    field="blocks"
                    title="Текстовые блоки"
                    template="livewire.partials.sortable-blocks.components.type8"
                    updateMethod="updateBlocksOrder"
                    removeMethod="removeListItem"
                    addMethod="addBlocksItem"
                />
            @endsection

            @section('en-type1')
                <x-forms.input field="title_en" title="Заголовок (en)"/>
                <x-forms.input field="subtitle_en" title="Подзаголовок (en)"/>

                <x-forms.sortable-blocks
                    :items="$blocks_en"
                    field="blocks_en"
                    title="Текстовые блоки (en)"
                    template="livewire.partials.sortable-blocks.components.type8_en"
                    updateMethod="updateBlocksEnOrder"
                    removeMethod="removeListItem"
                    addMethod="addBlocksItem"
                />
            @endsection
        </x-forms.lang-tabs>
    </form>
</div>
