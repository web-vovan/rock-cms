<?php

namespace WebVovan\RockCms\Http\Livewire;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Livewire\Redirector;
use Symfony\Component\PropertyAccess\PropertyAccess;

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
     * Поля для источника слага
     *
     * @var string
     */
    public string $fieldSourceSlug = '';

    /**
     * Поле слага
     *
     * @var string
     */
    public string $fieldSlug = '';

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
            $this->dispatchBrowserEvent('error-validation', ['message' => $e->getMessage()]);
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

        $this->afterUpdated($propertyName);
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

    /**
     * Запускается после обновления свойства ресурса
     *
     * @param $propertyName
     */
    public function afterUpdated(string $propertyName)
    {
        $this->setSlug($propertyName);
    }

    /**
     * Генерация слага
     *
     * @param string $propertyName
     */
    public function setSlug(string $propertyName): void
    {
        $propertyAccessor = PropertyAccess::createPropertyAccessor();

        if ($this->fieldSourceSlug === '' || $this->fieldSlug === '') {
            return;
        }

        if ($propertyName === $this->fieldSourceSlug) {
            $s = Str::of($this->fieldSlug)->explode('.')->last();

            if ($this->resource->getOriginal($s) === null) {
                $newSlug = Str::slug($propertyAccessor->getValue($this, $this->fieldSourceSlug));
                $propertyAccessor->setValue($this, $this->fieldSlug, $newSlug);
            }
        }

        if ($propertyName === $this->fieldSlug) {
            $slugValue = $propertyAccessor->getValue($this, $this->fieldSlug);
            $newSlug = Str::slug($propertyAccessor->getValue($this, $this->fieldSourceSlug));

            if ($slugValue === '') {
                $propertyAccessor->setValue($this, $this->fieldSlug, $newSlug);
            }
        }
    }
}
