<div>
    <form>
        <x-forms.collapse title="Пример" id="type6">
            @section('type6_collapse')
                <img src="{{ asset("/admin-resources/img/block-type/type6.png") }}">
            @endsection
        </x-forms.collapse>

        <x-forms.lang-tabs type="type6">
            @section('ru-type6')
                <x-forms.input field="title" title="Заголовок"/>
                <x-forms.textarea field="subtitle" title="Подзаголовок"/>
                <x-forms.editor :model="$desc" field="desc" title="Описание"/>

                <x-forms.single-image :model="$type6_image" field="type6_image" title="Картинка"/>
            @endsection

            @section('en-type6')
                    <x-forms.input field="title_en" title="Заголовок (en)"/>
                    <x-forms.textarea field="subtitle_en" title="Подзаголовок (en)"/>
                    <x-forms.editor :model="$desc_en" field="desc_en" title="Описание на всю ширину (en)"/>
            @endsection
        </x-forms.lang-tabs>
    </form>
</div>
