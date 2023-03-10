<?php

namespace App\Models\Event\Traits;

use App\Models\Content\Content;

use App\Models\Event\EventInquiry;

/**
 * Trait EventRelations
 * @package App\Models\Event\Traits
 */
trait EventRelations
{
    public function contents()
    {
        return $this->morphMany(Content::class, 'contentable')->orderBy('order');
    }

    public function inquiries()
    {
        return $this->hasMany(EventInquiry::class);
    }
}

