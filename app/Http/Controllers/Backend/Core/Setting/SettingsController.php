<?php

namespace App\Http\Controllers\Backend\Core\Setting;

use App\Helpers\General\QueryCacheModelRepositoryHelper;
use App\Http\Controllers\Controller;
use App\Repositories\Core\Domain\DomainRepository;
use App\Repositories\Core\Setting\SettingRepository;
use HalcyonLaravel\Base\Controllers\Backend\Traits\CRUDTrait;
use Illuminate\Http\Request;
use Prettus\Repository\Helpers\CacheKeys;

/**
 * Class SettingsController
 *
 * @package App\Http\Controllers\Backend\Core\Setting
 */
class SettingsController extends Controller
{
    use CRUDTrait;

    private const ROUTE_PATH = 'admin.setting.';
    private const VIEW_PATH = 'backend.core.setting.';

    protected $settingRepository;
    protected $domainRepository;

    protected $routePath;

    /**
     * SettingsController constructor.
     *
     * @param \App\Repositories\Core\Setting\SettingRepository $settingRepository
     * @param \App\Repositories\Core\Domain\DomainRepository   $domainRepository
     */
    public function __construct(SettingRepository $settingRepository, DomainRepository $domainRepository)
    {
        $this->middleware('permission:setting', ['only' => ['index', 'show', 'update']]);
        $this->settingRepository = $settingRepository;
        $this->domainRepository = $domainRepository;

        $this->routePath = 'admin.settings';
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index()
    {
        return view('backend.core.setting.index')->with([
            'currentDomain' => $this->domainRepository->getInstanceByBaseUrl(app('request')->get('domain-name')),
        ]);
    }

    /**
     * @param $groupKey
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function show($groupKey)
    {
        $settings = app('query.cache')->queryCache(function () use ($groupKey) {
            return $this->domainRepository
                ->getInstanceByBaseUrl(app('request')->get('domain-name'))
                ->settings()
                ->where([
                    'group' => $groupKey,
                ])->get();
        }, [
            $groupKey,
            app('request')->get('domain-name'),
        ]);

        return view(self::VIEW_PATH . 'show')->with([
            'settings' => $settings,
            'group' => collect(config('core.setting.management'))->where('group_name', $groupKey)->first(),
            'currentDomain' => $this->domainRepository->getInstanceByBaseUrl(app('request')->get('domain-name')),
        ]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function cacheFlush(Request $request)
    {
        app('cache')->flush();
        app('cache')
            ->store(config('permission.cache.store') != 'default' ? config('permission.cache.store') : null)
            ->forget(config('permission.cache.key'));

        @unlink(CacheKeys::getFileKeys());
        @unlink(QueryCacheModelRepositoryHelper::getFilePath());

        return redirect()->back()->withFlashSuccess('Cached Cleared');

        // return $this->response($request->ajax(), route(self::ROUTE_PATH . 'index'), "Domain cache flushed.");
    }

    /**
     * @param bool        $isAjax
     * @param String|null $redirect
     * @param String|null $message
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function response(bool $isAjax, String $redirect = null, String $message = null)
    {
        return $isAjax ? response()->json([
            'message' => $message,
            'link' => $redirect
        ]) : redirect($redirect)->withFlashSuccess($message);
    }


    public function update(Request $request, $groupKey)
    {
        $this->settingRepository->updateMultiple($request->except(['_method', '_token', 'Submit']));
        return $this->response(
            $request->ajax(),
            $this->_redirectAfterAction($request->_submission, $groupKey),
            "You updated the settings for " . $groupKey
        );
    }
}
