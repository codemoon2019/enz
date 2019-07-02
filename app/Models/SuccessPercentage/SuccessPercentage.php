<?php

namespace App\Models\SuccessPercentage;

use App\Models\SuccessPercentage\Traits\SuccessPercentageAttributes;
use App\Models\SuccessPercentage\Traits\SuccessPercentageRegularFunctions;
use App\Models\SuccessPercentage\Traits\SuccessPercentageRelations;
use App\Models\SuccessPercentage\Traits\SuccessPercentageScopes;
use App\Models\SuccessPercentage\Traits\SuccessPercentageStaticFunctions;
use HalcyonLaravel\Base\Models\Model;
use HalcyonLaravel\Base\Models\Traits\ModelDefaultTraits;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Fomvasss\LaravelMetaTags\Traits\Metatagable;

/**
 * Class SuccessPercentage
 * @package App\Models\SuccessPercentage
 */
class SuccessPercentage extends Model
{
    use Metatagable;
    use HasSlug;
    use ModelDefaultTraits;
    use SuccessPercentageAttributes;
    use SuccessPercentageRegularFunctions;
    use SuccessPercentageRelations;
    use SuccessPercentageScopes;
    use SuccessPercentageStaticFunctions;

    public const MODULE_NAME = 'success percentage';
    public const VIEW_BACKEND_PATH = 'backend.successPercentage';
    public const VIEW_FRONTEND_PATH = 'frontend.successPercentage';
    public const ROUTE_ADMIN_PATH = 'admin.success-percentages';
    public const ROUTE_FRONTEND_PATH = 'frontend.success-percentages';

    /**
     * Declared Fillables
     */
    protected $fillable = [
        'title',
        'percentage',
        'order',
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
                    'label' => 'Success Percentages',
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
