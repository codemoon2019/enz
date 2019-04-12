<?php

namespace App\Models\Category;

use App\Models\FrequentlyAskedQuestion\FrequentlyAskedQuestion as FAQ;

trait CategoryRelations
{
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function faqs()
    {
        return $this->hasMany(FAQ::class, 'category_id');
    }
}
