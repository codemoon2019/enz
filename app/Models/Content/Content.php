<?php

namespace App\Models\Content;

use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use App\Models\Traits\HasImageMediaTrait;
use App\Models\TemplateProperty;

class Content extends Model implements HasMedia
{

    use HasImageMediaTrait;
    /**
     * Declared Fillables
     */
    protected $fillable = [
        'title',
        'template',
        'order',
        'status',
        'body',
        'published_at',
    ];

    public function contentable()
    {
        return $this->morphTo();
    }

    public function property()
    {
        return $this->hasOne(TemplateProperty::class);
    }

    public function registerMediaCollections()
    {

        $this->addMediaCollection('images')->registerMediaConversions(function (Media $media) {
          
            $this->addMediaConversion('thumbnail')->optimize()->format(Manipulations::FORMAT_JPG)->fit(Manipulations::FIT_CROP, 175, 175);

        });

    }

    public function getContentDivisionAttribute()
    {
        $head = explode('<p>-head-</p>', $this->body);

        $end = explode('<p>-end-</p>', $this->body);

        $body = json_decode($this->body);

        if (is_array($body)) {


            $head = explode('<p>-head-</p>', $body[0]);

            $end = explode('<p>-end-</p>', $body[0]);

        }
        
        $html_print = '';
        
        if (count($head) > 1) {

            foreach ($head as $html) {

                $end = explode('<p>-end-</p>', $html);

                if (count($end) > 1) {

                    foreach ($end as $z) {

                        $start = explode('<p>/*', $z);

                        if (count($start) > 1) {

                            $x = '';

                            foreach ($start as $value) {

                                $close = explode('*/</p>', $value);

                                if (count($close) == 1) {
                                    $x .= $close[0];
                                }else{
                                    $x .= $close[count($close) - 1];
                                }

                            }
                        }else{
                            $x = $z;
                        }

                        $html_print .= '<div class="col-sm-6">'.$x.'</div>';
                    }

                }else{
                    
                    $start = explode('<p>/*', $html);

                    if (count($start) > 1) {

                        $x = '';

                        foreach ($start as $value) {

                            $close = explode('*/</p>', $value);

                            if (count($close) == 1) {
                                $x .= $close[0];
                            }else{
                                $x .= $close[count($close) - 1];
                            }

                        }
                    }else{
                        $x = $html;
                    }

                    $html_print .= '<div>'.$x.'</div>';
               
                }
            }

        }else{

            if (count($end) > 1) {
                
                foreach ($end as $html) {

                    $start = explode('<p>/*', $html);

                    if (count($start) > 1) {

                        $x = '';

                        foreach ($start as $value) {

                            $close = explode('*/</p>', $value);

                            if (count($close) == 1) {
                                $x .= $close[0];
                            }else{
                                $x .= $close[count($close) - 1];
                            }

                        }
                    }else{
                        $x = $html;
                    }

                    $html_print .= '<div class="col-sm-6">'.$x.'</div>';
                }


            }else{

                $start = explode('<p>/*', is_array($body) ? $body[0] : $this->body);

                if (count($start) > 1) {

                    $x = '';
                    foreach ($start as $value) {

                        $close = explode('*/</p>', $value);

                        if (count($close) == 1) {
                            $x .= $close[0];
                        }else{
                            $x .= $close[count($close) - 1];
                        }

                    }

                    return $x;
                }

                return is_array($body) ? $body[0] : '<div class="col-md-12">' . $this->body . '</div>';
            }

        }

        return $html_print;
    }
    
}
