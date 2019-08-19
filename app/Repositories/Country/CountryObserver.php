<?php

namespace App\Repositories\Country;

use App\Repositories\BaseObserverContract;

/**
 * Class CountryObserver
 *
 * @package App\Repositories\Country
 */
class CountryObserver extends BaseObserverContract
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

        if (array_key_exists('capital_icon', $data) && $data['capital_icon'] != null) {

            // if ($model->capital_file != null) {

            //     unlink(public_path('uploads/country') . '/' . $model->capital_file);
            
            // }

            $filename = $data['capital_icon']->getClientOriginalName();

            // $data['capital_icon']->move('./uploads/country', $filename);

            $model->update(['capital_file' => $filename]);

            $model->addMedia($data['capital_icon'])->toMediaCollection('capital_icon');

        }

        if (array_key_exists('founded_icon', $data) && $data['founded_icon'] != null) {

            // if ($model->founded_file != null) {

            //     unlink(public_path('uploads/country') . '/' . $model->founded_file);
            
            // }

            $filename = $data['founded_icon']->getClientOriginalName();

            // $data['founded_icon']->move('./uploads/country', $filename);

            $model->update(['founded_file' => $filename]);

            $model->addMedia($data['founded_icon'])->toMediaCollection('founded_icon');
        }

        if (array_key_exists('area_icon', $data) && $data['area_icon'] != null) {

            // if ($model->area_file != null) {

            //     unlink(public_path('uploads/country') . '/' . $model->area_file);
            
            // }

            $filename = $data['area_icon']->getClientOriginalName();

            // $data['area_icon']->move('./uploads/country', $filename);

            $model->update(['area_file' => $filename]);

            $model->addMedia($data['area_icon'])->toMediaCollection('area_icon');
        }

        if (array_key_exists('population_icon', $data) && $data['population_icon'] != null) {

            // if ($model->population_file != null) {

            //     unlink(public_path('uploads/country') . '/' . $model->population_file);
            
            // }

            $filename = $data['population_icon']->getClientOriginalName();

            // $data['population_icon']->move('./uploads/country', $filename);

            $model->update(['population_file' => $filename]);

            $model->addMedia($data['population_icon'])->toMediaCollection('population_icon');
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
