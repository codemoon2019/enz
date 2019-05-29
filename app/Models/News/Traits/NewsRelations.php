<?php

namespace App\Models\News\Traits;
use App\Models\Content\Content;

/**
 * Trait NewsRelations
 * @package App\Models\News\Traits
 */
trait NewsRelations
{

    public function contents()
    {
        return $this->morphMany(Content::class, 'contentable')->orderBy('order');
    }
    
}
