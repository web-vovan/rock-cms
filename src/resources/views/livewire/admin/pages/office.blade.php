<div>
    <x-forms.lang-tabs>
        @section('ru')
            <x-forms.input field="title" title="Заголовок"/>
            <x-forms.editor :model="$header_top_text" field="header_top_text" title="Текст в шапке над картинкой"/>
            <x-forms.editor :model="$header_bottom_text" field="header_bottom_text" title="Текст в шапке под картинкой"/>

            <x-forms.input field="office_space_title" title="Площадь офиса: Заголовок"/>
            <x-forms.input field="office_space_value" title="Площадь офиса: Значение"/>

            <x-forms.input field="workplace_title" title="Рабочих мест: Заголовок"/>
            <x-forms.input field="workplace_value" title="Рабочих мест: Значение"/>

            <x-forms.input field="coworking_title" title="Мест в коворкинге: Заголовок"/>
            <x-forms.input field="coworking_value" title="Мест в коворкинге: Значение"/>

            <x-forms.input field="meeting_room_title" title="Количество переговорок: Заголовок"/>
            <x-forms.input field="meeting_room_value" title="Количество переговорок: Значение"/>

            <x-forms.input field="images_block_title" title="Заголовок блока с изображениями"/>
            <x-forms.input field="zones_block_title" title="Заголовок блока с зонами"/>


            <x-forms.single-image :model="$office_main" field="office_main" title="Главная картинка"/>
            <x-forms.collection-image :model="$office_images" field="office_images" title="Дополнительные картинки"/>
        @endsection
        @section('en')
            <x-forms.input field="title_en" title="Заголовок (en)"/>
            <x-forms.editor :model="$header_top_text_en" field="header_top_text_en" title="Текст в шапке над картинкой (en)"/>
            <x-forms.editor :model="$header_bottom_text_en" field="header_bottom_text_en" title="Текст в шапке под картинкой (en)"/>

            <x-forms.input field="office_space_title_en" title="Площадь офиса: Заголовок (en)"/>
            <x-forms.input field="office_space_value_en" title="Площадь офиса: Значение (en)"/>

            <x-forms.input field="workplace_title_en" title="Рабочих мест: Заголовок (en)"/>
            <x-forms.input field="workplace_value_en" title="Рабочих мест: Значение (en)"/>

            <x-forms.input field="coworking_title_en" title="Мест в коворкинге: Заголовок (en)"/>
            <x-forms.input field="coworking_value_en" title="Мест в коворкинге: Значение (en)"/>

            <x-forms.input field="meeting_room_title_en" title="Количество переговорок: Заголовок (en)"/>
            <x-forms.input field="meeting_room_value_en" title="Количество переговорок: Значение (en)"/>

            <x-forms.input field="images_block_title_en" title="Заголовок блока с изображениями (en)"/>
            <x-forms.input field="zones_block_title_en" title="Заголовок блока с зонами (en)"/>
        @endsection
    </x-forms.lang-tabs>

    @include('livewire.partials.meta-tags')
</div>
