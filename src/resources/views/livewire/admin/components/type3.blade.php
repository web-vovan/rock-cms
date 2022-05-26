<div>
    <x-forms.collapse title="Пример" id="type3">
        @section('type3_collapse')
            <img src="{{ asset("/admin-resources/img/block-type/type3.png") }}">
        @endsection
    </x-forms.collapse>

    <form>
        <x-forms.collection-image :model="$type3_images" field="type3_images" title="Изображения"/>
    </form>
</div>
