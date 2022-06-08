<?php

namespace WebVovan\RockCms\Traits\Livewire;

trait HasMultiselect
{
    /**
     * Добавление элемента в список
     *
     * @param string $itemsField
     * @param string $selectedItemsField
     * @param $value
     */
    public function addItemInSelectedItems(string $itemsField, string $selectedItemsField, $value)
    {
        $this->changeSelect($this->$itemsField, $this->$selectedItemsField, $value);
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
