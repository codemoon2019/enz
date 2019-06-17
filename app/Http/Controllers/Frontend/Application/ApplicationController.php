<?php

namespace App\Http\Controllers\Frontend\Application;

use App\Repositories\Core\Page\PageRepository;
use App\Repositories\Application\ApplicationRepository;
use HalcyonLaravel\Base\Controllers\BaseController as Controller;
use HalcyonLaravel\Base\Repository\BaseRepository;
use MetaTag;
use Illuminate\Http\Request;
use App\Models\Application\Application;
use Illuminate\Support\Facades\Storage;
use Uuid;

/**
 * Class ApplicationController
 *
 * @package App\Http\Controllers\Frontend\Application
 */
class ApplicationController extends Controller
{
    /**
     * @var \App\Repositories\Application\ApplicationRepository
     */
    private $applicationsRepository;

    private $pageRepository;
    private $viewFrontendPath;

    /**
     * ApplicationController constructor.
     *
     * @param \App\Repositories\Application\ApplicationRepository $applicationsRepository
     * @param \App\Repositories\Core\Page\PageRepository                  $pageRepository
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __construct(ApplicationRepository $applicationsRepository, PageRepository $pageRepository)
    {
        $model = $applicationsRepository->makeModel();
        $this->middleware('page_status:' . get_class($model));

        $this->applicationsRepository = $applicationsRepository;
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
        return $this->applicationsRepository;
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

        $data = $request->all();

        if ($request['resume'] != null) {

            $file = $request['resume'];

            $name = $file->getClientOriginalName();

            $encrypt_name = Uuid::generate(4)->string;

            $file->storeAs('public/application', $encrypt_name);

            $data['resume'] = json_encode([$name, $encrypt_name]);

        }

        $model = Application::create($data);

        // $model->otherDetails()->create($data);

        return redirect()->back()->withFlashSuccess('Submitted Successfully');

    }
}