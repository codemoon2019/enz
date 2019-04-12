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
//        if ($domainRepository->getInstanceByBaseUrl()->machine_name == 'main') {
//            return $this->main($domainRepository);
//        }

        return view('frontend.index');
    }

//    private function main(DomainRepository $domainRepository)
//    {
//        $portfolios = [];
//
//        return view('frontend.index')->with([
//            'portfolios' => $portfolios,
//        ]);
//    }
}
