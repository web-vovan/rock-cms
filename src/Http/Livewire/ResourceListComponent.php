<?php

namespace Webvovan\RockCms\Http\Livewire;

use Illuminate\Http\RedirectResponse;
use Livewire\Component;
use Livewire\Redirector;

abstract class ResourceListComponent extends Component
{
    /**
     * Метод запускается один раз при монтировании компонента
     *
     */
    abstract public function init();

    /**
     * Стандартные слушатели событий
     *
     * @var array|string[]
     */
    public array $eventListeners = [
        'createResource' => 'createResource',
        'deleteResource' => 'deleteResource',
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
     * Создание ресурса
     *
     * @return Redirector|RedirectResponse
     */
    public function createResource(): Redirector|RedirectResponse
    {
        return redirect()->route($this->nameRouteResourceCreate);
    }

    /**
     * Удаление ресурса
     *
     * @param int $id
     * @return Redirector|RedirectResponse
     */
    public function deleteResource(int $id): Redirector|RedirectResponse
    {
        $this->resourceClass::destroy($id);

        session()->flash('resource-delete');

        return redirect(request()->header('Referer'));
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
