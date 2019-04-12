<?php

namespace App\Models\Core;

use HalcyonLaravel\Base\Models\Model;
use HalcyonLaravel\Base\Models\Traits\ModelTraits;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Inquiry extends Model
{
    use HasSlug;
    use ModelTraits;

    public const MODULE_NAME = 'inquiry';
    public const VIEW_BACKEND_PATH = 'backend.core.inquiry';
    public const ROUTE_ADMIN_PATH = 'admin.inquiries';
    public const VIEW_FRONTEND_PATH = '';
    public const ROUTE_FRONTEND_PATH = '';

    /**
     * Declared Fillables
     */
    protected $fillable = [
        'slug',
        'user_id',
        'full_name',
        'email',
        'contact',
        'postcode',
        'message',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * Return all the permissions for this model.
     *
     * @return array
     */
    public static function permissions(): array
    {
        return [
            'index' => self::MODULE_NAME . " index",
            'show' => self::MODULE_NAME . " show",
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
            'source' => 'subject'
        ];
    }

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('subject')
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
            'backend' => [
                'index' => [
                    'type' => 'custom',
                    'label' => 'Inquiries',
                    'permission' => self::permission('index'),
                    'url' => route(self::ROUTE_ADMIN_PATH . '.index')
                ],
                'show' => [
                    'type' => 'show',
                    'permission' => self::permission('show'),
                    'url' => route(self::ROUTE_ADMIN_PATH . '.show', $this)
                ],
            ]
        ];
        return $links;
    }

    public function getUpdatedAtFormattedAttribute()
    {
        return $this->updated_at->format(config('core.setting.formats.datetime_12'));
    }
}
