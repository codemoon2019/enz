<?php

namespace App\Http\Controllers\Backend\Subscription;

use DataTables;
use App\Repositories\Subscription\SubscriptionRepository;
use HalcyonLaravel\Base\Controllers\BaseController;
use HalcyonLaravel\Base\Repository\BaseRepository;
use Illuminate\Http\Request;

/**
 * Class SubscriptionTableController
 *
 * @package App\Http\Controllers\Backend\Subscription
 */
class SubscriptionTableController extends BaseController
{
    /**
     * @var \App\Repositories\Subscription\SubscriptionRepository
     */
    protected $subscriptionRepository;

    /**
     * SubscriptionTableController constructor.
     *
     * @param \App\Repositories\Subscription\SubscriptionRepository $subscriptionRepository
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __construct(SubscriptionRepository $subscriptionRepository)
    {
        $this->subscriptionRepository = $subscriptionRepository;
        $model = $subscriptionRepository->makeModel();

        $this->middleware('permission:' . $model::permission('index'), ['only' => ['__invoke']]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return mixed
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __invoke(Request $request)
    {
        return DataTables::of($this->repository()->table())
            ->editColumn('updated_at', function ($model) {
                return $model->updated_at->timezone(get_user_timezone())->format(config('core.setting.formats.datetime_12'));
            })
            // ->addColumn('actions', function ($model) {
            //     return $model->actions('backend', ['show', 'edit', 'destroy']);
            // })
            ->make(true);
    }

    /**
     * @return BaseRepository
     */
    public function repository(): BaseRepository
    {
        return $this->subscriptionRepository;
    }
}
