<div>
    <form>
        <x-forms.switcher field="resource.active" title="Активность"/>

        <x-forms.lang-tabs>
            @section('ru')
                <x-forms.input field="title" title="Название"/>
                <x-forms.input field="resource.link" title="Ссылка"/>
                <x-forms.input-number field="resource.order" min="0" title="Порядок"/>
                <x-forms.single-image :model="$logo" field="logo" title="Логотип"/>
                <x-forms.single-file :model="$file" field="file" title="Файл"/>
            @endsection

            @section('en')
                <x-forms.input field="title_en" title="Название (en)"/>
            @endsection
        </x-forms.lang-tabs>
    </form>
</div>