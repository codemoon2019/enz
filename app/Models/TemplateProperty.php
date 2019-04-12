<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Content\Content;

class TemplateProperty extends Model
{

	protected $fillable = ['image_area', 'image_align'];

	public function template()
	{
		return $this->belongsTo(Content::class);
	}
}
