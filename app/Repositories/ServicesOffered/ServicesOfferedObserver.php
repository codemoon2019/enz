<?php

namespace App\Repositories\ServicesOffered;

use App\Repositories\BaseObserverContract;

/**
 * Class ServicesOfferedObserver
 *
 * @package App\Repositories\ServicesOffered
 */
class ServicesOfferedObserver extends BaseObserverContract
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
        if (array_key_exists('icon', $data) && $data['icon'] != null) {

            $filename = $data['icon']->getClientOriginalName();

            $data['icon']->move('./uploads/services', $filename);

            $model->update(['file' => $filename]);

        }

        self::meta('create', $model, $data);

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

        if (array_key_exists('icon', $data) && $data['icon'] != null) {

            if ($model->file != null) {

                unlink(public_path('uploads/services') . '/' . $model->file);
            
            }

            $filename = $data['icon']->getClientOriginalName();

            $data['icon']->move('./uploads/services', $filename);

            $model->update(['file' => $filename]);

        }
        
        cache()->flush();
        
        return $model;

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
