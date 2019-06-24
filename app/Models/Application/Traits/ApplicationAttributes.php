<?php

namespace App\Models\Application\Traits;

/**
 * Trait ApplicationAttributes
 * @package App\Models\Application\Traits
 */
trait ApplicationAttributes
{

    public function getActionButtonsAttribute()
    {

        $action = '<a href="'.route('admin.applications.show', $this->slug).'"><i class="fa fa-search btn btn-primary btn-sm"></i></a>';

        if ($this->resume != null) {

            $action .= '<a target="_blank" href="'.route('admin.applications.download', $this->slug).'"><i class="fa fa-download btn btn-primary btn-sm"></i></a>';

        }

        return $action;

    }

    public function getPositionAttribute()
    {
    	return $this->career->title;
    }

}
