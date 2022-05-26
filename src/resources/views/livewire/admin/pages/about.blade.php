<div>
    <x-forms.lang-tabs>
        @section('ru')
            <x-forms.input field="title" title="Заголовок"/>

            <x-forms.collapse title="Блок в шапке" id="header_block">
                @section('header_block_collapse')
                    <x-forms.input field="header_block_title" title="Заголовок"/>
                    <x-forms.input field="header_block_title_left" title="Заголовок слева"/>
                    <x-forms.sortable-blocks
                        :items="$header_block_list"
                        field="header_block_list"
                        title="Блоки с достижениями"
                        template="livewire.partials.sortable-blocks.about.header-list"
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

            <x-forms.collapse title="Блок Сотрудники компании" id="worker_block">
                @section('worker_block_collapse')
                    <x-forms.input field="worker_block_title" title="Заголовок"/>
                    <x-forms.collection-image :model="$about_workers" field="about_workers" title="Фото"/>
                @endsection
            </x-forms.collapse>

            <x-forms.collapse title="Блок Клиенты" id="clients_block">
                @section('clients_block_collapse')
                    <x-forms.input field="clients_block_title" title="Заголовок"/>
                    <x-forms.collection-image :model="$about_clients" field="about_clients" title="Логотипы клиентов"/>
                @endsection
            </x-forms.collapse>

            <x-forms.collapse title="Блок Ценности" id="worth_block">
                @section('worth_block_collapse')
                    <x-forms.input field="worth_block_title" title="Заголовок"/>
                    <x-forms.sortable-blocks
                        :items="$worth_block_list"
                        field="worth_block_list"
                        title="Ценности"
                        template="livewire.partials.sortable-blocks.about.worth-list"
                        updateMethod="updateWorthListOrder"
                        removeMethod="removeListItem"
                        addMethod="addWorthListItem"
                    />
                @endsection
            </x-forms.collapse>

            <x-forms.collapse title="Блок Награды" id="reward_block">
                @section('reward_block_collapse')
                    <x-forms.input field="reward_block_title" title="Заголовок"/>
                @endsection
            </x-forms.collapse>

            <x-forms.collapse title="Блок История" id="timeline_block">
                @section('timeline_block_collapse')
                    <x-forms.input field="timeline_block_title" title="Заголовок"/>
                @endsection
            </x-forms.collapse>

            <x-forms.collapse title="Блок Epromo" id="epromo_block">
                @section('epromo_block_collapse')
                    <x-forms.input field="epromo_block_title" title="Заголовок"/>
                    <x-forms.editor :model="$epromo_block_top_left_desc" field="epromo_block_top_left_desc" title="Текст над заголовком слева"/>
                    <x-forms.editor :model="$epromo_block_top_right_desc" field="epromo_block_top_right_desc" title="Текст над заголовком справа"/>
                    <x-forms.editor :model="$epromo_block_bottom_desc" field="epromo_block_bottom_desc" title="Текст под заголовком"/>
                @endsection
            </x-forms.collapse>
        @endsection

        @section('en')
            <x-forms.input field="title_en" title="Заголовок (en)"/>

            <x-forms.collapse title="Блок в шапке (en)" id="header_block_en">
                @section('header_block_en_collapse')
                    <x-forms.input field="header_block_title_en" title="Заголовок (en)"/>
                    <x-forms.input field="header_block_title_left_en" title="Заголовок слева (en)"/>
                    <x-forms.sortable-blocks
                        :items="$header_block_list_en"
                        field="header_block_list_en"
                        title="Блоки с достижениями (en)"
                        template="livewire.partials.sortable-blocks.about.header-list-en"
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

            <x-forms.collapse title="Блок Сотрудники компании (en)" id="worker_block_en">
                @section('worker_block_en_collapse')
                    <x-forms.input field="worker_block_title_en" title="Заголовок (en)"/>
                @endsection
            </x-forms.collapse>

            <x-forms.collapse title="Блок Клиенты (en)" id="clients_block_en">
                @section('clients_block_en_collapse')
                    <x-forms.input field="clients_block_title_en" title="Заголовок (en)"/>
                @endsection
            </x-forms.collapse>

            <x-forms.collapse title="Блок Ценности (en)" id="worth_block_en">
                @section('worth_block_en_collapse')
                    <x-forms.input field="worth_block_title_en" title="Заголовок (en)"/>
                    <x-forms.sortable-blocks
                        :items="$worth_block_list_en"
                        field="worth_block_list_en"
                        title="Ценности (en)"
                        template="livewire.partials.sortable-blocks.about.worth-list-en"
                        updateMethod="updateWorthListEnOrder"
                        removeMethod="removeListItem"
                        addMethod="addWorthListItem"
                    />
                @endsection
            </x-forms.collapse>

            <x-forms.collapse title="Блок Награды (en)" id="reward_block_en">
                @section('reward_block_en_collapse')
                    <x-forms.input field="reward_block_title_en" title="Заголовок (en)"/>
                @endsection
            </x-forms.collapse>

            <x-forms.collapse title="Блок История (en)" id="timeline_block_en">
                @section('timeline_block_en_collapse')
                    <x-forms.input field="timeline_block_title_en" title="Заголовок (en)"/>
                @endsection
            </x-forms.collapse>

            <x-forms.collapse title="Блок Epromo (en)" id="epromo_block_en">
                @section('epromo_block_en_collapse')
                    <x-forms.input field="epromo_block_title_en" title="Заголовок (en)"/>
                    <x-forms.editor :model="$epromo_block_top_left_desc_en" field="epromo_block_top_left_desc_en" title="Текст над заголовком слева (en)"/>
                    <x-forms.editor :model="$epromo_block_top_right_desc_en" field="epromo_block_top_right_desc_en" title="Текст над заголовком справа (en)"/>
                    <x-forms.editor :model="$epromo_block_bottom_desc_en" field="epromo_block_bottom_desc_en" title="Текст под заголовком (en)"/>
                @endsection
            </x-forms.collapse>
        @endsection
    </x-forms.lang-tabs>

    @include('livewire.partials.meta-tags')
</div>
