<div>
    <x-forms.lang-tabs>
        @section('ru')
            <h2 class="mb-4">Страница со списком вакансий</h2>
            <x-forms.input field="title" title="Заголовок"/>
            <x-forms.input field="header_text" title="Текст в шапке"/>
            <x-forms.input field="body_title_left" title="Заголовок на странице слева"/>
            <x-forms.editor :model="$body_text_full" field="body_text_full" title="Текст на странице на всю ширину"/>
            <x-forms.editor :model="$body_text_left" field="body_text_left" title="Текст на странице слева"/>
            <x-forms.editor :model="$body_text_right" field="body_text_right" title="Текст на странице справа"/>
            <x-forms.single-image :model="$jobs_bottom" field="jobs_bottom" title="Картинка внизу"/>

            <h2 class="mb-4">Блок в конце каждой вакансии</h2>
            <x-forms.input field="bottom_title" title="Заголовок"/>
            <x-forms.editor :model="$bottom_text" field="bottom_text" title="Описание"/>
            <x-forms.sortable-blocks
                :items="$list"
                field="list"
                title="Что получают сотрудники"
                template="livewire.partials.sortable-blocks.jobs.privilege"
                updateMethod="updateListOrder"
                removeMethod="removeListItem"
                addMethod="addListItem"
            />
        @endsection

        @section('en')
            <h2 class="mb-4">Страница со списком вакансий</h2>
            <x-forms.input field="title_en" title="Заголовок (en)"/>
            <x-forms.input field="header_text_en" title="Текст в шапке (en)"/>
            <x-forms.input field="body_title_left_en" title="Заголовок на странице слева (en)"/>
            <x-forms.editor :model="$body_text_full_en" field="body_text_full_en" title="Текст на странице на всю ширину (en)"/>
            <x-forms.editor :model="$body_text_left_en" field="body_text_left_en" title="Текст на странице слева (en)"/>
            <x-forms.editor :model="$body_text_right_en" field="body_text_right_en" title="Текст на странице справа (en)"/>

            <h2 class="mb-4">Блок в конце каждой вакансии</h2>
            <x-forms.input field="bottom_title_en" title="Заголовок (en)"/>
            <x-forms.editor :model="$bottom_text_en" field="bottom_text_en" title="Описание (en)"/>
            <x-forms.sortable-blocks
                 :items="$list_en"
                 field="list_en"
                 title="Что получают сотрудники (en)"
                 template="livewire.partials.sortable-blocks.jobs.privilege-en"
                 updateMethod="updateListEnOrder"
                 removeMethod="removeListItem"
                 addMethod="addListItem"
            />
        @endsection
    </x-forms.lang-tabs>

    @include('livewire.partials.meta-tags')
</div>
