<div>
    <form>
        <x-forms.collapse title="Пример" id="type5">
            @section('type5_collapse')
                <img src="{{ asset("/admin-resources/img/block-type/type5.png") }}">
            @endsection
        </x-forms.collapse>

        <x-forms.lang-tabs type="type5">
            @section('ru-type5')
                <x-forms.input field="title" title="Заголовок"/>
                <x-forms.textarea field="subtitle" title="Подзаголовок"/>
                <x-forms.textarea field="left_desc" title="Описание слева"/>
                <x-forms.textarea field="right_desc" title="Описание справа"/>
                <x-forms.editor :model="$full_desc" field="full_desc" title="Описание на всю ширину"/>

                <x-forms.collection-image :model="$type5_images" field="type5_images" title="Изображения"/>
            @endsection

            @section('en-type5')
                    <x-forms.input field="title_en" title="Заголовок (en)"/>
                    <x-forms.textarea field="subtitle_en" title="Подзаголовок (en)"/>
                    <x-forms.textarea field="left_desc_en" title="Описание слева (en)"/>
                    <x-forms.textarea field="right_desc_en" title="Описание справа (en)"/>
                    <x-forms.editor :model="$full_desc_en" field="full_desc_en" title="Описание на всю ширину (en)"/>
            @endsection
        </x-forms.lang-tabs>
    </form>
</div>
