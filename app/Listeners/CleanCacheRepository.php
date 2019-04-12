<?php
/**
 * Created by PhpStorm.
 * User: Lloric Mayuga Garcia <lloricode@gmail.com>
 * Date: 1/4/19
 * Time: 10:29 AM
 */

namespace App\Listeners;

use Prettus\Repository\Events\RepositoryEventBase;

class CleanCacheRepository
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param \Prettus\Repository\Events\RepositoryEventBase $event
     *
     * @throws \Exception
     */
    public function handle(RepositoryEventBase $event)
    {
        app('query.cache')->flush();
    }
}