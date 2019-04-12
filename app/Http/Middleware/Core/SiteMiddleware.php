<?php
/**
 * Created by PhpStorm.
 * User: Lloric Mayuga Garcia <lloricode@gmail.com>
 * Date: 12/5/18
 * Time: 10:27 AM
 */

namespace App\Http\Middleware\Core;

use App\Repositories\Core\Domain\DomainRepository;
use Closure;
use Exception;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class SiteMiddleware
{
    protected $domainRepository;

    public function __construct()
    {
        $this->domainRepository = app(DomainRepository::class);
    }

    /**
     * Handle an incoming request.
     *
     * @param          $request
     * @param \Closure $next
     * @param string   $machineName
     *
     * @return mixed
     * @throws \Throwable
     */
    public function handle($request, Closure $next, string $machineName)
    {
        $site = $this->domainRepository
            ->skipCriteria()
            ->findWhere([
                'machine_name' => $machineName,
            ])->first();

        throw_if(
            is_null($site),
            Exception::class,
            "Domain machine name [$machineName] not found."
        );

        throw_if(
            $site->domain != parse_url(url('/'))['host'],
            NotFoundHttpException::class
        );

        return $next($request);
    }
}