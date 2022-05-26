<div>
    <form>
        <x-forms.lang-tabs>
            @section('ru')
                <x-forms.input field="name" title="Имя"/>
                <x-forms.input field="post" title="Должность"/>
                <x-forms.editor :model="$desc" field="desc" title="Описание"/>
                <x-forms.single-image :model="$photo" field="photo" title="Фото"/>
            @endsection

            @section('en')
                <x-forms.input field="name_en" title="Имя (en)"/>
                <x-forms.input field="post_en" title="Должность (en)"/>
                <x-forms.editor :model="$desc_en" field="desc_en" title="Описание (en)"/>
            @endsection
        </x-forms.lang-tabs>
    </form>
</div>

