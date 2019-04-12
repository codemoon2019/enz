<?php

namespace App\Repositories\Core\Menu;

use App\Repositories\BaseObserverContract;
use History;

class MenuObserver extends BaseObserverContract
{
    public static function storing(array $data): array
    {
        return $data;
    }

    public static function stored($model, array $data)
    {
        History::created($model);
        return $model;
    }

    public static function updating($model, array $data)
    {
        return $model;
    }

    public static function updated($model, array $data, array $oldModel)
    {
        History::updated($model, $oldModel);
        return $model;
    }

    public static function deleting($model)
    {
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
