<?php

namespace App\Repositories\Gallery;

use App\Repositories\BaseObserverContract;

/**
 * Class GalleryObserver
 *
 * @package App\Repositories\Gallery
 */
class GalleryObserver extends BaseObserverContract
{

    /**
     * @param array $data
     *
     * @return array
     */
    public static function storing(array $data): array
    {
        return $data;
    }

    /**
     * @param       $model
     * @param array $data
     *
     * @return mixed
     */
    public static function stored($model, array $data)
    {
        self::meta('create', $model, $data);

        if (array_key_exists('featured_image', $data) && $data['featured_image']) {
            self::uploadImage($model, $data['featured_image'], 'featured');
        }

        if (array_key_exists('images', $data) && $data['images']) {
            self::uploadMultipleImage($model, $data['images'], 'images');
        }

        return $model;
    }

    /**
     * @param       $model
     * @param array $data
     *
     * @return mixed
     */
    public static function updating($model, array $data)
    {
        return $model;
    }

    /**
     * @param       $model
     * @param array $data
     * @param array $oldModel
     *
     * @return mixed
     */
    public static function updated($model, array $data, array $oldModel)
    {
        self::meta('update', $model, $data);
        return $model;
    }

    /**
     * @param $model
     *
     * @return mixed
     */
    public static function deleting($model)
    {
        $model->metaTag()->delete();
        return $model;
    }

    /**
     * @param $model
     *
     * @return mixed
     */
    public static function deleted($model)
    {
        return $model;
    }

    /**
     * @param $model
     *
     * @return mixed
     */
    public static function restoring($model)
    {
        return $model;
    }

    /**
     * @param $model
     *
     * @return mixed
     */
    public static function restored($model)
    {
        return $model;
    }

    /**
     * @param $model
     *
     * @return mixed
     */
    public static function purging($model)
    {
        return $model;
    }

    /**
     * @param $model
     *
     * @return mixed
     */
    public static function purged($model)
    {
        return $model;
    }
}
