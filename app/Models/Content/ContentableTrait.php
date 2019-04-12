<?php

namespace App\Models\Content;

trait ContentableTrait
{
    public function contents()
    {
        return $this->morphMany(Content::class, 'contentable')->orderBy('order');
    }
}
