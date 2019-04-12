<?php
/**
 * Created by PhpStorm.
 * User: Lloric Mayuga Garcia <lloricode@gmail.com>
 * Date: 1/10/19
 * Time: 4:27 PM
 */

namespace App\Models;

use App\Models\Traits\HasImageMediaTrait;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\Models\Media;

class MetaTag extends \Fomvasss\LaravelMetaTags\Models\MetaTag implements HasMedia
{
    use HasImageMediaTrait;

    public function registerMediaCollections()
    {
        $this->addMediaCollection('images')
            ->singleFile()
            ->registerMediaConversions(function (Media $media) {
                // define other conversions here
                $this->addMediaConversion('thumbnail')// required. used in backend image uploader
                ->optimize()
                    ->format(Manipulations::FORMAT_JPG)
                    ->fit(Manipulations::FIT_CROP, 175, 175);

                $this->addMediaConversion('og_image')
                    ->optimize()
                    ->keepOriginalImageFormat()
                    ->width(config('meta-tags.default.og_image.width'))
                    ->height(config('meta-tags.default.og_image.height'));
            });
    }
}