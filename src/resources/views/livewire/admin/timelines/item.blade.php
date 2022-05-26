<div>
    <form>
        <x-forms.lang-tabs>
            @section('ru')
                <x-forms.input field="title" title="Название"/>
                <x-forms.input-number field="resource.order" min="0" title="Порядок"/>
                <x-forms.input-number field="resource.year" min="0" title="Год"/>
                <x-forms.editor :model="$desc" field="desc" title="Описание"/>
                <x-forms.single-image :model="$photo" field="photo" title="Фото"/>
            @endsection

            @section('en')
                <x-forms.input field="title_en" title="Название (en)"/>
                <x-forms.editor :model="$desc_en" field="desc_en" title="Описание (en)"/>
            @endsection
        </x-forms.lang-tabs>
    </form>
</div>

