<?php

namespace App\Models\Core;

use App\Models\Traits\HasImageMediaTrait;

use HalcyonLaravel\Base\Models\Model;
use HalcyonLaravel\Base\Models\Traits\ModelTraits;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\Models\Media;

class Inquiry extends Model implements HasMedia
{
    use HasSlug;
    use HasImageMediaTrait;
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
        'profession',
        'email_address',
        'mobile_number',
        'consultation',
        'location',
        'inquiry',
        'country',
        'resume',
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
            'destroy' => self::MODULE_NAME . " destroy",
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
                'destroy' => [
                    'type' => 'destroy',
                    'permission' => self::permission('destroy'),
                    'url' => [self::ROUTE_ADMIN_PATH . '.destroy', $this],
                    'redirect' => [self::ROUTE_ADMIN_PATH . '.index'],
                ]
            ]
        ];
        return $links;
    }

    public function getUpdatedAtFormattedAttribute()
    {
        return $this->updated_at->format(config('core.setting.formats.datetime_12'));
    }

    public function getActionButtonsAttribute()
    {
        $action = '<div class="btn-group" role="group">';
        $action .= '<a href="'.route('admin.inquiries.show', $this->slug).'"><i class="fa fa-search btn btn-primary btn-sm"></i></a>';

        if ($this->resume != null) {

            $action .= '<a target="_blank" href="'.route('admin.inquiries.download', $this->slug).'"><i class="fa fa-download btn btn-primary btn-sm"></i></a>';

        }
        $action .= '<form class="delete" action="'.route('admin.inquiries.destroy',['inquiry'=>$this->slug]).'" method="post">
            <button class="btn btn-primary btn-sm" type="submit" style="padding:.15rem .55rem;"><i class="fa fa-trash"></i></button>
            <input type="hidden" name="_method" value="delete" />'
            .csrf_field().'
        </form>';
        $action .= '</div>';
        return $action;


        // $action = '<a href="'.route('admin.inquiries.show', $this->slug).'"><i class="fa fa-search btn btn-primary btn-sm"></i></a>';

        // if ($this->getMedia('document')->count() > 0 || $this->resume != null) {

        //     $action .= '<a target="_blank" href="'.route('admin.inquiries.download', $this->slug).'"><i class="fa fa-download btn btn-primary btn-sm"></i></a>';

        // }

        // return $action;

    }

    public function registerMediaCollections()
    {
        $this->addMediaCollection('document')->singleFile();
    }

}
