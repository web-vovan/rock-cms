<?php

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

if (!function_exists('getMediaLink')) {
    function getMediaLink($model): string
    {
        $url = '';

        if ($model) {
            if ($model instanceof Spatie\MediaLibrary\MediaCollections\Models\Media) {
                $url = $model->getUrl();
            } else if ($model instanceof Livewire\TemporaryUploadedFile) {
                $url = $model->temporaryUrl();
            } else if (is_array($model)) {
                $url = $model['original_url'];
            }
        }

        return $url;
    }
}

if (!function_exists('getMediaFileName')) {
    function getMediaFileName($model): string
    {
        $name = '';

        if ($model) {
            if ($model instanceof Spatie\MediaLibrary\MediaCollections\Models\Media) {
                $name = $model->name;
            } else if ($model instanceof Livewire\TemporaryUploadedFile) {
                $name = $model->getClientOriginalName();
            } else if (is_array($model)) {
                $name = $model['name'];
            }
        }

        return $name;
    }
}

/**
 * Сохранение из текста картинок в формате base64
 * и замена на путь на диске
 */
if (!function_exists('replaceBase64Image')) {
    function replaceBase64Image($field): string
    {
        if ($field === '') {
            return $field;
        }

        $dom = new \DomDocument();

        @$dom->loadHtml("\xEF\xBB\xBF" . $field, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');

        foreach($images as $k => $img){
            $data = $img->getAttribute('src');

            if (stripos($data, ';base64,')) {
                $data = base64_decode(explode(';base64,', $data)[1]);

                Storage::disk('public')->put('editor/' . time() . $k . '.png', $data);
                $path = Storage::disk('public')->url('editor/' . time() . $k . '.png');

                $img->removeAttribute('src');
                $img->setAttribute('src', URL::asset($path));
            }
        }

        return $dom->saveHTML();
    }
}

/**
 * Получение картинки из base64
 */
if (!function_exists('getImageFromBase64')) {
    function getImageFromBase64($image_64): array
    {
        // https://laracasts.com/discuss/channels/laravel/create-image-from-base64-string-laravel?page=1&replyId=608290

        $result = [];

        $result['extension'] = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];

        $replace = substr($image_64, 0, strpos($image_64, ',')+1);

        $image = str_replace($replace, '', $image_64);
        $result['image'] = str_replace(' ', '+', $image);

        return $result;
    }
}
