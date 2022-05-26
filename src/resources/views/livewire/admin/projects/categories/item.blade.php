<div>
    <form>
        <x-forms.lang-tabs>
            @section('ru')
                <x-forms.input field="title" title="Название"/>
                <x-forms.input field="resource.slug" title="Слаг"/>
                <x-forms.single-image :model="$preview" field="preview" title="Превью"/>
                <x-forms.editor :model="$desc" field="desc" title="Описание"/>
            @endsection

            @section('en')
                    <x-forms.input field="title_en" title="Название (en)"/>
                    <x-forms.editor :model="$desc_en" field="desc_en" title="Описание (en)"/>
            @endsection
        </x-forms.lang-tabs>
    </form>
</div>
