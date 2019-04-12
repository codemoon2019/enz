<?php

namespace App\Models\Core\Menu;

use App\Models\Traits\HasDomains;
use HalcyonLaravel\Base\Models\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Translatable\HasTranslations;

class MenuNode extends Model
{
    use HasSlug;
    use HasTranslations;
    use HasDomains;

    public const MODULE_NAME = 'menu node';
    public const VIEW_BACKEND_PATH = 'backend.core.menu.node';
    public const ROUTE_ADMIN_PATH = 'admin.menus.node';
    public const VIEW_FRONTEND_PATH = '';
    public const ROUTE_FRONTEND_PATH = '';


    public $translatable = ['name'];
    protected $fillable = [
        'name',
        'a_target',
        'slug',
        'url',
        'order',
        'options',
        'type',
        'menu_id',
        'parent_id',
        'menuable_id',
        'menuable_type'
    ];
    protected $appends = ['link'];

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
        ];
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

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function option($key)
    {
        $options = json_decode($this->options);
        return array_key_exists($key, $options) ? $options[$key] : null;
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function parent()
    {
        return $this->belongsTo(MenuNode::class, 'parent_id');
    }

    public function nodes()
    {
        return $this->hasMany(MenuNode::class, 'parent_id')->orderBy('order');
    }

    public function menuable()
    {
        return $this->morphTo();
    }

    public function getLinkAttribute()
    {
        if (!is_null($this->menuable)) {
            return $this->menuable->actions('frontend', 'show', true) ?? '#';
        }
        return $this->url ?? '#';
    }

    /**
     * Return the links related to this model.
     *
     * @return array
     */
    public function links(): array
    {
        return [
            'backend' => [
                'edit' => [
                    'type' => 'edit',
                    'permission' => self::permission('edit'),
                    'url' => route(self::ROUTE_ADMIN_PATH . '.edit', [$this->menu, $this]) .
                        '?domain-name=' . app('request')->get('domain-name')
                ],
                'destroy' => [
                    'type' => 'destroy',
                    'permission' => self::permission('destroy'),
                    'url' => route(self::ROUTE_ADMIN_PATH . '.destroy', [$this->menu, $this]),
                    'redirect' => route($this->menu::ROUTE_ADMIN_PATH . '.hierarchy', $this->menu)
                ],
            ]
        ];
    }
}
