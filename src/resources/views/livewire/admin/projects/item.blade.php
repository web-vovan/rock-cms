<div>
    <form>
        <x-forms.switcher field="resource.active" title="Активность"/>
        <x-forms.switcher field="resource.is_product" title="Это продукт"/>

        <x-forms.lang-tabs>
            @section('ru')
                <x-forms.input field="title" title="Заголовок"/>

                <x-forms.input field="resource.slug" title="Слаг"/>

                <x-forms.input field="resource.link" title="Ссылка на старый проект"/>

                <x-forms.sortable-multiselect
                    :items="$categories"
                    :selectedItems="$categoriesSelected"
                    changeMethod="changeSelectCategory"
                    field="categoriesSelected"
                    title="Категории"
                    updateMethod="updateCategoryOrder"
                    removeMethod="removeListItem"
                />

                <x-forms.multiselect title="Теги" :selected="$tagsSelected" field="tagsSelected" :items="$tags"/>

                <x-forms.single-image :model="$preview" field="preview" title="Превью"/>
                <x-forms.single-image :model="$fullImage" field="fullImage" title="Полное изображение"/>
            @endsection

            @section('en')
                <x-forms.input field="title_en" title="Заголовок (en)"/>
            @endsection
        </x-forms.lang-tabs>

        @if($resource->id)
        <x-forms.sortable-components
            :items="$componentList"
            field="componentList"
            :componentTypeList="$componentTypeList"
            title="Блоки"
            updateMethod="updateComponentListOrder"
            removeMethod="removeListItem"
            editMethod="editComponent"
            addMethod="addComponent"
        />
        @else
            <div class="alert alert-warning mb-4 mt-4" role="alert">
                <i class="fas fa-exclamation-triangle"></i> Товарищ, сохрани проект для создания блоков!
            </div>
        @endif

        <div wire:ignore.self class="modal fade" id="componentModal" tabindex="-1" aria-labelledby="componentModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Блок</h5>
                    </div>
                    <div class="modal-body">
                        @foreach($componentTypeList as $type)
                            @if ($componentType === $type['type'] && $componentId === null)
                                @php
                                    $componentPath = 'admin.components.' . $type['type'];
                                @endphp
                                @livewire("$componentPath", [
                                    'project' => $resource,
                                ])
                            @endif
                        @endforeach

                        @foreach($resource->components as $component)
                            @if ($componentId === $component->id)
                                @php
                                    $componentPath = 'admin.components.' . $component->type;
                                @endphp
                                @livewire("$componentPath", [
                                    'project' => $resource,
                                    'componentId' => $component->id
                                ])
                            @endif
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="hideModal">Закрыть</button>
                        <button type="button" class="btn btn-primary" wire:click="$emit('saveComponent')">Сохранить</button>
                    </div>
                </div>
            </div>
        </div>

        @include('livewire.partials.meta-tags')
    </form>
</div>
