<?php

namespace App\Models\Core;

use App\Models\Traits\HasDomains;
use App\Models\Traits\HasImageMediaTrait;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\File;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\Models\Media;

class Setting extends Model implements HasMedia
{
    use HasImageMediaTrait;
    use HasDomains;

    protected $fillable = [
        'value'
    ];

    public function registerMediaCollections()
    {
        $this->addMediaCollection('site-logo')
            ->singleFile()
            ->acceptsFile(function (File $file) {
                return in_array($file->mimeType, [
                    'image/jpg',
                    'image/jpeg',
                    'image/gif',
                    'image/png',
                    'image/bmp',
                    'image/svg+xml',
                ]);
            })
            ->registerMediaConversions(function (Media $media) {
                $this->addMediaConversion('default')
                    ->optimize()
                    ->width(91)
                    ->height(91)
                    ->keepOriginalImageFormat();
                $this->addMediaConversion('nav')
                    ->optimize()
                    ->width(91)
                    ->height(91);
                $this->addMediaConversion('video-banner')
                    ->optimize()
                    ->width(130)
                    ->height(130);
//                    ->keepOriginalImageFormat()
//                    ->fit(Manipulations::FIT_FILL, 230, 52);
                $this->addMediaConversion('nav-backend')
                    ->optimize()
                    ->keepOriginalImageFormat()
                    ->fit(Manipulations::FIT_FILL, 230, 52);
                $this->addMediaConversion('footer')
                    ->optimize()
                    ->keepOriginalImageFormat()
                    ->fit(Manipulations::FIT_FILL, 130, 130);
                $this->addMediaConversion('thumbnail')
                    ->optimize()
                    ->keepOriginalImageFormat()
                    ->fit(Manipulations::FIT_CROP, 175, 175);
                $this->addMediaConversion('og_image')
                    ->optimize()
                    ->keepOriginalImageFormat()
                    ->width(config('meta-tags.default.og_image.width'))
                    ->height(config('meta-tags.default.og_image.height'));

            });

        $this->addMediaCollection('site-favicon')
            ->singleFile()
            ->registerMediaConversions(function (Media $media) {
                $this->addMediaConversion('thumbnail')
                    ->optimize()
                    ->keepOriginalImageFormat()
                    ->fit(Manipulations::FIT_CROP, 175, 175)
                    ->background('b3b3b3');

            });
//            ->acceptsFile(function (File $file) {
//                return in_array($file->mimeType, [
//                    'image/x-icon',
//                ]);
//            });

    }
}
