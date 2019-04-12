<?php
/**
 * Created by PhpStorm.
 * User: Lloric Mayuga Garcia <lloricode@gmail.com>
 * Date: 12/5/18
 * Time: 10:27 AM
 */

namespace App\Http\Middleware\Core;

use App\Criterion\Eloquent\ThisEqualThatCriteria;
use App\Criterion\Eloquent\ThisHasCurrentDomainCriteria;
use App\Repositories\Core\Page\PageRepository;
use Closure;

class PageStatusMiddleware
{
    protected $pageRepository;

    public function __construct()
    {
        $this->pageRepository = resolve(PageRepository::class);
    }

    /**
     * Handle an incoming request.
     *
     * @param          $request
     * @param \Closure $next
     * @param string   $modelName
     *
     * @return mixed
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function handle($request, Closure $next, string $modelName)
    {
        $this->pageRepository->pushCriteria(new ThisEqualThatCriteria('pageable_type', $modelName));
        $this->pageRepository->pushCriteria(new ThisHasCurrentDomainCriteria);
        $page = $this->pageRepository->all()->first();

        if (empty($page)) {
            abort(404);
        }
        return $next($request);
    }
}