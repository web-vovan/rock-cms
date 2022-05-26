<div>
    <form>
        <x-forms.lang-tabs>
            @section('ru')
                <x-forms.input field="title" title="Название"/>
            @endsection

            @section('en')
                <x-forms.input field="title_en" title="Название (en)"/>
            @endsection
        </x-forms.lang-tabs>
    </form>
</div>
