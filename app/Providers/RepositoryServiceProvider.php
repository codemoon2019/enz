<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(\App\Repositories\Core\Domain\DomainRepository::class,
            \App\Repositories\Core\Domain\DomainRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Core\Inquiry\InquiryRepository::class,
            \App\Repositories\Core\Inquiry\InquiryRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Core\Block\BlockRepository::class,
            \App\Repositories\Core\Block\BlockRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Core\Menu\MenuRepository::class,
            \App\Repositories\Core\Menu\MenuRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Core\Menu\MenuNodeRepository::class,
            \App\Repositories\Core\Menu\MenuNodeRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Core\Page\PageRepository::class,
            \App\Repositories\Core\Page\PageRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Core\Setting\SettingRepository::class,
            \App\Repositories\Core\Setting\SettingRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Core\Slide\SlideRepository::class,
            \App\Repositories\Core\Slide\SlideRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Auth\User\UserRepository::class,
            \App\Repositories\Auth\User\UserRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Auth\RoleRepository::class,
            \App\Repositories\Auth\RoleRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Auth\PermissionRepository::class,
            \App\Repositories\Auth\PermissionRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Article\ArticleRepository::class,
            \App\Repositories\Article\ArticleRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Category\CategoryRepository::class,
            \App\Repositories\Category\CategoryRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\FrequentlyAskedQuestion\FrequentlyAskedQuestionRepository::class,
            \App\Repositories\FrequentlyAskedQuestion\FrequentlyAskedQuestionRepositoryEloquent::class);

        $this->app->bind(\App\Repositories\MoreChoice\MoreChoiceRepository::class,
            \App\Repositories\MoreChoice\MoreChoiceRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\MoreSpaces\MoreSpacesRepository::class, \App\Repositories\MoreSpaces\MoreSpacesRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\MoreLife\MoreLifeRepository::class, \App\Repositories\MoreLife\MoreLifeRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\WhatsNew\WhatsNewRepository::class, \App\Repositories\WhatsNew\WhatsNewRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\SampleModule\SampleModuleRepository::class, \App\Repositories\SampleModule\SampleModuleRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\News\NewsRepository::class, \App\Repositories\News\NewsRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Property\PropertyRepository::class, \App\Repositories\Property\PropertyRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Villa\VillaRepository::class, \App\Repositories\Villa\VillaRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Investment\InvestmentRepository::class, \App\Repositories\Investment\InvestmentRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Amenities\AmenitiesRepository::class, \App\Repositories\Amenities\AmenitiesRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Location\LocationRepository::class, \App\Repositories\Location\LocationRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Exterior\ExteriorRepository::class, \App\Repositories\Exterior\ExteriorRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Interior\InteriorRepository::class, \App\Repositories\Interior\InteriorRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Course\CourseRepository::class, \App\Repositories\Course\CourseRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Event\EventRepository::class, \App\Repositories\Event\EventRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\News\NewsRepository::class, \App\Repositories\News\NewsRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Why\WhyRepository::class, \App\Repositories\Why\WhyRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Service\ServiceRepository::class, \App\Repositories\Service\ServiceRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\OurTeam\OurTeamRepository::class, \App\Repositories\OurTeam\OurTeamRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Testimonial\TestimonialRepository::class, \App\Repositories\Testimonial\TestimonialRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\SubCourses\SubCoursesRepository::class, \App\Repositories\SubCourses\SubCoursesRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Linkages\LinkagesRepository::class, \App\Repositories\Linkages\LinkagesRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Country\CountryRepository::class, \App\Repositories\Country\CountryRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CountryDetails\CountryDetailsRepository::class, \App\Repositories\CountryDetails\CountryDetailsRepositoryEloquent::class);
        //:end-bindings:
    }
}
