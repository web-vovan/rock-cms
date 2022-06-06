<?php

namespace WebVovan\RockCms\Rules;

use Illuminate\Contracts\Validation\Rule;
use Livewire\TemporaryUploadedFile;

class SingleMedia implements Rule
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
            return substr($value['mime_type'], 0, 5) === 'image';
        }

        if (is_object($value) && get_class($value) === TemporaryUploadedFile::class) {
            return substr($value->getMimeType(), 0, 5) === 'image';
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
        return 'Поле :attribute должно быть изображением.';
    }
}
