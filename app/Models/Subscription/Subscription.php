<?php

namespace App\Models\Subscription;

use App\Models\Subscription\Traits\SubscriptionAttributes;
use App\Models\Subscription\Traits\SubscriptionRegularFunctions;
use App\Models\Subscription\Traits\SubscriptionRelations;
use App\Models\Subscription\Traits\SubscriptionScopes;
use App\Models\Subscription\Traits\SubscriptionStaticFunctions;
use HalcyonLaravel\Base\Models\Model;
use HalcyonLaravel\Base\Models\Traits\ModelDefaultTraits;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Fomvasss\LaravelMetaTags\Traits\Metatagable;



use App\Models\Traits\HasImageMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;

/**
 * Class Subscription
 * @package App\Models\Subscription
 */
class Subscription extends Model implements HasMedia
{
    use Metatagable;
    use HasSlug;
    use ModelDefaultTraits;
    use SubscriptionAttributes;
    use SubscriptionRegularFunctions;
    use SubscriptionRelations;
    use SubscriptionScopes;
    use SubscriptionStaticFunctions;

    use HasImageMediaTrait;

    public const MODULE_NAME = 'subscription';
    public const VIEW_BACKEND_PATH = 'backend.subscription';
    public const VIEW_FRONTEND_PATH = 'frontend.subscription';
    public const ROUTE_ADMIN_PATH = 'admin.subscriptions';
    public const ROUTE_FRONTEND_PATH = 'frontend.subscriptions';

    /**
     * Declared Fillables
     */
    protected $fillable = [
        'slug',
        'full_name',
        'profession',
        'email_address',
        'mobile_number',
        'location',
        'message',
        'school',
        'course',
        'resume',
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
            'source' => 'email_address'
        ];
    }

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('email_address')
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
                    'label' => 'Subscriptions',
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
        $this->addMediaCollection('document')->singleFile();
    }
    
}
