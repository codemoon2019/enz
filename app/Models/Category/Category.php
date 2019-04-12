<?php

namespace App\Models\Category;

use App\Models\Core\Block\BlockableTrait;
use App\Models\Core\Menu\MenuableTrait;
use App\Models\Traits\HasImageMediaTrait;
use Fomvasss\LaravelMetaTags\Traits\Metatagable;
use HalcyonLaravel\Base\Models\Contracts\ModelStatusContract;
use HalcyonLaravel\Base\Models\Model;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\Models\Media;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Category extends Model implements ModelStatusContract, HasMedia
{
    use Metatagable;
    use HasSlug;
    use BlockableTrait;
    use MenuableTrait;
    use CategoryRelations;
    use HasImageMediaTrait;

    public const MODULE_NAME = 'category';
    public const VIEW_BACKEND_PATH = 'backend.category';
    public const VIEW_FRONTEND_PATH = 'frontend.category';
    public const ROUTE_ADMIN_PATH = 'admin.categories';
    public const ROUTE_FRONTEND_PATH = 'frontend.categories';

    /**
     * Declared Fillables
     */
    protected $fillable = [
        'title',
        'slug',
        'description',
        'status',
        'parent_id',
        'order'
    ];

    /**
     * Return all the permissions for this model.
     *
     * @return array
     */
    public static function permissions(array $keys = []): array
    {
        return [
            'index' => self::MODULE_NAME . " index",
            'show' => self::MODULE_NAME . " show",
            'create' => self::MODULE_NAME . " create",
            'edit' => self::MODULE_NAME . " edit",
            'destroy' => self::MODULE_NAME . " destroy",
            'change-status' => self::MODULE_NAME . " change status",
            'cache' => self::MODULE_NAME . " cache",
            'hierarchy-update' => self::MODULE_NAME . " hierarchy update"
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Return the baseable source for this model.
     *
     * @return array
     */
    public function baseable(): array
    {
        return [
            'source' => 'title'
        ];
    }

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    /**
     * Return the array of statuses.
     * ex. [ 0  => 'Disabled', 1 => 'Active' ], [ 'Disabled', 'Active'], [ 'disabled' => 'Disabled', 'active' =>
     * 'Active' ]
     *
     * @return array
     */
    public function statuses(): array
    {
        return [
            'enable' => 'Enable',
            'disable' => 'Disable'
        ];
    }

    /**
     * Return the column for the status on this model.
     *
     * @return array
     */
    public function statusKeyName(): string
    {
        return 'status';
    }

    /**
     * Return the links related to this model.
     *
     * @return array
     */
    public function links(): array
    {
        $getRoutes = function ($model, $routes = '') use (&$getRoutes) {
            $routeKeyName = $model->{$model->getRouteKeyName()};
            $routes = $routeKeyName . ($routes != '' ? '/' : '') . $routes;
            if (!is_null($model->parent_id)) {
                $getRoutes($model->parent, $routes);
            }
            return $routes;
        };

        $links = [
            'frontend' => [
                'show' => [
                    'type' => 'show',
                    'url' => route(self::ROUTE_FRONTEND_PATH . '.show',
                        $getRoutes($this) ?? $this)
                ]
            ],
            'backend' => [
                'index' => [
                    'type' => 'index',
                    'permission' => self::permission('index'),
                    'url' => route(self::ROUTE_ADMIN_PATH . '.index')
                ],
                'hierarchy' => [
                    'type' => 'custom',
                    'label' => 'Hierarchy',
                    'icon' => 'fa fa-sitemap',
                    'class' => 'btn btn-secondary',
                    'permission' => self::permission('index'),
                    'url' => route(self::ROUTE_ADMIN_PATH . '.hierarchy', $this)
                ],
                'show' => [
                    'type' => 'show',
                    'permission' => self::permission('show'),
                    'url' => route(self::ROUTE_ADMIN_PATH . '.show', $this)
                ],
                'edit' => [
                    'type' => 'edit',
                    'permission' => self::permission('edit'),
                    'url' => route(self::ROUTE_ADMIN_PATH . '.edit', $this)
                ],
                'destroy' => [
                    'type' => 'destroy',
                    'permission' => self::permission('destroy'),
                    'url' => route(self::ROUTE_ADMIN_PATH . '.destroy', $this),
                    'group' => 'more',
                    'redirect' => route(self::ROUTE_ADMIN_PATH . '.index')
                ],
            ]
        ];
        return $links;
    }


    public function registerMediaCollections()
    {
        $this->addMediaCollection('images')
//        ->singleFile()
            //->acceptsFile(function (File $file) {
            //    return $file->mimeType === 'image/jpeg';
            //})
            ->registerMediaConversions(function (Media $media) {
                $this->addMediaConversion('main_banner')
                    ->optimize()
                    ->format(Manipulations::FORMAT_JPG)
                    ->width(1024)
                    ->height(300);

                $this->addMediaConversion('inner_banner')
                    ->optimize()
                    ->format(Manipulations::FORMAT_JPG)
                    ->width(300)
                    ->height(300);

                $this->addMediaConversion('thumbnail')
                    ->optimize()
                    ->format(Manipulations::FORMAT_JPG)
                    ->width(100)
                    ->height(100);
            });
    }
}
