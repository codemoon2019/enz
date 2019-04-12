<?php

namespace App\Http\Controllers\Backend\Core\Page;

use App\Repositories\Core\Page\PageRepository;
use HalcyonLaravel\Base\BaseableOptions;
use HalcyonLaravel\Base\Controllers\Backend\CRUDController;
use HalcyonLaravel\Base\Repository\BaseRepository;
use Illuminate\Database\Eloquent\Model as IlluminateModel;
use Illuminate\Http\Request;

/**
 * Class PagesController
 *
 * @package App\Http\Controllers\Backend\Core\Page
 */
class PagesController extends CRUDController
{
    protected $pageRepository;

    /**
     * PagesController constructor.
     *
     * @param \App\Repositories\Core\Page\PageRepository $pageRepository
     */
    public function __construct(PageRepository $pageRepository)
    {
        $this->pageRepository = $pageRepository;
        parent::__construct();

        $model = app($this->repository()->model());
        $this->middleware('permission:' . $model::permission('index'), ['only' => 'index']);
//        $this->middleware('permission:' . $model::permission('show'), ['only' => 'show']);
//        $this->middleware('permission:' . $model::permission('create'), ['only' => ['create', 'store']]);
//        $this->middleware('permission:' . $model::permission('edit'), ['only' => ['edit', 'update']]);
//        $this->middleware('permission:' . $model::permission('destroy'), ['only' => 'destroy']);
    }

    public function repository(): BaseRepository
    {
        return $this->pageRepository;
    }

    /**
     * @param \Illuminate\Http\Request            $request
     * @param \Illuminate\Database\Eloquent\Model $model
     *
     * @return array
     */
    public function generateStub(Request $request, IlluminateModel $model = null): array
    {
        $data = $request->except(['_token', '_method', '_submission', 'status']);

        return $data;
    }

    /**
     * @param Request              $request
     * @param IlluminateModel|null $model
     *
     * @return BaseableOptions
     */
    public function crudRules(Request $request, IlluminateModel $model = null): BaseableOptions
    {
        return BaseableOptions::create()
            ->storeRules([
                'title' => 'required|unique:pages|max:100',
                'template' => 'sometimes|required',
                'images' => 'sometimes|required',
                'images.*' => 'mimes:png,jpg,jpeg',
                'menuable.name' => 'required_with:menuable.menu_id'
            ])
            ->storeRuleMessages([
                'menuable.name.required_with' => 'The menu name is required when menu is present.'
            ])
            ->updateRules([
                'title' => 'required|max:100|unique:pages,title,' . optional($model)->id,
                'template' => 'sometimes|required',
                'images' => 'sometimes|required',
                'images.*' => 'mimes:png,jpg,jpeg',
                'menuable.name' => 'required_with:menuable.menu_id'
            ])
            ->updateRuleMessages([
                'menuable.name.required_with' => 'The menu name is required when menu is present.'
            ]);
    }

    public function destroy(Request $request, $slug)
    {
        $model = $this->getModel($slug);

        $contents = $model->contents;

        if ($contents) {

            foreach ($contents as $key => $content) {

                $content->media()->delete();

                $content->delete();

            }

        }

        $this->repository()->delete($model->id);

        $redirect = route($this->routePath . '.' . (method_exists($this->repository()->model(), 'bootSoftDeletes') ? 'deleted' : 'index'));
       
        app('query.cache')->flush();

        return $this->response('destroy', $request->ajax(), $model, $redirect);
    
    }

}
