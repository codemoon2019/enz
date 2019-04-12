<?php

namespace App\Models\Core\Block;

use App\Models\Content\ContentableTrait;
use App\Models\Traits\HasImageMediaTrait;
use HalcyonLaravel\Base\Models\Contracts\ModelStatusContract;
use HalcyonLaravel\Base\Models\Model;
use HalcyonLaravel\Base\Models\Traits\ModelDefaultTraits as DefaultTrait;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\Models\Media;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Block extends Model implements ModelStatusContract, HasMedia
{
    use DefaultTrait, HasSlug, ContentableTrait, HasImageMediaTrait;

    public const MODULE_NAME = 'block';
    public const VIEW_BACKEND_PATH = 'backend.core.block';
    public const VIEW_FRONTEND_PATH = 'frontend.core.block';
    public const ROUTE_ADMIN_PATH = 'admin.blocks';
    public const ROUTE_FRONTEND_PATH = 'frontend.blocks';

    /**
     * Declared Fillables
     */
    protected $fillable = [
        'title',
        'slug',
        'content',
        'status',
        'type',
        'template',
        'link',
        'machine_name'
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
            'create' => self::MODULE_NAME . " create",
            'edit' => self::MODULE_NAME . " edit",
            'destroy' => self::MODULE_NAME . " destroy",
            'change-status' => self::MODULE_NAME . " change status",
        ];
    }

    /**
     * Return the route key name of this model.
     *
     * @return string
     */
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
     * @return string
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
        return [
            'backend' => [
                'show' => [
                    'type' => 'show',
                    'permission' => self::permission('show'),
                    'url' => route(self::ROUTE_ADMIN_PATH . '.show', $this)
                ],
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
    }

    /**
     * Required format
     * - Array of forms object
     * - Form must have a fields attribute
     * - Field must have a name, value and type attributes
     * @return void
     */
    public function getDraggableFormsAttribute()
    {
        $contents = $this->contents()->orderBy('order')->get();

        $formFields = ['title', 'body', 'image'];

        $forms = $contents->map(function($content) use ($formFields) {
            $form = new \StdClass;
            $form->id = $content->id;
            $fields = [];

            foreach (/* $content->only */($formFields) as $item) {
                $field = new \StdClass;
                $field->name = $item;
                
                // insert field's type
                /* if (in_array($name, ['body'])) {
                    $field->type = "textarea";
                } else {
                    $field->type = 'text';
                } */

                switch ($item) {
                    case 'image':
                        $field->value = $content->getFirstMediaUrl($content->contentable->template);
                        break;

                    default:
                        $field->value = $content->$item;
                        break;
                }

                switch ($item) {
                    case 'body':
                        $field->type = "textarea";
                        break;

                    case 'image':
                        $field->type = "image";
                        break;
                    
                    default:
                        $field->type = 'text';
                        break;
                }

                array_push($fields, $field);
            }
            
            $form->fields = $fields;

            return $form;
        });

        return $forms;
    }

    /**
     * The structure will be followed when creating a new form.
     * @return void
     */
    public function getDraggableFormFormatAttribute()
    {
        return [
            collect([
                'name' => 'title',
                'value' => '',
                'type' => 'text'
            ]),
            collect([
                'name' => 'body',
                'value' => '',
                'type' => 'textarea'
            ]),
            collect([
                'name' => 'image',
                'value' => '',
                'type' => 'image'
            ])
        ];
    }

    public function registerMediaCollections()
    {

        $this->addMediaConversion('thumbnail')
            ->optimize()
            ->format(Manipulations::FORMAT_JPG)
            ->fit(Manipulations::FIT_CROP, 175, 175);

        $this->addMediaCollection('masterplan')->singleFile()->registerMediaConversions(function (Media $media) {
            $this->addMediaConversion('regular')
                ->optimize()
                ->keepOriginalImageFormat()
                ->fit(Manipulations::FIT_CONTAIN, 1200, 878);
        });

        $this->addMediaCollection('location')->singleFile()->registerMediaConversions(function (Media $media) {
            $this->addMediaConversion('regular')
                ->optimize()
                ->keepOriginalImageFormat()
                ->fit(Manipulations::FIT_CONTAIN, 1213, 560);
        });

        $this->addMediaCollection('joint-venture')->singleFile()->registerMediaConversions(function (Media $media) {
            $this->addMediaConversion('regular')
                ->optimize()
                ->keepOriginalImageFormat()
                ->fit(Manipulations::FIT_CONTAIN, 794, 699);
        });
        $this->addMediaCollection('new-clark-city')->singleFile()->registerMediaConversions(function (Media $media) {
            $this->addMediaConversion('regular')
                ->optimize()
                ->keepOriginalImageFormat()
                ->fit(Manipulations::FIT_CONTAIN, 1110, 435);
        });
        $this->addMediaCollection('about-new-clark-city')->singleFile()->registerMediaConversions(function (Media $media) {
            $this->addMediaConversion('regular')
                ->optimize()
                ->keepOriginalImageFormat()
                ->fit(Manipulations::FIT_CONTAIN, 657, 800);
        });


        $this->addMediaCollection('default')->singleFile();
        $this->addMediaCollection('main-block')->singleFile();

        $this->addMediaCollection('gallery')->singleFile();
        $this->addMediaCollection('industries')->singleFile();
        $this->addMediaCollection('four-pillars')->singleFile();
    }
}
