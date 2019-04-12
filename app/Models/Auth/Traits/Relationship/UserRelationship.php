<?php

namespace App\Models\Auth\Traits\Relationship;

use App\Models\Auth\SocialAccount;
use App\Models\Ecommerce\BillingAddress\BillingAddress;
use App\Models\System\Session;

/**
 * Class UserRelationship.
 */
trait UserRelationship
{
    /**
     * @return mixed
     */
    public function providers()
    {
        return $this->hasMany(SocialAccount::class);
    }

    /**
     * @return mixed
     */
    public function sessions()
    {
        return $this->hasMany(Session::class);
    }


    public function billingAddresses()
    {
        return $this->morphMany(BillingAddress::class, 'userable');
    }
}
