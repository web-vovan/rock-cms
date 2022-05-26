<div>
    <form>
        <x-forms.switcher field="resource.active" title="Активность"/>

        <x-forms.lang-tabs>
            @section('ru')
                <x-forms.input field="title" title="Заголовок"/>

                <x-forms.input field="resource.slug" title="Слаг"/>
                <x-forms.date field="resource.date" :date="$resource->date" title="Дата новости"/>

                <x-forms.single-image :model="$preview" field="preview" title="Превью"/>
                <x-forms.collection-image :model="$images" field="images" title="Картинки внутри статьи"/>
                <x-forms.editor :model="$short_desc" field="short_desc" title="Краткое описание"/>
                <x-forms.editor :model="$top_desc" field="top_desc" enableMedia title="Описание наверху"/>
                <x-forms.editor :model="$bottom_desc" field="bottom_desc" enableMedia title="Описание внизу"/>
            @endsection

            @section('en')
                <x-forms.input field="title_en" title="Заголовок (en)"/>
                <x-forms.editor :model="$short_desc_en" field="short_desc_en" title="Краткое описание (en)"/>
                <x-forms.editor :model="$top_desc_en" field="top_desc_en" enableMedia title="Описание наверху (en)"/>
                <x-forms.editor :model="$bottom_desc_en" field="bottom_desc_en" enableMedia title="Описание внизу (en)"/>
            @endsection
        </x-forms.lang-tabs>

        @include('livewire.partials.meta-tags')
    </form>
</div>
