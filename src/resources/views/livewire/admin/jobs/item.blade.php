<div>
    <form>
        <x-forms.switcher field="resource.active" title="Активность"/>

        <x-forms.lang-tabs>
            @section('ru')
                <x-forms.input field="title" title="Название"/>

                <x-forms.input field="resource.slug" title="Слаг"/>

                <x-forms.multiselect title="Теги" :selected="$tagsSelected" field="tagsSelected" :items="$tags"/>

                <x-forms.input field="price" title="Зарплата"/>
                <x-forms.input field="city" title="Город"/>
                <x-forms.input field="schedule" title="График"/>

                <x-forms.editor :model="$short_desc" field="short_desc" title="Краткое описание"/>

                <x-forms.sortable-blocks
                    :items="$desc"
                    field="desc"
                    title="Описание вакансии"
                    template="livewire.partials.sortable-blocks.jobs.page-desc"
                    updateMethod="updateListOrder"
                    removeMethod="removeListItem"
                    addMethod="addListItem"
                />
            @endsection

            @section('en')
                <x-forms.input field="title_en" title="Название (en)"/>

                <x-forms.input field="price_en" title="Зарплата (en)"/>
                <x-forms.input field="city_en" title="Город (en)"/>
                <x-forms.input field="schedule_en" title="График (en)"/>

                <x-forms.editor :model="$short_desc_en" field="short_desc_en" title="Краткое описание (en)"/>
                <x-forms.sortable-blocks
                    :items="$desc_en"
                    field="desc_en"
                    title="Описание вакансии (en)"
                    template="livewire.partials.sortable-blocks.jobs.page-desc-en"
                    updateMethod="updateListEnOrder"
                    removeMethod="removeListItem"
                    addMethod="addListItem"
                />
            @endsection
        </x-forms.lang-tabs>

        @include('livewire.partials.meta-tags')
    </form>
</div>
