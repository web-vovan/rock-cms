<div>
    <form>
        <x-forms.lang-tabs>
            @section('ru')
                <x-forms.input field="title" title="Название"/>
                <x-forms.select field="resource.category_id" :items="$categories" title="Категория"/>
                <x-forms.editor :model="$desc" field="desc" title="Описание"/>
                <x-forms.input-number field="resource.place" min="0" title="Место"/>
                <x-forms.input-number field="resource.year" min="0" title="Год"/>
                <x-forms.single-image :model="$image" field="image" title="Картинка"/>
                <x-forms.single-file :model="$file" field="file" title="Файл"/>
            @endsection

            @section('en')
                <x-forms.input field="title_en" title="Название (en)"/>
                <x-forms.editor :model="$desc_en" field="desc_en" title="Описание (en)"/>
            @endsection
        </x-forms.lang-tabs>
    </form>
</div>
