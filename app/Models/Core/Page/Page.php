<?php

namespace App\Models\Core\Page;

use App\Models\Core\Block\BlockableTrait;
use App\Models\Core\Menu\MenuNode;
use App\Models\Traits\HasDomains;
use App\Models\Traits\HasImageMediaTrait;
use Fomvasss\LaravelMetaTags\Traits\Metatagable;
use HalcyonLaravel\Base\Models\Model;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\Models\Media;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Translatable\HasTranslations;
use App\Models\Content\Content;

class Page extends Model implements HasMedia
{
    use Metatagable;
    use HasSlug;
    use HasTranslations;
    use BlockableTrait;
    use HasDomains;
    use HasImageMediaTrait;

    public const MODULE_NAME = 'page';
    public const VIEW_BACKEND_PATH = 'backend.core.page';
    public const VIEW_FRONTEND_PATH = 'frontend.core.page';
    public const ROUTE_ADMIN_PATH = 'admin.pages';
    public const ROUTE_FRONTEND_PATH = 'frontend.pages';

    public $translatable = ['title'];

    /**
     * Declared Fillables
     */
    protected $fillable = [
        'title',
        'slug',
        'content',
        'description',
        'template',
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
//            'show' => self::MODULE_NAME . " show",
//            'create' => self::MODULE_NAME . " create",
            'edit' => self::MODULE_NAME . " edit",
           'destroy' => self::MODULE_NAME . " destroy",
//            'change-status' => self::MODULE_NAME . " change status",
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
            ->slugsShouldBeNoLongerThan(is_latest_mysql_version() ? '250' : '191');
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
                'show' => ['type' => 'show', 'url' => route(self::ROUTE_FRONTEND_PATH . '.show', $this)],
            ],
            'backend' => [
//                'show' => [
//                    'type' => 'show',
//                    'permission' => self::permission('show'),
//                    'url' => route(self::ROUTE_ADMIN_PATH . '.show', $this)
//                ],
                'edit' => [
                    'type' => 'edit',
                    'permission' => self::permission('edit'),
                    'url' => route(self::ROUTE_ADMIN_PATH . '.edit', $this)
                ],
               'destroy' => [
                   'type' => 'destroy',
                   'permission' => self::permission('edit'),
                   'url' => route(self::ROUTE_ADMIN_PATH . '.destroy', $this),
                   'group' => 'more',
                   'redirect' => route(self::ROUTE_ADMIN_PATH . '.index')
               ],
            ]

        ];


        return $links;
    }

    public function registerMediaCollections()
    {
        $this->addMediaCollection('banner')->registerMediaConversions(function (Media $media) {

            $this->addMediaConversion('main')
                ->optimize()
                ->keepOriginalImageFormat()
                ->fit(Manipulations::FIT_CROP, 1739, 696);
            $this->addMediaConversion('thumbnail')
                ->format(Manipulations::FORMAT_JPG)
                ->fit(Manipulations::FIT_CROP, 175, 175);
        });

        $this->addMediaCollection('featured')->registerMediaConversions(function (Media $media) {
            // define other conversions here
            $this->addMediaConversion('thumbnail')// required. used in backend image uploader
            ->optimize()
                ->format(Manipulations::FORMAT_JPG)
                ->fit(Manipulations::FIT_CROP, 175, 175);
            $this->addMediaConversion('main')
                ->optimize()
                ->keepOriginalImageFormat()
                ->fit(Manipulations::FIT_CROP, 740, 548);
        });
    }

    public function menuable()
    {
        return $this->morphOne(MenuNode::class, 'menuable');
    }

    public function getContentByCurrentDomain()
    {
        return app('query.cache')->queryCache(function () {
            $pageContent = $this->pageContents()
                ->hasCurrentDomain()
                ->first();

            if (empty($pageContent)) {
                return '';
            }
            return $pageContent->content;
        }, [$this->id]);
    }

    public function pageContents()
    {
        return $this->hasMany(PageContent::class);
    }

    /**
     * Required format
     * - Array of forms object
     * - Form must have a fields attribute
     * - Field must have a name, value and type attributes
     *
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection
     */
    public function getDraggableContentFormsAttribute()
    {
        return $this->pageContents()->get()->map(function ($pageContent) {
            $fields = [];

            $field = new \StdClass;
            $field->name = 'domainTitle';
            $field->value = $pageContent->domains()->first()->title;
            $field->type = 'forTitle';
            $fields[] = $field;

            $field = new \StdClass;
            $field->name = 'content';
            $field->value = $pageContent->content;
            $field->type = 'textarea';
            $fields[] = $field;

            $form = new \StdClass;
            $form->id = $pageContent->id;
            $form->fields = $fields;
            return $form;
        });
    }

    public function getUrl()
    {
        $urls = [];

        $uri = null;
        if (!is_null($this->pageable_type)) {
            $uri = route(app($this->pageable_type)::ROUTE_FRONTEND_PATH . '.index');
            $base = parse_url($uri)['host'];
            $scheme = parse_url($uri)['scheme'];
            $uri = str_replace($scheme . '://' . $base, '', $uri);
        }

        foreach ($this->domains as $domain) {
            $url = add_scheme_host($domain->domain) . (is_null($uri) ? '/' . $this->slug : $uri);
            $urls[] = html()->a($url, $url)->attribute('target', '_blank');
        }

        return implode('<br/>', $urls) ?: 'No Url';
    }

    public function contents()
    {
        return $this->morphMany(Content::class, 'contentable')->orderBy('order');
    }
}
