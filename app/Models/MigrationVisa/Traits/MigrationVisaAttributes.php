<?php

namespace App\Models\MigrationVisa\Traits;

/**
 * Trait MigrationVisaAttributes
 * @package App\Models\MigrationVisa\Traits
 */
trait MigrationVisaAttributes
{

    public function getActionButtonsAttribute()
    {

        $action = '<a href="'.route('admin.migration-visas.show', $this->slug).'"><i class="fa fa-search btn btn-primary btn-sm"></i></a>';

        if ($this->resume != null) {

            $action .= '<a target="_blank" href="'.route('admin.migration-visas.download', $this->slug).'"><i class="fa fa-download btn btn-primary btn-sm"></i></a>';

        }

        return $action;

    }

}
