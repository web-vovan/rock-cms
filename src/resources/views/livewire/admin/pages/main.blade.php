<div>
    <x-forms.lang-tabs>
        @section('ru')
            <x-forms.input field="title" title="Заголовок"/>

            <x-forms.collapse title="Блок Что мы делаем" id="make_block">
                @section('make_block_collapse')
                    <x-forms.input field="make_block_title" title="Заголовок"/>
                    <x-forms.editor :model="$make_block_desc" field="make_block_desc" title="Описание"/>
                    <x-forms.sortable-blocks
                        :items="$make_block_list"
                        field="make_block_list"
                        title="Виды разработки"
                        template="livewire.partials.sortable-blocks.main.make-list"
                        updateMethod="updateMakeListOrder"
                        removeMethod="removeListItem"
                        addMethod="addMakeListItem"
                    />
                @endsection
            </x-forms.collapse>

            <x-forms.collapse title="Блок Работа с нами" id="job_block">
                @section('job_block_collapse')
                    <x-forms.input field="job_block_title" title="Заголовок"/>
                    <x-forms.input field="job_block_reward_title" title="Заголовок для наград"/>
                    <x-forms.sortable-blocks
                        :items="$job_block_list"
                        field="job_block_list"
                        title="Блоки с данными"
                        template="livewire.partials.sortable-blocks.main.job-list"
                        updateMethod="updateJobListOrder"
                        removeMethod="removeListItem"
                        addMethod="addJobListItem"
                    />
                @endsection
            </x-forms.collapse>

            <x-forms.collapse title="Блок Специализируемся на отраслях" id="industry_block">
                @section('industry_block_collapse')
                    <x-forms.input field="industry_block_title" title="Заголовок"/>

                    <x-forms.sortable-multiselect
                        :items="$projectCategories"
                        :selectedItems="$industry_block_categories_list"
                        changeMethod="changeSelectCategory"
                        field="industry_block_categories_list"
                        title="Категории проектов"
                        updateMethod="updateCategoryOrder"
                        removeMethod="removeListItem"
                    />

                    <x-forms.sortable-multiselect
                        :items="$projects"
                        :selectedItems="$industry_block_projects_list"
                        changeMethod="changeSelectProject"
                        field="industry_block_projects_list"
                        title="Проекты"
                        updateMethod="updateProjectOrder"
                        removeMethod="removeListItem"
                    />
                @endsection
            </x-forms.collapse>

            <x-forms.collapse title="Блок О нас" id="history_block">
                @section('history_block_collapse')
                    <x-forms.input field="history_block_title" title="Заголовок"/>
                    <x-forms.editor :model="$history_block_desc" field="history_block_desc" title="Описание"/>
                    <x-forms.editor :model="$history_block_short_desc" field="history_block_short_desc" title="Краткое описание"/>
                    <x-forms.editor :model="$history_block_history_desc" field="history_block_history_desc" title="Описание истории"/>
                @endsection
            </x-forms.collapse>

            <x-forms.collapse title="Блок Карьера" id="career_block">
                @section('career_block_collapse')
                    <x-forms.input field="career_block_title" title="Заголовок"/>
                    <x-forms.editor :model="$career_block_desc" field="career_block_desc" title="Описание"/>
                    <x-forms.sortable-multiselect
                        :items="$peoples"
                        :selectedItems="$career_block_list"
                        changeMethod="changeSelectPeople"
                        field="career_block_list"
                        title="Люди"
                        updateMethod="updatePeopleOrder"
                        removeMethod="removeListItem"
                    />
                    <x-forms.editor :model="$career_block_short_desc_left" field="career_block_short_desc_left" title="Краткое описание слева"/>
                    <x-forms.editor :model="$career_block_short_desc_right" field="career_block_short_desc_right" title="Краткое описание справа"/>
                    <x-forms.input field="career_block_vacancies_title" title="Заголовок для вакансий"/>
                @endsection
            </x-forms.collapse>

            <x-forms.collapse title="Блок Контакты" id="contact_block">
                @section('contact_block_collapse')
                    <x-forms.input field="contact_block_title" title="Заголовок"/>
                @endsection
            </x-forms.collapse>
        @endsection

        @section('en')
            <x-forms.input field="title_en" title="Заголовок (en)"/>

            <x-forms.collapse title="Блок Что мы делаем (en)" id="make_block_en">
                @section('make_block_en_collapse')
                    <x-forms.input field="make_block_title_en" title="Заголовок (en)"/>
                    <x-forms.editor :model="$make_block_desc_en" field="make_block_desc_en" title="Описание (en)"/>
                    <x-forms.sortable-blocks
                        :items="$make_block_list_en"
                        field="make_block_list_en"
                        title="Виды разработки (en)"
                        template="livewire.partials.sortable-blocks.main.make-list-en"
                        updateMethod="updateMakeListEnOrder"
                        removeMethod="removeListItem"
                        addMethod="addMakeListItem"
                    />
                @endsection
            </x-forms.collapse>

            <x-forms.collapse title="Блок Работа с нами (en)" id="job_block_en">
                @section('job_block_en_collapse')
                    <x-forms.input field="job_block_title_en" title="Заголовок (en)"/>
                    <x-forms.input field="job_block_reward_title_en" title="Заголовок для наград (en)"/>
                    <x-forms.sortable-blocks
                        :items="$job_block_list_en"
                        field="job_block_list_en"
                        title="Блоки с данными (en)"
                        template="livewire.partials.sortable-blocks.main.job-list-en"
                        updateMethod="updateJobListEnOrder"
                        removeMethod="removeListItem"
                        addMethod="addJobListItem"
                    />
                @endsection
            </x-forms.collapse>

            <x-forms.collapse title="Блок Специализируемся на отраслях (en)" id="industry_block_en">
                @section('industry_block_en_collapse')
                    <x-forms.input field="industry_block_title_en" title="Заголовок (en)"/>
                @endsection
            </x-forms.collapse>

            <x-forms.collapse title="Блок О нас (en)" id="history_block_en">
                @section('history_block_en_collapse')
                    <x-forms.input field="history_block_title_en" title="Заголовок (en)"/>
                    <x-forms.editor :model="$history_block_desc_en" field="history_block_desc_en" title="Описание (en)"/>
                    <x-forms.editor :model="$history_block_short_desc_en" field="history_block_short_desc_en" title="Краткое описание (en)"/>
                    <x-forms.editor :model="$history_block_history_desc_en" field="history_block_history_desc_en" title="Описание истории (en)"/>
                @endsection
            </x-forms.collapse>

            <x-forms.collapse title="Блок Карьера (en)" id="career_block_en">
                @section('career_block_en_collapse')
                    <x-forms.input field="career_block_title_en" title="Заголовок (en)"/>
                    <x-forms.editor :model="$career_block_desc_en" field="career_block_desc_en" title="Описание (en)"/>
                    <x-forms.editor :model="$career_block_short_desc_left_en" field="career_block_short_desc_left_en" title="Краткое описание слева (en)"/>
                    <x-forms.editor :model="$career_block_short_desc_right_en" field="career_block_short_desc_right_en" title="Краткое описание справа (en)"/>
                    <x-forms.input field="career_block_vacancies_title_en" title="Заголовок для вакансий (en)"/>
                @endsection
            </x-forms.collapse>

            <x-forms.collapse title="Блок Контакты (en)" id="contact_block_en">
                @section('contact_block_en_collapse')
                    <x-forms.input field="contact_block_title_en" title="Заголовок (en)"/>
                @endsection
            </x-forms.collapse>
        @endsection
    </x-forms.lang-tabs>

    @include('livewire.partials.meta-tags')
</div>
