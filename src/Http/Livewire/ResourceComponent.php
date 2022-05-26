<?php

namespace Webvovan\RockCms\Http\Livewire;

use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Livewire\Redirector;

abstract class ResourceComponent extends Component
{
    /**
     * Метод запускается один раз при монтировании компонента
     *
     */
    abstract public function init();

    /**
     * Метод запускается при сохранении компонента
     *
     */
    abstract public function save();

    /**
     * Стандартные слушатели событий
     *
     * @var array|string[]
     */
    public array $eventListeners = [
        'saveResource' => 'saveResource',
        'saveAndExitResource' => 'saveAndExitResource',
        'deleteResource' => 'deleteResource',
        'cancelResource' => 'cancelResource',
    ];

    /**
     * Класс ресурса
     *
     * @var string
     */
    public string $resourceClass;

    /**
     * Именованный маршрут списка ресурсов
     *
     * @var string
     */
    public string $nameRouteResourceList;

    /**
     * Именованный маршрут редактирования ресурса
     *
     * @var string
     */
    public string $nameRouteResourceEdit;

    /**
     * Именованный маршрут создания ресурса
     *
     * @var string
     */
    public string $nameRouteResourceCreate;

    /**
     * Ресурс является новым
     *
     * @var bool
     */
    public bool $isNewResource;

    /**
     * Создание ресурса
     *
     * @return Redirector|RedirectResponse
     */
    public function createResource(): Redirector|RedirectResponse
    {
        return redirect()->route($this->nameRouteResourceCreate);
    }

    /**
     * Сохранение ресурса
     *
     * @param bool $redirectAfterSave
     * @return Redirector|RedirectResponse
     */
    public function saveResource(bool $redirectAfterSave = false)
    {
        try {
            $this->validate();

            $this->isNewResource = $this->resource->getOriginal('id') === null;

            $this->save();

            if ($this->isNewResource) {
                session()->flash('resource-create');
                return redirect()->route($this->nameRouteResourceEdit, $this->resource);
            }

            if ($redirectAfterSave) {
                session()->flash('resource-update');
                return redirect()->route($this->nameRouteResourceList);
            } else {
                $this->dispatchBrowserEvent('resource-update');
            }
        } catch(ValidationException $e) {
            $this->dispatchBrowserEvent('error-validation');
            $this->validate();
        }
    }

    /**
     * Сохранить ресурс и выйти
     */
    public function saveAndExitResource()
    {
        $this->saveResource(true);
    }

    /**
     * Удаление ресурса
     *
     * @return Redirector|RedirectResponse
     */
    public function deleteResource(): Redirector|RedirectResponse
    {
        $this->resourceClass::destroy($this->resource->id);

        session()->flash('resource-delete');

        return redirect()->route($this->nameRouteResourceList);
    }

    /**
     * Выход из ресурса
     *
     * @return Redirector|RedirectResponse
     */
    public function cancelResource(): Redirector|RedirectResponse
    {
        return redirect()->route($this->nameRouteResourceList);
    }

    /**
     * Валидация свойств при обновлении
     *
     * @param $propertyName
     * @throws ValidationException
     */
    public function updated($propertyName)
    {

        $this->validateOnly($propertyName);
    }

    public function mount()
    {
        $this->addEventListeners();

        $this->init();
    }

    public function addEventListeners()
    {
        foreach ($this->eventListeners as $key => $value) {
            $this->listeners[$key] = $value;
        }
    }

    public function hydrate()
    {
        $this->addEventListeners();
    }
}
