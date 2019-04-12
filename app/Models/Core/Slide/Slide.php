<?php

namespace App\Models\Core\Slide;

use App\Models\Traits\HasDomains;
use App\Models\Traits\HasImageMediaTrait;
use HalcyonLaravel\Base\Models\Contracts\ModelStatusContract;
use HalcyonLaravel\Base\Models\Model;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\Models\Media;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Slide extends Model implements ModelStatusContract, HasMedia
{
    use HasSlug;
    use HasImageMediaTrait;
    use HasDomains;

    public const MODULE_NAME = 'slide';
    public const VIEW_BACKEND_PATH = 'backend.core.slide';
    public const VIEW_FRONTEND_PATH = 'frontend.core.slide';
    public const ROUTE_ADMIN_PATH = 'admin.slides';
    public const ROUTE_FRONTEND_PATH = 'frontend.slides';
    public const MEDIA_LIBRARY_CUSTOM_PROPERTIES = [
        'title',
        'description',
    ];

    /**
     * Declared Fillables
     */
    protected $fillable = [
        'machine_name',
        'description',
        'title',
        'slug',
        'status',
        'template',
        'collection_name',
        'navigation_button',
    ];

    /**
     * Return all the permissions for this model.
     *
     * @param array $keys
     *
     * @return array
     */
    public static function permissions(array $keys = []): array
    {
        return [
            'index' => self::MODULE_NAME . " index",
//            'show' => self::MODULE_NAME . " show",
           'create' => self::MODULE_NAME . " create",
            'edit' => self::MODULE_NAME . " edit",
            'destroy' => self::MODULE_NAME . " destroy",
            'change-status' => self::MODULE_NAME . " change status",
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
            ->saveSlugsTo('slug')
            ->slugsShouldBeNoLongerThan(is_latest_mysql_version() ? 250 : 191);
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
     * @return string
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
        $links = [
            'backend' => [
//                'show' => [
//                    'type' => 'show',
//                    'permission' => self::permission('show'),
//                    'url' => route(self::ROUTE_ADMIN_PATH . '.show', $this)
//                ],
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
                    'redirect' => route(self::ROUTE_ADMIN_PATH . '.index'),
                ],
            ]

        ];


        return $links;
    }

    public function registerMediaCollections()
    {
        $this->addMediaCollection('banner')
            ->registerMediaConversions(function (Media $media) {
                $this->addMediaConversion('main')
                    ->optimize()
                    ->format(Manipulations::FORMAT_JPG)
                    ->fit(Manipulations::FIT_CROP, 855, 640);
                $this->addMediaConversion('large')
                    ->optimize()
                    ->format(Manipulations::FORMAT_JPG)
                    ->fit(Manipulations::FIT_CROP, 1739, 727);
                $this->addMediaConversion('thumbnail')
                    ->optimize()
                    ->format(Manipulations::FORMAT_JPG)
                    ->fit(Manipulations::FIT_CROP, 175, 175);
            });
    }
}
