<?php

namespace App\Models\SampleModule;

use App\Models\SampleModule\Traits\SampleModuleAttributes;
use App\Models\SampleModule\Traits\SampleModuleRegularFunctions;
use App\Models\SampleModule\Traits\SampleModuleRelations;
use App\Models\SampleModule\Traits\SampleModuleScopes;
use App\Models\SampleModule\Traits\SampleModuleStaticFunctions;
use HalcyonLaravel\Base\Models\Model;
use HalcyonLaravel\Base\Models\Traits\ModelDefaultTraits;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Fomvasss\LaravelMetaTags\Traits\Metatagable;
use App\Models\Traits\CustomAttributes;

/**
 * Class SampleModule
 * @package App\Models\SampleModule
 */
class SampleModule extends Model
{
    use Metatagable;
    use HasSlug;
    use ModelDefaultTraits;
    use SampleModuleAttributes;
    use SampleModuleRegularFunctions;
    use SampleModuleRelations;
    use SampleModuleScopes;
    use SampleModuleStaticFunctions;
    use CustomAttributes;

    public const MODULE_NAME = 'sample module';
    public const VIEW_BACKEND_PATH = 'backend.sampleModule';
    public const VIEW_FRONTEND_PATH = 'frontend.sampleModule';
    public const ROUTE_ADMIN_PATH = 'admin.sample-modules';
    public const ROUTE_FRONTEND_PATH = 'frontend.sample-modules';

    /**
     * Declared Fillables
     */
    protected $fillable = [
        'title',
        'status',
        'slug',
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
                    'label' => 'Sample Modules',
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
}
