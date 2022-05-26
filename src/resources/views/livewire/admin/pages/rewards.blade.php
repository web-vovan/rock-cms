<div>
    <x-forms.lang-tabs>
        @section('ru')
            <x-forms.input field="title" title="Заголовок"/>
            <x-forms.editor :model="$desc" field="desc" title="Описание"/>
        @endsection

        @section('en')
            <x-forms.input field="title_en" title="Заголовок (en)"/>
            <x-forms.editor :model="$desc_en" field="desc_en" title="Описание (en)"/>
        @endsection
    </x-forms.lang-tabs>

    @include('livewire.partials.meta-tags')
</div>
