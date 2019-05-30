<?php

namespace App\Http\Controllers\Frontend\Event;

use App\Repositories\Core\Page\PageRepository;
use App\Repositories\Event\EventRepository;
use HalcyonLaravel\Base\Controllers\BaseController as Controller;
use HalcyonLaravel\Base\Repository\BaseRepository;
use MetaTag;
use Illuminate\Http\Request;
use App\Models\Event\EventInquiry;

/**
 * Class EventController
 *
 * @package App\Http\Controllers\Frontend\Event
 */
class EventController extends Controller
{
    /**
     * @var \App\Repositories\Event\EventRepository
     */
    private $eventsRepository;

    private $pageRepository;
    private $viewFrontendPath;

    /**
     * EventController constructor.
     *
     * @param \App\Repositories\Event\EventRepository $eventsRepository
     * @param \App\Repositories\Core\Page\PageRepository                  $pageRepository
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __construct(EventRepository $eventsRepository, PageRepository $pageRepository)
    {
        $model = $eventsRepository->makeModel();
        $this->middleware('page_status:' . get_class($model));

        $this->eventsRepository = $eventsRepository;
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
        return $this->eventsRepository;
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

        $model = EventInquiry::create([

            'first_name'     => $request['first_name'],
            
            'last_name'    => $request['last_name'],
            
            'contact_number' => $request['email_address'],
            
        ]);

        return redirect()->back()->withFlashSuccess('Inquiry Submitted');

    }
}
