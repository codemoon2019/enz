<?php

namespace App\Repositories\Event;

use App\Models\Event\Event;
use HalcyonLaravel\Base\Repository\BaseRepository;

/**
 * Class EventRepositoryEloquent
 *
 * @package App\Repositories\Event
 */
class EventRepositoryEloquent extends BaseRepository implements EventRepository
{
    /**
     * EventRepository constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->setObserver(new EventObserver);
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Event::class;
    }
}
