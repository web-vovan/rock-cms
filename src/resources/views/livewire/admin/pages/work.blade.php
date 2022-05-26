<div>
    <x-forms.lang-tabs>
        @section('ru')
            <x-forms.input field="title" title="Заголовок"/>

            <x-forms.collapse title="Блок в шапке" id="header_block">
                @section('header_block_collapse')
                    <x-forms.input field="header_block_title" title="Заголовок"/>
                    <x-forms.editor :model="$header_block_desc" field="header_block_desc" title="Описание"/>
                    <x-forms.single-image :model="$work_header" field="work_header" title="Картинка"/>
                @endsection
            </x-forms.collapse>

            <x-forms.collapse title="Блок Обучение" id="training_block">
                @section('training_block_collapse')
                    <x-forms.input field="training_block_title" title="Заголовок"/>
                    <x-forms.sortable-blocks
                        :items="$training_block_list"
                        field="training_block_list"
                        title="Блоки с обучением"
                        template="livewire.partials.sortable-blocks.work.training-list"
                        updateMethod="updateTrainingListOrder"
                        removeMethod="removeListItem"
                        addMethod="addTrainingListItem"
                    />
                @endsection
            </x-forms.collapse>

            <x-forms.collapse title="Блок Поддержка" id="support_block">
                @section('support_block_collapse')
                    <x-forms.input field="support_block_title" title="Заголовок"/>
                    <x-forms.sortable-blocks
                        :items="$support_block_list"
                        field="support_block_list"
                        title="Блоки с поддержкой"
                        template="livewire.partials.sortable-blocks.work.support-list"
                        updateMethod="updateSupportListOrder"
                        removeMethod="removeListItem"
                        addMethod="addSupportListItem"
                    />
                @endsection
            </x-forms.collapse>

            <x-forms.collapse title="Блок Отдых" id="relax_block">
                @section('relax_block_collapse')
                    <x-forms.input field="relax_block_title" title="Заголовок"/>
                    <x-forms.input field="relax_block_subtitle" title="Подзаголовок"/>
                    <x-forms.textarea field="relax_block_full_desc" title="Описание на всю ширину"/>
                    <x-forms.textarea field="relax_block_left_desc" title="Описание слева"/>
                    <x-forms.textarea field="relax_block_right_desc" title="Описание справа"/>
                    <x-forms.collection-image :model="$work_relax" field="work_relax" title="Картинки"/>
                @endsection
            </x-forms.collapse>

            <x-forms.collapse title="Блок Мерч" id="merch_block">
                @section('merch_block_collapse')
                    <x-forms.input field="merch_block_title" title="Заголовок"/>
                    <x-forms.input field="merch_block_button_text" title="Текст на кнопке"/>
                    <x-forms.collection-image :model="$work_merch" field="work_merch" title="Картинки"/>
                @endsection
            </x-forms.collapse>

            <x-forms.collapse title="Блок Вакансии" id="vacancies_block">
                @section('vacancies_block_collapse')
                    <x-forms.input field="vacancies_block_title" title="Заголовок"/>
                    <x-forms.input field="vacancies_block_subtitle" title="Подзаголовок"/>
                @endsection
            </x-forms.collapse>
        @endsection

        @section('en')
            <x-forms.input field="title_en" title="Заголовок (en)"/>

            <x-forms.collapse title="Блок в шапке (en)" id="header_block_en">
                @section('header_block_en_collapse')
                    <x-forms.input field="header_block_title_en" title="Заголовок (en)"/>
                    <x-forms.editor :model="$header_block_desc_en" field="header_block_desc_en" title="Описание (en)"/>
                @endsection
            </x-forms.collapse>

            <x-forms.collapse title="Блок Обучение (en)" id="training_block_en">
                @section('training_block_en_collapse')
                    <x-forms.input field="training_block_title_en" title="Заголовок (en)"/>
                    <x-forms.sortable-blocks
                        :items="$training_block_list_en"
                        field="training_block_list_en"
                        title="Блоки с обучением (en)"
                        template="livewire.partials.sortable-blocks.work.training-list-en"
                        updateMethod="updateTrainingListEnOrder"
                        removeMethod="removeListItem"
                        addMethod="addTrainingListItem"
                    />
                @endsection
            </x-forms.collapse>

            <x-forms.collapse title="Блок Поддержка (en)" id="support_block_en">
                @section('support_block_en_collapse')
                    <x-forms.input field="support_block_title_en" title="Заголовок (en)"/>
                    <x-forms.sortable-blocks
                        :items="$support_block_list_en"
                        field="support_block_list_en"
                        title="Блоки с поддержкой (en)"
                        template="livewire.partials.sortable-blocks.work.support-list-en"
                        updateMethod="updateSupportListEnOrder"
                        removeMethod="removeListItem"
                        addMethod="addSupportListItem"
                    />
                @endsection
            </x-forms.collapse>

            <x-forms.collapse title="Блок Отдых (en)" id="relax_block_en">
                @section('relax_block_en_collapse')
                    <x-forms.input field="relax_block_title_en" title="Заголовок (en)"/>
                    <x-forms.input field="relax_block_subtitle_en" title="Подзаголовок (en)"/>
                    <x-forms.textarea field="relax_block_full_desc_en" title="Описание на всю ширину (en)"/>
                    <x-forms.textarea field="relax_block_left_desc_en" title="Описание слева (en)"/>
                    <x-forms.textarea field="relax_block_right_desc_en" title="Описание справа (en)"/>
                @endsection
            </x-forms.collapse>

            <x-forms.collapse title="Блок Мерч (en)" id="merch_block_en">
                @section('merch_block_en_collapse')
                    <x-forms.input field="merch_block_title_en" title="Заголовок (en)"/>
                    <x-forms.input field="merch_block_button_text_en" title="Текст на кнопке (en)"/>
                @endsection
            </x-forms.collapse>

            <x-forms.collapse title="Блок Вакансии (en)" id="vacancies_block_en">
                @section('vacancies_block_en_collapse')
                    <x-forms.input field="vacancies_block_title_en" title="Заголовок (en)"/>
                    <x-forms.input field="vacancies_block_subtitle_en" title="Подзаголовок (en)"/>
                @endsection
            </x-forms.collapse>
        @endsection
    </x-forms.lang-tabs>

    @include('livewire.partials.meta-tags')
</div>
