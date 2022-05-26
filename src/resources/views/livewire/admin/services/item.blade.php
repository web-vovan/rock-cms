<div>
    <form>
        <x-forms.switcher field="resource.active" title="Активность"/>

        <x-forms.lang-tabs>
            @section('ru')
                <x-forms.input field="title" title="Название"/>
                <x-forms.input-number field="resource.service_order" min="0" title="Порядок"/>

                <x-forms.sortable-multiselect
                    :items="$projects"
                    :selectedItems="$selectedProjects"
                    changeMethod="changeSelectProject"
                    field="selectedProjects"
                    title="Проекты"
                    updateMethod="updateProjectOrder"
                    removeMethod="removeListItem"
                />

                <x-forms.editor :model="$desc" field="desc" title="Описание"/>
            @endsection

            @section('en')
                <x-forms.input field="title_en" title="Название (en)"/>

                <x-forms.editor :model="$desc_en" field="desc_en" title="Описание (en)"/>
            @endsection
        </x-forms.lang-tabs>
    </form>
</div>
