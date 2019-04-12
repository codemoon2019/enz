<?php
/**
 * Created by PhpStorm.
 * User: Lloric Mayuga Garcia <lloricode@gmail.com>
 * Date: 1/16/19
 * Time: 9:59 AM
 */

namespace App\Models\Core\Domain;

use App\Models\Article\Article;
use App\Models\Core\Menu\MenuNode;
use App\Models\Core\Setting;
use App\Models\Core\Slide\Slide;
use App\Models\Event\Event;
use App\Models\Gallery\Gallery;
use App\Models\JobAdvertisement\JobAdvertisement;
use App\Models\NewsPrint\NewsPrint;
use App\Models\Portfolio\Portfolio;
use App\Models\SolutionCenter\SolutionCenter;
use App\Models\WhitePaper\WhitePaper;

trait DomainRelationshipTrait
{
    public function portfolio()
    {
        return $this->hasOne(Portfolio::class);
    }

    public function settings()
    {
        return $this->morphedByMany(Setting::class, 'domainable');
    }

    public function nodes()
    {
        return $this->morphedByMany(MenuNode::class, 'domainable');
    }

    public function sliders()
    {
        return $this->morphedByMany(Slide::class, 'domainable');
    }

    public function events()
    {
        return $this->morphedByMany(Event::class, 'domainable');
    }

    public function jobAdvertisements()
    {
        return $this->morphedByMany(JobAdvertisement::class, 'domainable');
    }

    public function galleries()
    {
        return $this->morphedByMany(Gallery::class, 'domainable');
    }

    public function solutionCenter()
    {
        return $this->morphedByMany(SolutionCenter::class, 'domainable');
    }

    public function articles()
    {
        return $this->morphedByMany(Article::class, 'domainable');
    }

    public function newsPrints()
    {
        return $this->morphedByMany(NewsPrint::class, 'domainable');
    }

    public function whitePapers()
    {
        return $this->morphedByMany(WhitePaper::class, 'domainable');
    }
}