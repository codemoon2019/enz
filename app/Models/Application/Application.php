<?php

namespace App\Models\Application;

use App\Models\Application\Traits\ApplicationAttributes;
use App\Models\Application\Traits\ApplicationRegularFunctions;
use App\Models\Application\Traits\ApplicationRelations;
use App\Models\Application\Traits\ApplicationScopes;
use App\Models\Application\Traits\ApplicationStaticFunctions;
use HalcyonLaravel\Base\Models\Model;
use HalcyonLaravel\Base\Models\Traits\ModelDefaultTraits;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Fomvasss\LaravelMetaTags\Traits\Metatagable;

/**
 * Class Application
 * @package App\Models\Application
 */
class Application extends Model
{
    use Metatagable;
    use HasSlug;
    use ModelDefaultTraits;
    use ApplicationAttributes;
    use ApplicationRegularFunctions;
    use ApplicationRelations;
    use ApplicationScopes;
    use ApplicationStaticFunctions;

    public const MODULE_NAME = 'application';
    public const VIEW_BACKEND_PATH = 'backend.application';
    public const VIEW_FRONTEND_PATH = 'frontend.application';
    public const ROUTE_ADMIN_PATH = 'admin.applications';
    public const ROUTE_FRONTEND_PATH = 'frontend.applications';

    /**
     * Declared Fillables
     */
    protected $fillable = [
        'career_id',
        'full_name',
        'mobile_number',
        'address',
        'email_address',
        'employment_status',
        'message',
        'slug',
        'resume',
    ];

    protected $appends = ['position'];

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
            'source' => 'full_name'
        ];
    }

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('full_name')
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
                    'label' => 'Applications',
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
