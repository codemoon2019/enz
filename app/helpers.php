<?php

use App\Helpers\General\HtmlHelper;
use App\Models\Core\Page\Page;
use App\Models\Core\Slide\Slide;
use App\Models\Core\Block\Block;
use App\Models\Core\Menu\Menu;
use App\Models\MoreLife\MoreLife;
use App\Models\Course\Course;
use App\Models\Why\Why;
use App\Models\Service\Service;
use App\Models\Testimonial\Testimonial;
use App\Models\Core\Setting;
use App\Models\OurTeam\OurTeam;
use App\Models\Event\Event;
use App\Models\News\News;
use App\Models\StudentVisa\StudentVisa;
use App\Models\Country\Country;
use App\Models\Details\Details;
use App\Models\CoreValue\CoreValue;
use App\Models\Career\Career;
use App\Models\Institution\Institution;
use App\Models\AreaOfStudy\AreaOfStudy;
use App\Models\Location\Location;

/*
 * Application version name
 */
if (!function_exists('core_version')) {
    /**
     * Helper to grab the application version name.
     *
     * @return string|null
     */
    function core_version()
    {
        if (app()->environment() != 'production') {
            return 'Core Boilerplate: <b>' . Config::get('app.core_version') . '</b> environment: <b>' . app()->environment() . '</b>' .
                '</b> git branch: <b>' . git_current_branch_name() . '</b>';
        }
        return null;
    }
}


/*
 * Global helpers file with misc functions.
 */
if (!function_exists('app_name')) {
    /**
     * @return \App\Helpers\General\Core\Setting|\Illuminate\Config\Repository|\Illuminate\Foundation\Application|mixed|null
     * @throws \Exception
     */
    function app_name()
    {
        return setting('site-title') ?? config('app.name');
    }
}

/*
 * Global helpers file with misc functions.
 */
if (!function_exists('app_logo')) {
    /**
     * @param string $conversionName
     *
     * @return string
     * @throws \Exception
     */
    function app_logo(string $conversionName)
    {
        $setting = setting('site-logo');
        $image = $setting->getFirstMediaUrl($setting->collection_name, $conversionName);

        return asset($image ?? '/img/logo.png');
    }
}

if (!function_exists('gravatar')) {
    /**
     * Access the gravatar helper.
     *
     * @return \Creativeorange\Gravatar\Gravatar|\Illuminate\Foundation\Application|mixed
     */
    function gravatar()
    {
        return app('gravatar');
    }
}

