<?php
/**
 * Created by PhpStorm.
 * User: Lloric Mayuga Garcia <lloricode@gmail.com>
 * Date: 2/17/19
 * Time: 1:54 PM
 */

namespace App\Repositories;

use App\Repositories\Core\Domain\DomainRepository;
use HalcyonLaravel\Base\Models\Model as HalcyonBaseModel;
use HalcyonLaravel\Base\Repository\ObserverContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Spatie\MediaLibrary\HasMedia\HasMedia;

abstract class BaseObserverContract extends ObserverContract
{
    /**
     * @param string                              $action
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param array                               $data
     * @param string                              $defaultField
     */
    protected static function meta(string $action, Model $model, array $data, string $defaultField = 'title')
    {
        if (!array_key_exists('meta', $data)) {
            return;
        }

        $meta = $data['meta'];

        $title = null;

        if (!empty($meta['title'])) {
            $title = $meta['title'];
        } elseif ($model instanceof HalcyonBaseModel) {
            $title = $model->base('source');
        } else {
            $title = $model->$defaultField;
        }

        $model->metaTag()->{$action}([
            'title' => $title,
            'description' => $meta['description'] ?: $title,
            'keywords' => $meta['keywords']
                ?: str_replace(' ', ',', strtolower($title)),
        ]);
    }

    /**
     * @param string                              $action
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param array                               $data
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     * @throws \Throwable
     */
    protected static function menuNode(string $action, Model $model, array $data)
    {
        if (!(
            array_key_exists('menuable', $data) &&
            $data['menuable']['name'] &&
            $data['menuable']['menu_id'])) {
            return;
        }

        $menuable = $data['menuable'];
        $repo = app(MenuNodeRepository::class);

        if ($action == 'update' && !empty($model->menuable)) {
            $repo->update([
                'name' => $data['menuable']['name'],
                'menu_id' => $data['menuable']['menu_id']
            ], $model->menuable->id);

            return;
        }

        $node = $repo->create([
            'name' => $menuable['name'],
            'menu_id' => $menuable['menu_id'],
        ]);

        $model->menuable()->save($node);
    }

    /**
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param array                               $data
     */
    protected static function syncDomains(Model $model, array $data)
    {
        if (!array_key_exists('domains', $data)) {
            return;
        } elseif (empty($data['domains'])) {
            $model->domains()->sync([]);
            return;
        }

        $domains = collect(explode(',', $data['domains']));

        $domainIds = $domains->map(function ($domain_) {
            $domain = app(DomainRepository::class)
                ->findByField('machine_name', $domain_)
                ->first();
            if (empty($domain)) {
                abort(400, "No domain machine_name [$domain_]");
            }
            return $domain->id;
        });

        $model->domains()->sync($domainIds);
        app('query.cache')->flush();
    }

    protected static function uploadMultipleImage(HasMedia $model, array $images, $collectionName)
    {
        foreach ($images as $image) {
            self::uploadImage($model, $image[0], $collectionName);
        }
    }

    protected static function uploadImage(HasMedia $model, UploadedFile $image, $collectionName)
    {
        $fileName = $image->getClientOriginalName();

        $model->addMedia($image)
            ->withCustomProperties([
                'attributes' => [
                    'alt' => $fileName,
                    'title' => $fileName,
                ]
            ])
            ->toMediaCollection($collectionName);
    }
}
