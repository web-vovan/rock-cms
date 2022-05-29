<?php

namespace WebVovan\RockCms\Traits\Livewire;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Livewire\TemporaryUploadedFile;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

trait HasMedia
{
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
            if ($image instanceof TemporaryUploadedFile) {
                $this->$collectionName[$key] = $model
                    ->addMedia($image->getRealPath())
                    ->usingName($image->getClientOriginalName())
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
        }
    }
}
