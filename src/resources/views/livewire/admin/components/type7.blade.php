<div>
    <form>
        <x-forms.collapse title="Пример" id="type7">
            @section('type7_collapse')
                <img src="{{ asset("/admin-resources/img/block-type/type7.png") }}">
            @endsection
        </x-forms.collapse>

        <x-forms.lang-tabs type="type7">
            @section('ru-type7')
                <x-forms.input field="title" title="Заголовок"/>
                <x-forms.textarea field="subtitle" title="Подзаголовок"/>
                <x-forms.editor :model="$desc" field="desc" title="Описание"/>

                <x-forms.collection-image :model="$type7_images" field="type7_images" title="Изображения"/>
            @endsection

            @section('en-type7')
                    <x-forms.input field="title_en" title="Заголовок (en)"/>
                    <x-forms.textarea field="subtitle_en" title="Подзаголовок (en)"/>
                    <x-forms.editor :model="$desc_en" field="desc_en" title="Описание на всю ширину (en)"/>
            @endsection
        </x-forms.lang-tabs>
    </form>
</div>
