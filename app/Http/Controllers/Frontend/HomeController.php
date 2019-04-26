<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\Core\Domain\DomainRepository;

/**
 * Class HomeController.
 */
class HomeController extends Controller
{
    /**
     * @param \App\Repositories\Core\Domain\DomainRepository $domainRepository
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(DomainRepository $domainRepository)
    {
    	$homeEvents = homeEvents();

        $whies = Whies()->chunk(3);

    	$course = Course();

    	$homeNews = homeNews();

        return view('frontend.index', compact('whies', 'homeEvents', 'course', 'homeNews'));
    }

}
