<?php

namespace App\Http\Composers\Backend;

use App\Repositories\Core\Domain\DomainRepository;
use Illuminate\View\View;

/**
 * Class DomainFieldComposer.
 */
class DomainFieldComposer
{
    /**
     * @var \App\Repositories\Core\Domain\DomainRepository
     */
    protected $domainRepository;

    /**
     * DomainFieldComposer constructor.
     *
     * @param \App\Repositories\Core\Domain\DomainRepository $domainRepository
     */
    public function __construct(DomainRepository $domainRepository)
    {
        $this->domainRepository = $domainRepository;
    }

    /**
     * @param \Illuminate\View\View $view
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function compose(View $view)
    {
        $view->with('domains', $this->domainRepository->pluckForSubSites());
    }
}
