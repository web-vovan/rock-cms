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
    public function changeOrder($data)
    {
        $field = explode(':', $data[0]['value'])[0];

        $this->$field = array_map(function($item) use ($data, $field) {
            $index = explode(':', $item['value'])[1];
            return $this->$field[(int) $index];
        }, $data);
    }
}
