<?php

namespace App\Http\Controllers\Backend\Core\Block;

use App\Repositories\Core\Block\BlockRepository;
use HalcyonLaravel\Base\BaseableOptions;
use HalcyonLaravel\Base\Controllers\Backend\CRUDController;
use HalcyonLaravel\Base\Repository\BaseRepository;
use Illuminate\Database\Eloquent\Model as IlluminateModel;
use Illuminate\Http\Request;
use App\Models\Content\Content;

/**
 * Class BlocksController.
 */
class BlocksController extends CRUDController
{
    protected $blockRepository;

    /**
     * BlocksController constructor.
     *
     * @param BlockRepository $blockRepository
     */
    public function __construct(BlockRepository $blockRepository)
    {
        $this->blockRepository = $blockRepository;
        parent::__construct();
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
        $data['status'] = 'enable' /* array_keys((resolve($this->blockRepository->model()))->statuses())[$request->status ? 0 : 1] */;
        return $data;
    }


    /**
     * Validate input on store/update
     *
     * @param Request              $request
     * @param IlluminateModel|null $model
     *
     * @return BaseableOptions
     */
    public function crudRules(Request $request, IlluminateModel $model = null): BaseableOptions
    {
        return BaseableOptions::create()
            ->storeRules([
                'title' => 'required|max:100',
                // 'content' => 'required',
                // 'template' => 'sometimes|required',
            ])
            ->updateRules([
                'title' => 'required|max:100',
                // 'content' => 'required',
                // 'template' => 'sometimes|required',
            ]);
    }

    /**
     * @return BaseRepository
     */
    public function repository(): BaseRepository
    {
        return $this->blockRepository;
    }


    public function destroy(Request $request, $slug)
    {
        $exist = Content::whereTemplate($slug)->count();

        if (! $exist) {
            $model = $this->getModel($slug);
            $this->repository()->delete($model->id);
            $redirect = route($this->routePath . '.' . (method_exists($this->repository()->model(),
                    'bootSoftDeletes') ? 'deleted' : 'index'));

            return $this->response('destroy', $request->ajax(), $model, $redirect);
        }

        return response()->json(['message' => 'Block cannot be deleted'], 401);

    }

}
