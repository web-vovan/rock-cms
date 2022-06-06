<?php

namespace WebVovan\RockCms\Traits\Livewire;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Livewire\TemporaryUploadedFile;
use Livewire\WithFileUploads;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

trait HasMedia
{
    use WithFileUploads;

    /**
     * Сохранение одиночной медиа
     *
     * @param Model $model Модель
     * @param mixed $media Медиа для сохранения
     * @param string $collectionName Имя коллекции
     */
    public function saveSingleMedia(Model $model, mixed $media, string $collectionName)
    {
        if ($media === null) {
            $model->clearMediaCollection($collectionName);
            $media = null;
        }

        if ($media instanceof TemporaryUploadedFile) {
            $this->$collectionName = $model
                ->addMedia($media->getRealPath())
                ->usingName($media->getClientOriginalName())
                ->toMediaCollection($collectionName);
        }
    }

    /**
     * Сохранение коллекции медиа
     *
     * @param Model $model Модель
     * @param array|Collection $medias Массив медиа для сохранения
     * @param string $collectionName Имя коллекции
     */
    public function saveCollectionMedia(Model $model, array|Collection $medias, string $collectionName)
    {
        //  удаляем старые картинки
        $oldMediaIds = $model->getMedia($collectionName)->pluck('id');
        $newMediaIds = collect($medias)->filter(
            function ($item) {
                return is_array($item) || ($item instanceof Media);
            }
        )->pluck('id');

        $oldMediaIds->diff($newMediaIds)
            ->each(function($id) use ($model) {
                $model->deleteMedia($id);
            });

        // добавляем новые картинки
        foreach ($medias as $key => $image) {
            if (is_array($image)) {
                if ($image['order_column'] !== $key) {
                    $media = Media::find($image['id']);
                    $media->order_column = $key;
                    $media->save();
                }
            }

            if ($image instanceof TemporaryUploadedFile) {
                $this->$collectionName[$key] = $model
                    ->addMedia($image->getRealPath())
                    ->usingName($image->getClientOriginalName())
                    ->setOrder($key)
                    ->toMediaCollection($collectionName);
            }
        }
    }

    /**
     * Удаление медиа
     *
     * @param string $field
     * @param int|null $key
     */
    public function deleteMedia(string $field, int $key = null )
    {
        if ($key === null) {
            $this->$field = null;
        } else {
            unset($this->$field[$key]);
            $this->$field = array_values($this->$field);
        }
    }

    /**
     * Сортировка изображений
     *
     * @param $data
     */
    public function changeOrderMedia($data)
    {
        $field = explode(':', $data[0]['value'])[0];

        $this->$field = array_map(function($item) use ($data, $field) {
            $index = explode(':', $item['value'])[1];
            return $this->$field[(int) $index];
        }, $data);
    }

    /**
     * Измененный метод из трейта WithFileUploads
     *
     * @param $name
     * @param $tmpPath
     * @param $isMultiple
     */
    public function finishUpload($name, $tmpPath, $isMultiple)
    {
        $this->cleanupOldUploads();

        if ($isMultiple) {
            $file = collect($tmpPath)->map(function ($i) {
                return TemporaryUploadedFile::createFromLivewire($i);
            })->toArray();
            $this->emit('upload:finished', $name, collect($file)->map->getFilename()->toArray())->self();

            // изменил для добавления картинок в общий список при мультизакгрузке
            $file = array_merge($this->getPropertyValue($name), $file);
        } else {
            $file = TemporaryUploadedFile::createFromLivewire($tmpPath[0]);
            $this->emit('upload:finished', $name, [$file->getFilename()])->self();

            // If the property is an array, but the upload ISNT set to "multiple"
            // then APPEND the upload to the array, rather than replacing it.
            if (is_array($value = $this->getPropertyValue($name))) {
                $file = array_merge($value, [$file]);
            }
        }

        $this->syncInput($name, $file);
    }
}
