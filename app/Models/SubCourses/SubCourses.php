<?php

namespace App\Models\SubCourses;

use App\Models\SubCourses\Traits\SubCoursesAttributes;
use App\Models\SubCourses\Traits\SubCoursesRegularFunctions;
use App\Models\SubCourses\Traits\SubCoursesRelations;
use App\Models\SubCourses\Traits\SubCoursesScopes;
use App\Models\SubCourses\Traits\SubCoursesStaticFunctions;
use HalcyonLaravel\Base\Models\Model;
use HalcyonLaravel\Base\Models\Traits\ModelDefaultTraits;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Fomvasss\LaravelMetaTags\Traits\Metatagable;

/**
 * Class SubCourses
 * @package App\Models\SubCourses
 */
class SubCourses extends Model
{
    use Metatagable;
    use HasSlug;
    use ModelDefaultTraits;
    use SubCoursesAttributes;
    use SubCoursesRegularFunctions;
    use SubCoursesRelations;
    use SubCoursesScopes;
    use SubCoursesStaticFunctions;

    public const MODULE_NAME = 'sub courses';
    public const VIEW_BACKEND_PATH = 'backend.subCourses';
    public const VIEW_FRONTEND_PATH = 'frontend.subCourses';
    public const ROUTE_ADMIN_PATH = 'admin.sub-courses';
    public const ROUTE_FRONTEND_PATH = 'frontend.sub-courses';

    /**
     * Declared Fillables
     */
    protected $fillable = [
        'course_id',
        'title',
        'description',
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
                    'label' => 'Sub Courses',
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
