<?php

namespace App\Models\Traits;

trait Dates
{
    public function getUpdatedAtFormattedAttribute()
    {
        return $this->updated_at->format(config('core.settings.datetime_format'));
    }

    public function getDeletedAtFormattedAttribute()
    {
        return $this->deleted_at->format(config('core.settings.datetime_format'));
    }

    public function getCreatedAtFormattedAttribute()
    {
        return $this->created_at->format(config('core.settings.datetime_format'));
    }
}
