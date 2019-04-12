<?php

namespace App\Http\Controllers\Backend\Core\Sitemap;

use App\Http\Controllers\Controller;
use Htmldom;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;

/**
 * Class SitemapController.
 */
class SitemapController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:sitemap');
    }

    public function index()
    {
        $html = new Htmldom(public_path('sitemap.xml'));
        return view('backend.core.sitemap.index', compact('html'));
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function generate()
    {
        SitemapGenerator::create(url(''))
            ->hasCrawled(function (Url $url) {
                if ($url->segment(1) === 'admin') {
                    return;
                }
                if (!$url->segment(1)) {
                    $url->setPriority(1);
                }
                return $url;
            })
            ->writeToFile(public_path('sitemap.xml'));
        return redirect()->route('admin.sitemap.index');
    }
}
