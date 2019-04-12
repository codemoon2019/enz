<?php

namespace App\Models\Core\Menu;

use App\Models\Traits\HasDomains;
use HalcyonLaravel\Base\Models\Contracts\ModelStatusContract;
use HalcyonLaravel\Base\Models\Model;
use HalcyonLaravel\Base\Models\Traits\ModelDefaultTraits as DefaultTrait;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Menu extends Model implements ModelStatusContract
{
    use HasDomains;
    use HasSlug;
    use DefaultTrait;

    public const MODULE_NAME = 'menu';
    public const VIEW_BACKEND_PATH = 'backend.core.menu';
    public const VIEW_FRONTEND_PATH = 'frontend.core.menu';
    public const ROUTE_ADMIN_PATH = 'admin.menus';
    public const ROUTE_FRONTEND_PATH = 'frontend.menus';

    /**
     * Declared Fillables
     */
    protected $fillable = [
        'name',
        'slug',
        'depth',
        'status',
        'template',
        'description',
        'machine_name'
    ];

    /**
     * Default boot method
     */
    public static function boot()
    {
        parent::boot();
        static::creating(function (Model $model) {
            $model->machine_name = $model->slug;
        });
    }

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
            'create' => self::MODULE_NAME . " create",
            'edit' => self::MODULE_NAME . " edit",
            'destroy' => self::MODULE_NAME . " destroy",
            'change-status' => self::MODULE_NAME . " change status",
            'cache' => self::MODULE_NAME . " cache",
            'hierarchy' => self::MODULE_NAME . " hierarchy",
            'hierarchy-update' => self::MODULE_NAME . " hierarchy update"
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Return the relationship of this model to Node
     */
    public function nodes()
    {
        return $this->hasMany(MenuNode::class)->orderBy('order');
    }

    /**
     * Return the baseable source for this model.
     *
     * @return array
     */
    public function baseable(): array
    {
        return [
            'source' => 'name'
        ];
    }

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
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
        $links = [
            'frontend' => [
                // 'show' => ['type' => 'show', 'url' => route("{$this->route_frontend_path}.show", $this)],
            ],
            'backend' => [
                'hierarchy' => [
                    'type' => 'custom',
                    'label' => 'Hierarchy',
                    'icon' => 'fa fa-sitemap',
                    'class' => 'btn btn-secondary',
                    'permission' => self::permission('hierarchy'),
                    'url' => route(self::ROUTE_ADMIN_PATH . '.hierarchy',
                            $this) . '?domain-name=' . app('request')->get('domain-name')
                ],
                // 'show' => [
                //     'type' => 'show',
                //     'permission' => self::permission('show'),
                //     'url' => route(self::ROUTE_ADMIN_PATH . '.show', $this)
                // ],
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
}
