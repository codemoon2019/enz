<?php

namespace App\Models\MoreLife\Traits;
use App\Models\Content\Content;

/**
 * Trait MoreLifeRelations
 * @package App\Models\MoreLife\Traits
 */
trait MoreLifeRelations
{

    public function contents()
    {
        return $this->morphMany(Content::class, 'contentable')->orderBy('order');
    }
    
}
