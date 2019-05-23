<?php

namespace App\Models\BecomeOurClientInquiry\Traits;

/**
 * Trait BecomeOurClientInquiryAttributes
 * @package App\Models\BecomeOurClientInquiry\Traits
 */
trait BecomeOurClientInquiryAttributes
{

    public function getActionButtonsAttribute()
    {

        $action = '<a href="'.route('admin.become-our-client-inquiries.show', $this->slug).'"><i class="fa fa-search btn btn-primary btn-sm"></i></a>';

        if ($this->file != null) {

            $action .= '<a target="_blank" href="'.route('admin.become-our-client-inquiries.download', $this->slug).'"><i class="fa fa-download btn btn-primary btn-sm"></i></a>';

        }

        return $action;

    }
}
