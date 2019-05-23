<?php

namespace App\Models\BecomeOurClientInquiry;

use App\Models\BecomeOurClientInquiry\Traits\BecomeOurClientInquiryAttributes;
use App\Models\BecomeOurClientInquiry\Traits\BecomeOurClientInquiryRegularFunctions;
use App\Models\BecomeOurClientInquiry\Traits\BecomeOurClientInquiryRelations;
use App\Models\BecomeOurClientInquiry\Traits\BecomeOurClientInquiryScopes;
use App\Models\BecomeOurClientInquiry\Traits\BecomeOurClientInquiryStaticFunctions;
use HalcyonLaravel\Base\Models\Model;
use HalcyonLaravel\Base\Models\Traits\ModelDefaultTraits;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Fomvasss\LaravelMetaTags\Traits\Metatagable;

/**
 * Class BecomeOurClientInquiry
 * @package App\Models\BecomeOurClientInquiry
 */
class BecomeOurClientInquiry extends Model
{
    use Metatagable;
    use HasSlug;
    use ModelDefaultTraits;
    use BecomeOurClientInquiryAttributes;
    use BecomeOurClientInquiryRegularFunctions;
    use BecomeOurClientInquiryRelations;
    use BecomeOurClientInquiryScopes;
    use BecomeOurClientInquiryStaticFunctions;

    public const MODULE_NAME = 'become our client inquiry';
    public const VIEW_BACKEND_PATH = 'backend.becomeOurClientInquiry';
    public const VIEW_FRONTEND_PATH = 'frontend.becomeOurClientInquiry';
    public const ROUTE_ADMIN_PATH = 'admin.become-our-client-inquiries';
    public const ROUTE_FRONTEND_PATH = 'frontend.become-our-client-inquiries';

    /**
     * Declared Fillables
     */

    protected $fillable = [
        'first_name',
        'last_name',
        'middle_name',
        'date_of_birth',
        'country_birth',
        'passport_number',
        'citizenship',
        'civil_status',
        'gender',
        'expiry_date',
        'street_number',
        'street_name',
        'town',
        'province',
        'zip_code',
        'email',
        'mobile_number',
        'telephone_number',
        'file',
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
            'source' => 'first_name'
        ];
    }

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('first_name')
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
                    'label' => 'Become Our Client Inquiries',
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
