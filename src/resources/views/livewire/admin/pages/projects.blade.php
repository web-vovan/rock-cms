<div>
    <x-forms.lang-tabs>
        @section('ru')
            <x-forms.input field="title" title="Заголовок"/>
        @endsection

        @section('en')
            <x-forms.input field="title_en" title="Заголовок (en)"/>
        @endsection
    </x-forms.lang-tabs>

    @include('livewire.partials.meta-tags')
</div>
