<?php

namespace App\Models\Category;

trait CategorableTrait
{
   public function categories()
   {
       return $this->morphToMany(Category::class, 'categorable');
   }
}
