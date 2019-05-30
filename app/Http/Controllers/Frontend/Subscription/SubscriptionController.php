<?php

namespace App\Http\Controllers\Frontend\Subscription;

use App\Repositories\Core\Page\PageRepository;
use App\Repositories\Subscription\SubscriptionRepository;
use HalcyonLaravel\Base\Controllers\BaseController as Controller;
use HalcyonLaravel\Base\Repository\BaseRepository;
use MetaTag;
use Illuminate\Http\Request;
use App\Models\Subscription\Subscription;

/**
 * Class SubscriptionController
 *
 * @package App\Http\Controllers\Frontend\Subscription
 */
class SubscriptionController extends Controller
{
    /**
     * @var \App\Repositories\Subscription\SubscriptionRepository
     */
    private $subscriptionsRepository;

    private $pageRepository;
    private $viewFrontendPath;

    /**
     * SubscriptionController constructor.
     *
     * @param \App\Repositories\Subscription\SubscriptionRepository $subscriptionsRepository
     * @param \App\Repositories\Core\Page\PageRepository                  $pageRepository
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __construct(SubscriptionRepository $subscriptionsRepository, PageRepository $pageRepository)
    {
        $model = $subscriptionsRepository->makeModel();
        $this->middleware('page_status:' . get_class($model));

        $this->subscriptionsRepository = $subscriptionsRepository;
        $this->pageRepository = $pageRepository;
        $this->viewFrontendPath = $model::VIEW_FRONTEND_PATH;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index()
    {
        $model = $this->repository()->makeModel();
        $page = $this->pageRepository->indexPage($this->repository()->model());
        $Model = $model;

        MetaTag::setEntity($page);

        $models = $this->repository()->paginate(12);

        return view("{$this->viewFrontendPath}.index", compact('page', 'models', 'Model'));
    }

    /**
     * @return \HalcyonLaravel\Base\Repository\BaseRepository
     */
    public function repository(): BaseRepository
    {
        return $this->subscriptionsRepository;
    }

    /**
     * @param string $routeKeyName
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function show(string $routeKeyName)
    {
        $page = $model = $this->getModel($routeKeyName, false);

        MetaTag::setEntity($model);

        return view("{$this->viewFrontendPath}.show", compact('model', 'page'));
    }

    public function inquiry(Request $request)
    {

        if (! Subscription::whereEmail($request['email'])->count()) {
            
            $model = Subscription::create([

                'email'     => $request['email'],
                
            ]);

        }

        return redirect()->back()->withFlashSuccess('Subscribed Successfully');

    }
}
