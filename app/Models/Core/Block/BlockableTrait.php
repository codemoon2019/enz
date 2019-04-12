<?php

namespace App\Models\Core\Block;

trait BlockableTrait
{
    /**
     * Get all of the blocks for the post.
     */
    public function blocks()
    {
        return $this->morphToMany(Block::class, 'blockable');
    }
}
