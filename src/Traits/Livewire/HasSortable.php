<?php

namespace WebVovan\RockCms\Traits\Livewire;

trait HasSortable
{
    /**
     * Удаление элемента из списка
     *
     * @param $key
     * @param $field
     */
    public function removeListItem($key, $field)
    {
        unset($this->$field[$key]);
        $this->$field = array_values($this->$field);
    }

    /**
     * Изменение порядка списка
     *
     * @param $data
     * @param $field
     */
    public function updateOrder($data, $field)
    {
        $this->$field = array_map(function($item) use ($data, $field) {
            return $this->$field[(int) $item['value']];
        }, $data);
    }

    /**
     * Добавление элемента в список из мультиселекта
     *
     * @param array $items
     * @param array $selectedItems
     * @param string $value
     */
    public function changeSelect(array $items, array &$selectedItems, string $value)
    {
        $result = null;

        foreach ($items as $key => $item) {
            if ($item['id'] === (int) $value) {
                $result = $items[$key];
            }
        }

        if ($result) {
            $selectedItems[] = $result;
        }
    }
}
