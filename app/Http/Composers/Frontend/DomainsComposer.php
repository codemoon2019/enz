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

class DomainsComposer
{
    /**
     * @param \Illuminate\View\View $view
     */
    public function compose(View $view)
    {
        $view->with('domains', app(DomainRepository::class)->findWhere([['machine_name', '!=', 'main']]));
    }
}