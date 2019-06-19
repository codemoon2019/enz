<?php

namespace App\Models\Subscription\Traits;

/**
 * Trait SubscriptionAttributes
 * @package App\Models\Subscription\Traits
 */
trait SubscriptionAttributes
{

    public function getActionButtonsAttribute()
    {

        $action = '<a href="'.route('admin.subscriptions.show', $this->slug).'"><i class="fa fa-search btn btn-primary btn-sm"></i></a>';

        if ($this->resume != null) {

            $action .= '<a target="_blank" href="'.route('admin.subscriptions.download', $this->slug).'"><i class="fa fa-download btn btn-primary btn-sm"></i></a>';

        }

        return $action;

    }

}
