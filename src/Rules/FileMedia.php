<?php

namespace WebVovan\RockCms\Rules;

use Illuminate\Contracts\Validation\Rule;
use Livewire\TemporaryUploadedFile;

class FileMedia implements Rule
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

        if (is_array($value) && isset($value['mime_type'])) {
            return true;
        }

        if (is_object($value) && get_class($value) === TemporaryUploadedFile::class) {
            return is_string($value->getMimeType());
        }

        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Поле :attribute должно быть файлом.';
    }
}
