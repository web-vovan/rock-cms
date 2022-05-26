<div>
    <x-forms.lang-tabs>
        @section('ru')
            <x-forms.input field="title" title="Заголовок"/>
            <x-forms.editor :model="$desc" field="desc" title="Текст над картой"/>
            <x-forms.editor :model="$short_desc" field="short_desc" title="Текст слева от карты"/>
            <x-forms.input field="office_block_title" title="Заголовок блока с офисами"/>
        @endsection

        @section('en')
            <x-forms.input field="title_en" title="Заголовок (en)"/>
            <x-forms.editor :model="$desc_en" field="desc_en" title="Текст над картой (en)"/>
            <x-forms.editor :model="$short_desc_en" field="short_desc_en" title="Текст слева от карты (en)"/>
            <x-forms.input field="office_block_title_en" title="Заголовок блока с офисами (en)"/>
        @endsection
    </x-forms.lang-tabs>

    @include('livewire.partials.meta-tags')
</div>
