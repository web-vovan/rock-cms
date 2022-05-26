<div>
    <x-forms.lang-tabs>
        @section('ru')
            <x-forms.input field="title" title="Заголовок"/>
            <x-forms.editor :model="$desc" field="desc" title="Описание"/>
            <x-forms.editor :model="$requisites" field="requisites" title="Реквизиты компании"/>

            <x-forms.input field="requisites_block_title" title="Заголовок блока Реквизиты компании"/>
            <x-forms.input field="certificates_block_title" title="Заголовок блока Сертификаты"/>
            <x-forms.input field="licenses_block_title" title="Заголовок блока Лицензии"/>
            <x-forms.input field="recommendations_block_title" title="Заголовок блока Рекомендательные письма"/>
        @endsection

        @section('en')
            <x-forms.input field="title_en" title="Заголовок (en)"/>
            <x-forms.editor :model="$desc_en" field="desc_en" title="Описание (en)"/>
            <x-forms.editor :model="$requisites_en" field="requisites_en" title="Реквизиты компании (en)"/>

            <x-forms.input field="requisites_block_title_en" title="Заголовок блока Реквизиты компании (en)"/>
            <x-forms.input field="certificates_block_title_en" title="Заголовок блока Сертификаты (en)"/>
            <x-forms.input field="licenses_block_title_en" title="Заголовок блока Лицензии (en)"/>
            <x-forms.input field="recommendations_block_title_en" title="Заголовок блока Рекомендательные письма (en)"/>
        @endsection
    </x-forms.lang-tabs>

    @include('livewire.partials.meta-tags')
</div>
