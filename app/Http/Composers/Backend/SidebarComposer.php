<?php

namespace App\Http\Composers\Backend;

use App\Criterion\Eloquent\ThisEqualThatCriteria;
use App\Repositories\Auth\User\UserRepository;
use App\Repositories\Core\Domain\DomainRepository;
use Illuminate\View\View;

/**
 * Class SidebarComposer.
 */
class SidebarComposer
{
    /**
     * @var \App\Repositories\Auth\User\UserRepository
     */
    protected $userRepository;

    /**
     * @var \App\Repositories\Core\Domain\DomainRepository
     */
    protected $domainRepository;

    /**
     * SidebarComposer constructor.
     *
     * @param \App\Repositories\Auth\User\UserRepository     $userRepository
     * @param \App\Repositories\Core\Domain\DomainRepository $domainRepository
     */
    public function __construct(UserRepository $userRepository, DomainRepository $domainRepository)
    {
        $this->userRepository = $userRepository;
        $this->domainRepository = $domainRepository;
    }

    /**
     * @param \Illuminate\View\View $view
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function compose(View $view)
    {
        if (config('access.users.requires_approval')) {
            $view->with('pending_approval', $this->userRepository->getUnconfirmedCount());
        } else {
            $view->with('pending_approval', 0);
        }

        $this->domainRepository->pushCriteria(new ThisEqualThatCriteria('machine_name', 'main', '!='));
        $view->with('domains', $this->domainRepository->all());
    }
}
