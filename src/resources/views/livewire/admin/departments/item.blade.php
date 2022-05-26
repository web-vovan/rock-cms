<div>
    <form>
        <x-forms.lang-tabs>
            @section('ru')
                <x-forms.input field="title" title="Название"/>

                <x-forms.multiselect title="Теги" :selected="$tagsSelected" field="tagsSelected" :items="$tags"/>

                <x-forms.editor :model="$desc" field="desc" title="Описание"/>

                <x-forms.sortable-multiselect
                    :items="$people"
                    :selectedItems="$peopleSelected"
                    changeMethod="changeSelectPeople"
                    field="peopleSelected"
                    title="Люди"
                    updateMethod="updatePeopleOrder"
                    removeMethod="removeListItem"
                />
            @endsection

            @section('en')
                <x-forms.input field="title_en" title="Название (en)"/>

                <x-forms.editor :model="$desc_en" field="desc_en" title="Описание (en)"/>
            @endsection
        </x-forms.lang-tabs>
    </form>
</div>
