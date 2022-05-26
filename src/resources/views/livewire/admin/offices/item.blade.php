<div>
    <form>
        <x-forms.switcher field="resource.main_office" title="Главный офис"/>

        <x-forms.lang-tabs>
            @section('ru')
                <x-forms.input field="title" title="Название"/>
                <x-forms.input-number field="resource.order" min="0" title="Порядок"/>
                <x-forms.input field="resource.email" title="Email"/>
                <x-forms.input field="resource.phone" title="Телефон"/>
                <x-forms.textarea field="address" title="Адрес"/>
                <x-forms.textarea field="map_code" title="Карта"/>
                <x-forms.single-image :model="$photo" field="photo" title="Фото"/>
            @endsection

            @section('en')
                    <x-forms.input field="title_en" title="Название (en)"/>
                    <x-forms.textarea field="address_en" title="Адрес (en)"/>
                    <x-forms.textarea field="map_code_en" title="Карта (en)"/>
            @endsection
        </x-forms.lang-tabs>
    </form>
</div>

