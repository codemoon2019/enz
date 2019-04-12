<?php

namespace App\Models\MoreLife;

use App\Models\MoreLife\Traits\MoreLifeAttributes;
use App\Models\MoreLife\Traits\MoreLifeRegularFunctions;
use App\Models\MoreLife\Traits\MoreLifeRelations;
use App\Models\MoreLife\Traits\MoreLifeScopes;
use App\Models\MoreLife\Traits\MoreLifeStaticFunctions;
use HalcyonLaravel\Base\Models\Model;
use HalcyonLaravel\Base\Models\Traits\ModelDefaultTraits;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Fomvasss\LaravelMetaTags\Traits\Metatagable;

use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use App\Models\Traits\HasImageMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use Spatie\Image\Manipulations;

/**
 * Class MoreLife
 * @package App\Models\MoreLife
 */
class MoreLife extends Model implements HasMedia
{
    use Metatagable;
    use HasSlug;
    use ModelDefaultTraits;
    use MoreLifeAttributes;
    use MoreLifeRegularFunctions;
    use MoreLifeRelations;
    use MoreLifeScopes;
    use MoreLifeStaticFunctions;
    use HasImageMediaTrait;

    public const MODULE_NAME = 'more life';
    public const VIEW_BACKEND_PATH = 'backend.moreLife';
    public const VIEW_FRONTEND_PATH = 'frontend.moreLife';
    public const ROUTE_ADMIN_PATH = 'admin.more-lives';
    public const ROUTE_FRONTEND_PATH = 'frontend.more-lives';

    /**
     * Declared Fillables
     */
    protected $fillable = [
        'title',
        'description',
        'order',
        'slug',
        'url',
    ];

    /**
     * Return the permissions related to this model.
     *
     * @return array
     */
    public static function permissions(): array
    {
        return [
            // table
            'index' => self::MODULE_NAME . ' list',

            // resources
            'create' => self::MODULE_NAME . ' create',
            'edit' => self::MODULE_NAME . ' edit',
            'show' => self::MODULE_NAME . ' show',
            'destroy' => self::MODULE_NAME . ' destroy',
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
     * Return the links related to this model.
     *
     * @return array
     */
    public function links(): array
    {
        $links = [
            'frontend' => [
                'show' => [
                    'type' => 'show',
                    'url' => [self::ROUTE_FRONTEND_PATH . '.show', $this],
                ]
            ],
            'backend' => [
                'index' => [
                    'type' => 'custom',
                    'label' => 'More Lives',
                    'permission' => self::permission('index'),
                    'url' => [self::ROUTE_ADMIN_PATH . '.index'],
                ],
                'show' => [
                    'type' => 'show',
                    'permission' => self::permission('show'),
                    'url' => [self::ROUTE_ADMIN_PATH . '.show', $this],
                ],
                'edit' => [
                    'type' => 'edit',
                    'permission' => self::permission('edit'),
                    'url' => [self::ROUTE_ADMIN_PATH . '.edit', $this],
                ],
                'destroy' => [
                    'type' => 'destroy',
                    'permission' => self::permission('destroy'),
                    'url' => [self::ROUTE_ADMIN_PATH . '.destroy', $this],
                    'group' => 'more',
                    'redirect' => [self::ROUTE_ADMIN_PATH . '.index'],
                ],
            ]
        ];
        return $links;
    }

    public function registerMediaCollections()
    {
        $this->addMediaCollection('banners')
            ->registerMediaConversions(function (Media $media) {

                $this->addMediaConversion('large')
                    ->optimize()
                    ->format(Manipulations::FORMAT_JPG)
                    ->fit(Manipulations::FIT_CROP, 1200, 370);

                $this->addMediaConversion('thumbnail')// required. used in backend image uploader
                ->optimize()
                    ->format(Manipulations::FORMAT_JPG)
                    ->fit(Manipulations::FIT_CROP, 175, 175);
            });
        $this->addMediaCollection('featured')
            ->registerMediaConversions(function (Media $media) {

                $this->addMediaConversion('main')
                    ->optimize()
                    ->format(Manipulations::FORMAT_JPG)
                    ->fit(Manipulations::FIT_CROP, 700, 350);

                $this->addMediaConversion('thumbnail')// required. used in backend image uploader
                ->optimize()
                    ->format(Manipulations::FORMAT_JPG)
                    ->fit(Manipulations::FIT_CROP, 175, 175);
            });
    }
}