if (!function_exists('include_files')) {

    /**
     * Loops through a folder and requires all PHP files
     * Searches sub-directories as well.
     *
     * @param        $folder
     * @param bool   $isRequired
     * @param string $extension
     *
     * @return array
     */
    function include_files($folder, $isRequired = true, string $extension = 'php')
    {
        $return = [];
        try {
            $rdi = new recursiveDirectoryIterator($folder);
            $it = new recursiveIteratorIterator($rdi);

            while ($it->valid()) {
                if (!$it->isDot() && $it->isFile() && $it->isReadable() && $it->current()->getExtension() === $extension) {
                    if ($isRequired) {
                        require $it->key();
                    }
                    $return[] = $it->key();
                }

                $it->next();
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
        return array_unique($return);
    }
}

if (!function_exists('home_route')) {

    /**
     * Return the route to the "home" page depending on authentication/authorization status.
     *
     * @return string
     */
    function home_route()
    {
        if (auth()->check()) {
            if (auth()->user()->can(config('access.users.default_permissions.back_end_view_permission'))) {
                return 'admin.dashboard';
            } else {
                return 'frontend.user.dashboard';
            }
        }

        return 'frontend.index';
    }
}

if (!function_exists('style')) {

    /**
     * @param       $url
     * @param array $attributes
     * @param null  $secure
     *
     * @return mixed
     */
    function style($url, $attributes = [], $secure = null)
    {
        return resolve(HtmlHelper::class)->style($url, $attributes, $secure);
    }
}

if (!function_exists('script')) {

    /**
     * @param       $url
     * @param array $attributes
     * @param null  $secure
     *
     * @return \Illuminate\Support\HtmlString
     */
    function script($url, $attributes = [], $secure = null)
    {
        return resolve(HtmlHelper::class)->script($url, $attributes, $secure);
    }
}

if (!function_exists('form_cancel')) {

    /**
     * @param        $cancel_to
     * @param        $title
     * @param string $classes
     *
     * @return \Illuminate\Support\HtmlString
     */
    function form_cancel($cancel_to, $title, $classes = 'btn btn-danger btn-sm')
    {
        return resolve(HtmlHelper::class)->formCancel($cancel_to, $title, $classes);
    }
}

if (!function_exists('form_submit')) {

    /**
     * @param        $title
     * @param string $classes
     *
     * @return \Illuminate\Support\HtmlString
     */
    function form_submit($title, $classes = 'btn btn-success btn-sm pull-right')
    {
        return resolve(HtmlHelper::class)->formSubmit($title, $classes);
    }
}

if (!function_exists('get_user_timezone')) {

    /**
     * @return string
     */
    function get_user_timezone()
    {
        if (auth()->check()) {
            return auth()->user()->timezone;
        }

        return config('app.timezone');
    }
}

if (!function_exists('active_class_pattern')) {
    /**
     * Get the active class if the condition is not falsy
     *
     * @param        $routeName
     * @param string $activeClass
     * @param string $inactiveClass
     *
     * @return string
     */
    function active_class_pattern($routeName, $activeClass = 'active', $inactiveClass = '')
    {
        return app('active')->getClassIf(\Active::checkRoute($routeName), $activeClass, $inactiveClass);
    }
}


if (!function_exists('array_key_value_exists')) {
    /**
     * Check if key exist in array and is not null
     *
     * @param string $needle
     * @param array  $haystack
     *
     * @return mixed|null
     */
    function array_key_value_exists(string $needle, array $haystack)
    {
        return array_key_exists($needle, $haystack) && $haystack[$needle] ? $haystack[$needle] : null;
    }
}


if (!function_exists('route_path_is_active')) {
    /**
     * Check if key exist in array and is not null
     *
     * @param string $url
     *
     * @return bool
     */
    function route_path_is_active(string $url)
    {
        return Illuminate\Support\Str::is($url, request()->url());
    }
}

if (!function_exists('setting')) {
    /**
     * @param null $key
     *
     * @return \App\Helpers\General\Core\Setting|\Illuminate\Foundation\Application|mixed|null
     * @throws \Exception
     */
    function setting($key = null)
    {
        if (!is_null($key)) {
            return app('setting')->get($key);
        }
        return app('setting');
    }
}


if (!function_exists('getSetting')) {
    function getSetting($key)
    {
        return Setting::whereGroup($key)->get();
    }
}

if (!function_exists('findDetails')) {
    function findDetails($key)
    {
        return Details::whereSlug($key)->first();
    }
}

if (!function_exists('ourCompanyDetails')) {
    function ourCompanyDetails()
    {
        return Details::whereIn('slug', ['our-company', 'registration', 'professional-membership'])->get();
    }
}

if (!function_exists('history')) {
    /**
     * @return History|\Illuminate\Foundation\Application|mixed|history
     */
    function history()
    {
        return app('history');
    }
}


if (!function_exists('closetags')) {

    /**
     * @param $html
     *
     * @return string
     */
    function closetags($html)
    {
        preg_match_all('#<([a-z]+)(?: .*)?(?<![/|/ ])>#iU', $html, $result);
        $openedtags = $result[1];
        preg_match_all('#</([a-z]+)>#iU', $html, $result);
        $closedtags = $result[1];
        $len_opened = count($openedtags);
        if (count($closedtags) == $len_opened) {
            return $html;
        }
        $openedtags = array_reverse($openedtags);
        for ($i = 0; $i < $len_opened; $i++) {
            if (!in_array($openedtags[$i], $closedtags)) {
                $html .= '</' . $openedtags[$i] . '>';
            } else {
                unset($closedtags[array_search($openedtags[$i], $closedtags)]);
            }
        }
        return $html;
    }
}


if (!function_exists('markdown')) {
    /**
     * Renders a markdown template (with Blade)
     *
     * @param  string $view
     * @param  array  $data
     *
     * @return string
     */
    function markdown($view, $data = [])
    {
        $markdown = app()->make(Illuminate\Mail\Markdown::class);
        return $markdown->render($view, $data);
    }
}

//

if (!function_exists('is_has_any_permission')) {
    /**
     * Renders a markdown template (with Blade)
     *
     * @param array $permissions
     *
     * @return bool
     */
    function is_has_any_permission(array $permissions)
    {
        foreach ($permissions as $permission) {
            if (auth()->user()->can($permission)) {
                return true;
            }
        }
        return false;
    }
}

if (!function_exists('add_scheme_host')) {
    /**
     * @param string $host
     *
     * @return string
     */
    function add_scheme_host(string $host)
    {
        $scheme = parse_url(app('url')->to('/'))['scheme'];
        return "{$scheme}://{$host}";
    }
}

if (!function_exists('git_current_branch_name')) {
    /**
     * @return string
     */
    function git_current_branch_name(): string
    {
        if (!file_exists(base_path('.git'))) {
            return '';
        }

        $stringFromFile = file(base_path('.git/HEAD'), FILE_USE_INCLUDE_PATH);

        $firstLine = $stringFromFile[0]; // get the string from the array

        $explodedString = explode("/", $firstLine, 3); // separate out by the "/" in the string

        return $explodedString[2]; // get the one that is always the branch name
    }
}

if (!function_exists('template_blades')) {
    /**
     * @param string $type
     *
     * @return array
     */
    function template_blades(string $type): array
    {
        switch ($type) {
            case 'block':
                $path = 'views/frontend/core/block/templates/';
                break;
            case 'page':
                $path = 'views/frontend/core/page/';
                break;
            case 'menu':
                $path = 'views/frontend/core/menu/templates/';
                break;
        }
        $files = include_files(resource_path($path), false);

        $templates = [];
        foreach ($files as $file) {
            $tmp = explode('/', $file);
            $tmp = $tmp[count($tmp) - 1];
            $tmp = str_replace('.blade.php', '', $tmp);
            $templates[$tmp] = $tmp;
        }
        return $templates;
    }
}

if (!function_exists('is_latest_mysql_version')) {
    function is_latest_mysql_version(): bool
    {
        return DB::connection()->getPdo()->getAttribute(PDO::ATTR_DRIVER_NAME) === 'mysql'
            && version_compare(DB::connection()->getPdo()->getAttribute(PDO::ATTR_SERVER_VERSION), '5.7.8', 'ge');
    }
}


if (!function_exists('home_category')) {
    function home_category($slug)
    {
        return Page::whereSlug($slug)->first();
    }
}

if (!function_exists('home_slider')) {
    function slider($slug)
    {
        return Slide::whereSlug($slug)->first();
    }
}

if (!function_exists('home_cms')) {
    function home_cms($slug)
    {
        return Page::whereSlug($slug)->first();
    }
}

if (!function_exists('Block')) {
    function Block()
    {
        return Block::all();
    }
}


if (!function_exists('MoreLife')) {
    function MoreLife()
    {
        return MoreLife::orderBy('order')->get();
    }
}


if (!function_exists('Service')) {
    function Service()
    {
        return Service::orderBy('order')->get();
    }
}


if (!function_exists('Course')) {
    function Course()
    {
        return Course::orderBy('order')->get();
    }
}

if (!function_exists('findCourse')) {
    function findCourse($slug)
    {
        return Course::whereSlug($slug)->first();
    }
}

if (!function_exists('Whies')) {
    function Whies()
    {
        return Why::orderBy('order')->get();
    }
}

if (!function_exists('OurTeam')) {
    function OurTeam()
    {
        return OurTeam::orderBy('order')->get();
    }
}

if (!function_exists('Events')) {
    function Events()
    {
        return Event::orderBy('id','desc')->get();
    }
}

if (!function_exists('homeEvents')) {
    function homeEvents()
    {
        return Event::orderBy('id', 'desc')->limit(3)->get();
    }
}

if (!function_exists('News')) {
    function News()
    {
        return News::orderBy('published_at','desc')->get();
    }
}

if (!function_exists('homeNews')) {
    function homeNews()
    {
        return News::orderBy('published_at','desc')->limit(4)->get();
    }
}

if (!function_exists('Testimonial')) {
    function Testimonial()
    {
        return Testimonial::orderBy('order')->get();
    }
}

if (!function_exists('findInformation')) {
    function findInformation($key)
    {
        return Setting::where('machine_name', $key)->first();
    }
}

if (!function_exists('getInformation')) {
    function getInformation($keys)
    {
        return Setting::whereIn('machine_name', $keys)->get();
    }
}

if (!function_exists('StudentVisa')) {
    function StudentVisa()
    {
        return StudentVisa::orderBy('order')->get();
    }
}

if (!function_exists('Country')) {
    function Country()
    {
        return Country::all();
    }
}

if (!function_exists('findCountry')) {
    function findCountry($slug)
    {
        return Country::whereSlug($slug)->first();
    }
}

if (!function_exists('getModelList')) {
    function getModelList($model_name)
    {

        switch ($model_name) {

            case 'more_life': return MoreLife(); break;
            
        }

    }
}

if (!function_exists('missionVision')) {

    function missionVision()
    {
        return Details::whereIn('slug', ['vision', 'mission'])->get();

    }

}

if (!function_exists('footerDetails')) {

    function footerDetails()
    {
        return Details::whereIn('slug', ['location', 'contact'])->orderBy('id')->get();

    }

}

if (!function_exists('menu')) {
    function menu($slug)
    {

        return Menu::whereSlug($slug)->first();

    }
}

function customRequestCaptcha(){
    return new \ReCaptcha\RequestMethod\Post();
}

if (!function_exists('CoreValue')) {
    function CoreValue()
    {
        return CoreValue::orderBy('order')->get();
    }
}

if (!function_exists('Career')) {
    function Career()
    {
        return Career::orderBy('order')->get();
    }
}

if (!function_exists('Institution')) {
    function Institution()
    {
        return Institution::orderBy('order')->get();
    }
}


if (!function_exists('findInstitution')) {
    function findInstitution($slug)
    {
        return Institution::whereSlug($slug)->first();
    }
}


if (!function_exists('AreaOfStudy')) {
    function AreaOfStudy()
    {
        return AreaOfStudy::orderBy('order')->get();
    }
}

if (!function_exists('HomeAreaOfStudy')) {
    function HomeAreaOfStudy()
    {
        return AreaOfStudy::orderBy('order')->limit(6)->get();
    }
}

if (!function_exists('Location')) {
    function Location()
    {
        return Location::orderBy('order')->get();
    }
}
