<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Spatie\Sitemap\Sitemap;

use Spatie\Sitemap\Tags\Url;

use Spatie\Sitemap\SitemapGenerator;

use App\Models\Core\Page\Page;

use App\Models\News\News;

use App\Models\Event\Event;

use App\Models\AreaOfStudy\AreaOfStudy;

use App\Models\Course\Course;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:sitemap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a sitemap';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // if (env('APP_ENV', 'local') == 'production') {

            $sitemap = Sitemap::create(url('/'))
                ->add(Url::create(url('/'))
                    ->setLastModificationDate(now())
                    ->setPriority(1.0));

            $pages = [
                        'student-visa', 
                        'tourist-visa', 
                        'company', 
                        'our-teams', 
                        'australia',
                        'new-zealand',
                        'canada',
                        'become-our-client',
                        'be-part-of-our-team',
                        'testimonials',
                        'gallery',
                        'contact-us',
                        'read-more',
                        'linkages',
                        'awards',
                        'expertise',
                        'customer-service',
                        'payment-scheme',
                    ];

            foreach ($pages as $page) {
                $sitemap->add(Url::create(url($page))
                    ->setLastModificationDate(now())
                    ->setPriority(0.5));
            }

            foreach (News::all() as $key => $value) {
                $sitemap->add(Url::create(url('news/' . $value->slug))
                    ->setLastModificationDate(now())
                    ->setPriority(0.5));
            }

            foreach (Event::all() as $key => $value) {
                $sitemap->add(Url::create(url('events/' . $value->slug))
                    ->setLastModificationDate(now())
                    ->setPriority(0.5));
            }

            foreach (Course::all() as $key => $value) {
                $sitemap->add(Url::create(url('courses/' . $value->slug))
                    ->setLastModificationDate(now())
                    ->setPriority(0.5));
            }

            foreach (AreaOfStudy::all() as $key => $value) {
                $sitemap->add(Url::create(url('area-of-studies/' . $value->slug))
                    ->setLastModificationDate(now())
                    ->setPriority(0.5));
            }



            // Course::all()->each(function (Course $course) use ($sitemap) {
            //     $sitemap->add(Url::create(url('course') . '/' . $course->slug)
            //                 ->setLastModificationDate(now())
            //                 ->setPriority(0.5));
            // });

            // Category::all()->each(function (Category $category) use ($sitemap) {
            //     $sitemap->add(Url::create(url('course/category') . '/' . $category->slug)
            //                 ->setLastModificationDate(now())
            //                 ->setPriority(0.5));
            // });

            $sitemap->writeToFile(public_path('sitemap.xml'));

        // }
    }
}
