<?php

namespace App\Repositories\StudentVisa;

use App\Repositories\BaseObserverContract;

/**
 * Class StudentVisaObserver
 *
 * @package App\Repositories\StudentVisa
 */
class StudentVisaObserver extends BaseObserverContract
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

            $model->addMedia($data['icon'])->toMediaCollection('featured');
            // $filename = $data['icon']->getClientOriginalName();

            // $data['icon']->move('./uploads/student_visa', $filename);

            // $model->update(['file' => $filename]);

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

            // if ($model->file != null) {

            //     unlink(public_path('uploads/student_visa') . '/' . $model->file);
            
            // }

            // $filename = $data['icon']->getClientOriginalName();

            // $data['icon']->move('./uploads/student_visa', $filename);

            // $model->update(['file' => $filename]);

            $model->addMedia($data['icon'])->toMediaCollection('featured');

        }
        
        // cache()->flush();
        
        // return $model;

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
