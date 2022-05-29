<?php

namespace WebVovan\RockCms\Traits\Livewire;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

trait HasTableData
{
    public bool $activeEditButton = true;
    public bool $activeDeleteButton = true;
    public bool $activeShowButton = false;

    /**
     * Заголовки таблицы с данными
     *
     * @var array
     */
    public array $tableHeads;

    /**
     * Коллекция с данными
     *
     * @var Collection
     */
    public Collection $tableData;

    /**
     * Конфиг с настройками таблицы
     *
     * @var array
     */
    public array $config;

    public function getTableHeads(): array
    {
        return array_map(
            fn($item) => $item['label'],
            $this->heads()
        );
    }

    public function getTableConfig(): array
    {
        return [
            'language' => [
                'url' => "//cdn.datatables.net/plug-ins/1.11.5/i18n/ru.json"
            ],
            'order' => [[0,'desc']],
            'columns' => array_map(
                function ($item) {
                    return [
                        'orderable' => $item['sort'],
                        'type' => $item['type'] ?? 'string',
                        'className' => $item['className'] ?? '',
                    ];
                },
                $this->heads()
            )
        ];
    }

    public function getActionButtons(int $id): string
    {
        $result = '<div class="btn-group">';

        if ($this->activeEditButton) {
            $result .= '<a class="btn btn-default text-secondary"
                        href="/admin/' . $this->resourceUri . '/' . $id . '/edit">
                        <i class="fa fa-fw fa-pen"></i>
                        </a>';
        }

        if ($this->activeDeleteButton) {
            $result .= '<button wire:click="$emit(\'deleteResource\',' . $id . ')" onclick="confirm(\'Подтвердите удаление\') || event.stopImmediatePropagation();" class="btn btn-danger">
            <i class="fa fa-fw fa-trash"></i>
        </button>';
        }

        if ($this->activeShowButton) {
            $result .= ' <button class="btn btn-sm btn-default text-info">
                              <i class="fa fa-fw fa-eye"></i>
                          </button>';
        }

        $result .= '</div>';

        return $result;
    }

    public function getLinkToEditResource(string $title, int $id): string
    {
        return '<a class="text-dark" href="/admin/'. $this->resourceUri . '/' . $id . '/edit">' . $title . '</a>';
    }

    public function showActiveIcon(Model $model, string $field): string
    {
        return $model->$field
            ? '<i class="fas fa-check text-success"></i>'
            : '<i class="fas fa-ban text-danger"></i>';
    }
}
