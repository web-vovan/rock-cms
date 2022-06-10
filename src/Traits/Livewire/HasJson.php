<?php

namespace WebVovan\RockCms\Traits\Livewire;

use Symfony\Component\PropertyAccess\PropertyAccess;

trait HasJson
{
    /**
     * Удаление элемента из списка
     *
     * @param $key
     * @param $field
     */
    public function deleteItemJson($key, $field)
    {
        $propertyAccessor = PropertyAccess::createPropertyAccessor();

        $data = $propertyAccessor->getValue($this, $field);
        unset($data[$key]);

        $propertyAccessor->setValue($this, $field, array_values($data));
    }

    /**
     * Изменение порядка списка
     *
     * @param $data
     */
    public function changeOrderJson($data)
    {
        $propertyAccessor = PropertyAccess::createPropertyAccessor();

        /*
         * Поле для сортировки
         * доступ к вложенным полям через точку
         */
        $field = explode(':', $data[0]['value'])[0];

        $oldData = $propertyAccessor->getValue($this, $field);

        $newData = array_map(function($item) use ($data, $oldData) {
            $index = explode(':', $item['value'])[1];
            return $oldData[(int) $index];
        }, $data);

        $propertyAccessor->setValue($this, $field, $newData);
    }
}
