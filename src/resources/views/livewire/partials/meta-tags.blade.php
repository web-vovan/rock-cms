<h3>SEO</h3>

<x-forms.lang-tabs type="meta-tags">
    @section('ru-meta-tags')
        <x-forms.input field="seo_title" title="Title"/>
        <x-forms.input field="seo_desc" title="Description"/>
        <x-forms.select field="seo_follow_type" :items="$follow_types" title="Follow"/>
    @endsection

    @section('en-meta-tags')
        <x-forms.input field="seo_title_en" title="Title (en)"/>
        <x-forms.input field="seo_desc_en" title="Description (en)"/>
    @endsection
</x-forms.lang-tabs>
