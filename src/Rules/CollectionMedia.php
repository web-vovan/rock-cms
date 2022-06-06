<?php

namespace WebVovan\RockCms\Rules;

use Illuminate\Contracts\Validation\Rule;
use Livewire\TemporaryUploadedFile;

class CollectionMedia implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if ($value === null) {
            return true;
        }

        if (is_array($value)) {
            foreach ($value as $item) {
                if (is_array($item)) {
                    if ($this->checkArray($item) === false) {
                        return false;
                    }
                } else if (is_object($item)) {
                    if ($this->checkObject($item) === false) {
                        return false;
                    }
                } else {
                    return false;
                }
            }

            return true;
        }

        return false;
    }

    /**
     * Проверка массива
     *
     * @param array $item
     * @return bool
     */
    public function checkArray(array $item): bool
    {
        return isset($item['mime_type'])
            && substr($item['mime_type'], 0, 5) === 'image';
    }

    /**
     * Проверка объекта
     *
     * @param $item
     * @return bool
     */
    public function checkObject($item): bool
    {
        return get_class($item) === TemporaryUploadedFile::class
            && substr($item->getMimeType(), 0, 5) === 'image';
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Поле :attribute должно быть массивом с изображениями.';
    }
}
