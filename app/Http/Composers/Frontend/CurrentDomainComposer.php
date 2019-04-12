<?php
/**
 * Created by PhpStorm.
 * User: Lloric Mayuga Garcia <lloricode@gmail.com>
 * Date: 1/3/19
 * Time: 1:21 PM
 */

namespace App\Http\Composers\Frontend;

use App\Repositories\Core\Domain\DomainRepository;
use Illuminate\View\View;

class CurrentDomainComposer
{
    /**
     * @param \Illuminate\View\View $view
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function compose(View $view)
    {
        $view->with('current_domain', app(DomainRepository::class)->getInstanceByBaseUrl());
    }
}