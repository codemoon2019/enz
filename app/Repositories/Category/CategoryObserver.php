<?php

namespace App\Repositories\Category;

use App\Repositories\BaseObserverContract;
use History;

class CategoryObserver extends BaseObserverContract
{
    public static function storing(array $data): array
    {
        return $data;
    }

    public static function stored($model, array $data)
    {
        History::created($model);

        self::meta('create', $model, $data);

        return $model;
    }

    public static function updating($model, array $data)
    {
        return $model;
    }

    public static function updated($model, array $data, array $oldModel)
    {
        History::updated($model, $oldModel);
        self::meta('update', $model, $data);

        return $model;
    }

    public static function deleting($model)
    {
        $model->metable()->delete();
        $model->menuable()->delete();
        $model->images()->delete();
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
