<?php

namespace App\Http\Controllers\Frontend\Core\Page;

use App\Repositories\Core\Domain\DomainRepository;
use App\Repositories\Core\Page\PageRepository;
use HalcyonLaravel\Base\Controllers\BaseController;
use HalcyonLaravel\Base\Repository\BaseRepository;
use MetaTag;

/**
 * Class PagesController.
 */
class PagesController extends BaseController
{
    /**
     * @param \App\Repositories\Core\Domain\DomainRepository $domainRepository
     * @param                                              $routeKeyName
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function show(DomainRepository $domainRepository, $routeKeyName)
    {

        $page = $this->getModel($routeKeyName, false, [
            // 'status' => 'enable',
        ]);

        switch ($routeKeyName) {

            case 'area-of-study':
            
            case 'application':
            
            case 'country-details':
            
            case 'core-value':
            
            case 'event':
            
            case 'career':
            
            case 'course':
            
            case 'institution':
            
            case 'subscription':
            
            case 'country':
            
            case 'tourist-visa-inquiry':
            
            case 'become-our-client-inquiry':
            
            case 'testimonial':
            
            case 'sample-module':
            
            case 'award':
            
            case 'location':
            
            case 'why':
            
            case 'success-percentage':

                abort(404);

            break;
        
        }

        $domainRepository->hasCurrentBaseUrl($page);

        MetaTag::setEntity($page);

        if (!is_null($page->type)) {
            $path = $page->template;
        } else {
            $path = $this->repository()->makeModel()::VIEW_FRONTEND_PATH . '.' . $page->template;
        }

        return view($path)->with([
            'page' => $page,
        ]);
    }

    public function repository(): BaseRepository
    {
        return resolve(PageRepository::class);
    }

}
