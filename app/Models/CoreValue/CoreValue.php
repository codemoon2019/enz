<?php

namespace App\Models\CoreValue;

use App\Models\CoreValue\Traits\CoreValueAttributes;
use App\Models\CoreValue\Traits\CoreValueRegularFunctions;
use App\Models\CoreValue\Traits\CoreValueRelations;
use App\Models\CoreValue\Traits\CoreValueScopes;
use App\Models\CoreValue\Traits\CoreValueStaticFunctions;
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
use App\Models\Traits\CustomAttributes;

/**
 * Class CoreValue
 * @package App\Models\CoreValue
 */
class CoreValue extends Model implements HasMedia
{
    use Metatagable;
    use HasSlug;
    use ModelDefaultTraits;
    use CoreValueAttributes;
    use CoreValueRegularFunctions;
    use CoreValueRelations;
    use CoreValueScopes;
    use CoreValueStaticFunctions;
    use HasImageMediaTrait;
    use CustomAttributes;

    public const MODULE_NAME = 'core value';
    public const VIEW_BACKEND_PATH = 'backend.coreValue';
    public const VIEW_FRONTEND_PATH = 'frontend.coreValue';
    public const ROUTE_ADMIN_PATH = 'admin.core-values';
    public const ROUTE_FRONTEND_PATH = 'frontend.core-values';

    /**
     * Declared Fillables
     */
    protected $fillable = [
        'title',
        'description',
        'color',
        'slug',
        'order',
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
                    'label' => 'Core Values',
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
        $this->addMediaCollection('featured')->singleFile()->registerMediaConversions(function (Media $media) {

            $this->addMediaConversion('thumbnail')
                ->optimize()
                ->format(Manipulations::FORMAT_JPG)
                ->fit(Manipulations::FIT_CROP, 175, 175);

            $this->addMediaConversion('small')
                ->optimize()
                ->format(Manipulations::FORMAT_PNG)
                ->fit(Manipulations::FIT_CROP, 120, 100);
        });
    }
}
