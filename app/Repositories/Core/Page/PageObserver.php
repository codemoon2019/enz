<?php

namespace App\Repositories\Core\Page;

use App\Repositories\BaseObserverContract;
use History;

class PageObserver extends BaseObserverContract
{

    public static function storing(array $data): array
    {
        return $data;
    }

    /**
     * @param       $model
     * @param array $data
     *
     * @return mixed
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     * @throws \Throwable
     */
    public static function stored($model, array $data)
    {
        self::meta('create', $model, $data);
        self::menuNode('create', $model, $data);
        History::created($model);

        self::syncDomains($model, $data);

        return $model;
    }

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
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     * @throws \Throwable
     */
    public static function updated($model, array $data, array $oldModel)
    {
        self::meta('update', $model, $data);
        self::syncDomains($model, $data);
        self::menuNode('update', $model, $data);
        History::updated($model, $oldModel);
        return $model;
    }

    public static function deleting($model)
    {
        $model->metaTag()->delete();
        $model->menuable()->delete();
        $model->clearMediaCollection('images');
        return $model;
    }

    public static function deleted($model)
    {
        History::deleted($model);
        return $model;
    }

    public static function restoring($model)
    {
        return $model;
    }

    public static function restored($model)
    {
        History::restored($model);
        return $model;
    }

    public static function purging($model)
    {
        return $model;
    }

    public static function purged($model)
    {
        History::purged($model);
        return $model;
    }
}
