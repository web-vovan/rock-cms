<?php

namespace WebVovan\RockCms\Http\Livewire;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\RedirectResponse;
use Livewire\Component;
use Livewire\Redirector;
use Livewire\WithPagination;

abstract class ResourceListComponent extends Component
{
    use WithPagination;

    public bool $activeEditButton = true;
    public bool $activeDeleteButton = true;

    protected string $paginationTheme = 'bootstrap';

    /**
     * Поля для сортировки по умолчанию
     *
     * @var string
     */
    public string $sortBy;

    /**
     * Направление для сортировки по умолчанию
     *
     * @var string
     */
    public string $sortDirection;

    /**
     * Поля, доступные для поиска
     *
     * @var array
     */
    public array $search = [];

    /**
     * Слово для поиска
     *
     * @var string
     */
    public string $searchWord = '';

    /**
     * Количество ресурсов на странице
     *
     * @var int
     */
    public int $perPage = 10;

    /**
     * Выбранные элементы в списке ресурсов
     *
     * @var array
     */
    public array $selectList = [];

    /**
     * Метка, показывающая выбор всех ресурсов
     *
     * @var bool
     */
    public bool $checkSelectAll = false;

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
     */
    public function deleteResource(int $id)
    {
        $this->resourceClass::destroy($id);

        $this->dispatchBrowserEvent('resource-delete');
    }

    /**
     * Удаление списка ресурсов
     *
     */
    public function deleteListResources()
    {
        $this->resourceClass::destroy($this->selectList);

        $this->checkSelectAll = false;
        $this->selectList = [];
        $this->dispatchBrowserEvent('resources-delete');
    }

    public function mount()
    {
        $this->sortBy = $this->sortBy ?? 'id';
        $this->sortDirection = $this->sortDirection ?? 'desc';

        $this->addEventListeners();
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
     * Установка сортировки
     *
     * @param string $sortBy Поле сортировки
     * @param string $sortDirection Направление сортировки
     */
    public function setOrder(string $sortBy, string $sortDirection)
    {
        $this->sortBy = $sortBy;
        $this->sortDirection = $sortDirection;
    }

    /**
     * Добавление/удаление ресурса в список для массовой работы
     *
     * @param int $id
     */
    public function addItemInSelectList(int $id)
    {
        $this->checkSelectAll = false;

        $i = array_search($id, $this->selectList);

        if ($i !== false) {
            unset($this->selectList[$i]);
        } else {
            $this->selectList[] = $id;
        }
    }

    /**
     * Выбор всех ресурсов на странице
     */
    public function selectAllResources()
    {
        if ($this->checkSelectAll) {
            $this->checkSelectAll = false;
            $this->selectList = [];

        } else {
            $this->checkSelectAll = true;
            $this->selectList = array_map(fn($item) => $item->id, $this->getData()->items());
        }
    }

    /**
     * Настройка обработчиков для сортировки полей
     */
    public function setSortHandlers(): array
    {
        return [];
    }

    /**
     * Настройка обработчиков для поиска по полям
     */
    public function setSearchHandlers(): array
    {
        return [];
    }

    /**
     * Данные для вывода
     *
     * @return mixed
     */
    public function getData(): Paginator
    {
        $sortHandlers = $this->setSortHandlers();
        $searchHandlers = $this->setSearchHandlers();

        $builder = $this->resourceClass::query();

        array_key_exists($this->sortBy, $sortHandlers)
            ? $sortHandlers[$this->sortBy]($builder, $this->sortBy, $this->sortDirection)
            : $builder->orderBy($this->sortBy, $this->sortDirection);

        if ($this->searchWord && count($this->search)) {
            foreach ($this->search as $field) {
                array_key_exists($field, $searchHandlers)
                    ? $searchHandlers[$field]($builder, $field, $this->searchWord)
                    : $builder->orWhere($field, 'like', '%' . $this->searchWord . '%');
            }

            $this->resetPage();
        }

        return $builder->paginate($this->perPage);
    }

    public function render()
    {
        return view('rock-cms::livewire.components.resource-list', [
            'data' => $this->getData(),
            'columns' => $this->columns(),
            'resource' => $this,
        ]);
    }
}
