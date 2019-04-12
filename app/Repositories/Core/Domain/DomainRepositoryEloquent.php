<?php
/**
 * Created by PhpStorm.
 * User: Lloric Mayuga Garcia <lloricode@gmail.com>
 * Date: 12/19/18
 * Time: 1:35 PM
 */

namespace App\Repositories\Core\Domain;

use App\Criterion\Eloquent\ThisEqualThatCriteria;
use App\Models\Core\Domain\Domain;
use HalcyonLaravel\Base\Repository\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DomainRepositoryEloquent
 *
 * @package App\Repositories\Core\Domain
 */
class DomainRepositoryEloquent extends BaseRepository implements DomainRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Domain::class;
    }

    /**
     * @param string $column
     * @param string $key
     *
     * @return array|\Illuminate\Support\Collection
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function pluckForSubSites($column = 'title', $key = 'machine_name')
    {
//        $this->pushCriteria(new ThisEqualThatCriteria('machine_name', 'main', '!='));
        return $this->pluck($column, $key);
    }

    /**
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param bool                                $throw404ExceptionOnFalse
     * @param string|null                         $domainMachineName
     *
     * @return bool
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function hasCurrentBaseUrl(
        Model $model,
        bool $throw404ExceptionOnFalse = true,
        string $domainMachineName = null
    ): bool {

        if (is_null($domainMachineName)) {
            $currentDomain = $this->getInstanceByBaseUrl();
        } else {
            $currentDomain = $this->getInstanceByBaseUrl($domainMachineName);
        }

        $domains = app('query.cache')->queryCache(function () use ($model) {
            return $model->domains;
        }, [$model->id]);

        foreach ($domains as $domain) {
            if ($currentDomain->id == $domain->id) {
                return true;
            }
        }
        if ($throw404ExceptionOnFalse) {
            abort(404);
        }
        return false;
    }

    /**
     * @param string|null $machineName
     *
     * @return \App\Models\Core\Domain\Domain
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function getInstanceByBaseUrl(string $machineName = null): Domain
    {
        $currentBaseUrl = null;
        if (is_null($machineName)) {
            $currentBaseUrl = parse_url(app('url')->to('/'))['host'];
            $this->pushCriteria(new ThisEqualThatCriteria('domain', $currentBaseUrl));
        } else {
            $this->pushCriteria(new ThisEqualThatCriteria('machine_name', $machineName));
        }
        $domain = $this->all()->first();

        if (is_null($domain)) {
            $statusCode = 500;
            if (is_null($machineName)) {
                $msg = "Current base url [$currentBaseUrl]";
            } // check if error is from GET param domain-name
            elseif (!is_null($machineName) && app('request')->get('domain-name') == $machineName) {
                $statusCode = 404;
                $msg = "Machine name [$machineName]";
            } else {
                $msg = "Machine name [$machineName]";
            }
            abort($statusCode, "$msg  not found in model " . Domain::class . ' on file ' . __METHOD__);
        }
        return $domain;

    }
}