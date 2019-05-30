<?php

namespace App\Repositories\Subscription;

use App\Models\Subscription\Subscription;
use HalcyonLaravel\Base\Repository\BaseRepository;

/**
 * Class SubscriptionRepositoryEloquent
 *
 * @package App\Repositories\Subscription
 */
class SubscriptionRepositoryEloquent extends BaseRepository implements SubscriptionRepository
{
    /**
     * SubscriptionRepository constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->setObserver(new SubscriptionObserver);
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Subscription::class;
    }
}
