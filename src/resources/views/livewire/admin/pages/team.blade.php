<div>
    <x-forms.lang-tabs>
        @section('ru')
            <x-forms.input field="title" title="Заголовок"/>

            <x-forms.collapse title="Блок в шапке" id="header_block">
                @section('header_block_collapse')
                    <x-forms.input field="header_block_title" title="Заголовок"/>
                    <x-forms.sortable-blocks
                        :items="$header_block_list"
                        field="header_block_list"
                        title="Блоки с показателями"
                        template="livewire.partials.sortable-blocks.team.header-list"
                        updateMethod="updateHeaderListOrder"
                        removeMethod="removeListItem"
                        addMethod="addHeaderListItem"
                    />
                @endsection
            </x-forms.collapse>

            <x-forms.collapse title="Блок Руководство компании" id="management_block">
                @section('management_block_collapse')
                    <x-forms.input field="management_block_title" title="Заголовок"/>
                    <x-forms.sortable-multiselect
                        :items="$people"
                        :selectedItems="$management_block_list"
                        changeMethod="changeSelectPeople"
                        field="management_block_list"
                        title="Руководство"
                        updateMethod="updatePeopleOrder"
                        removeMethod="removeListItem"
                    />
                @endsection
            </x-forms.collapse>

            <x-forms.collapse title="Блок Отделы" id="department_block">
                @section('department_block_collapse')
                    <x-forms.input field="department_block_title" title="Заголовок"/>
                    <x-forms.input field="department_block_subtitle" title="Подзаголовок"/>
                    <x-forms.sortable-multiselect
                        :items="$departments"
                        :selectedItems="$department_block_list"
                        changeMethod="changeSelectDepartment"
                        field="department_block_list"
                        title="Отделы"
                        updateMethod="updateDepartmentOrder"
                        removeMethod="removeListItem"
                    />
                @endsection
            </x-forms.collapse>

            <x-forms.collapse title="Блок Развитие" id="evolution_block">
                @section('evolution_block_collapse')
                    <x-forms.input field="evolution_block_title" title="Заголовок"/>
                    <x-forms.textarea field="evolution_block_desc_left" title="Описание слева"/>
                    <x-forms.textarea field="evolution_block_desc_right" title="Описание справа"/>
                    <x-forms.collection-image :model="$team_work" field="team_work" title="Картинки"/>
                @endsection
            </x-forms.collapse>
        @endsection

        @section('en')
            <x-forms.input field="title_en" title="Заголовок (en)"/>

            <x-forms.collapse title="Блок в шапке (en)" id="header_block_en">
                @section('header_block_en_collapse')
                    <x-forms.input field="header_block_title_en" title="Заголовок (en)"/>
                    <x-forms.sortable-blocks
                        :items="$header_block_list_en"
                        field="header_block_list_en"
                        title="Блоки с показателями (en)"
                        template="livewire.partials.sortable-blocks.team.header-list-en"
                        updateMethod="updateHeaderListEnOrder"
                        removeMethod="removeListItem"
                        addMethod="addHeaderListItem"
                    />
                @endsection
            </x-forms.collapse>

            <x-forms.collapse title="Блок Руководство компании (en)" id="management_block_en">
                @section('management_block_en_collapse')
                    <x-forms.input field="management_block_title_en" title="Заголовок (en)"/>
                @endsection
            </x-forms.collapse>

            <x-forms.collapse title="Блок Отделы (en)" id="department_block_en">
                @section('department_block_en_collapse')
                    <x-forms.input field="department_block_title_en" title="Заголовок (en)"/>
                    <x-forms.input field="department_block_subtitle_en" title="Подзаголовок (en)"/>
                @endsection
            </x-forms.collapse>

            <x-forms.collapse title="Блок Развитие (en)" id="evolution_block_en">
                @section('evolution_block_en_collapse')
                    <x-forms.input field="evolution_block_title_en" title="Заголовок (en)"/>
                    <x-forms.textarea field="evolution_block_desc_left_en" title="Описание слева (en)"/>
                    <x-forms.textarea field="evolution_block_desc_right_en" title="Описание справа (en)"/>
                @endsection
            </x-forms.collapse>
        @endsection
    </x-forms.lang-tabs>

    @include('livewire.partials.meta-tags')
</div>
