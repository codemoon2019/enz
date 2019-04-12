<?php

namespace App\Models\Core\Menu;

trait MenuableTrait
{
    public function menuable()
    {
        return $this->morphMany(MenuNode::class, 'menuable');
    }
}
