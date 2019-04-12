<?php
/**
 * Created by PhpStorm.
 * User: Lloric Mayuga Garcia <lloricode@gmail.com>
 * Date: 1/2/19
 * Time: 11:41 AM
 */

namespace App\Models\Core\Domain;

use App\Models\Traits\HasImageMediaTrait;
use HalcyonLaravel\Base\Models\Contracts\BaseModelPermissionInterface;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;

class Domain extends Model implements HasMedia, BaseModelPermissionInterface
{
    use HasImageMediaTrait;
    use DomainRelationshipTrait;

    /**
     * Return all the permissions for this model.
     *
     * @return array
     */
    public static function permissions(): array
    {
        return [
            'index' => 'domain index',
        ];
    }

    public function getTitleShortAttribute()
    {
        return substr($this->title, 0, 14) . ' ...';
    }

    public function registerMediaCollections()
    {
        $this->addMediaCollection('footer_image')
            ->singleFile();
        $this->addMediaCollection('brand_image')
            ->singleFile();
        $this->addMediaCollection('magazine_image')
            ->singleFile();
        $this->addMediaCollection('loader_image')
            ->singleFile();

        // conversion
        $this->addMediaConversion('optimized')
            ->optimize();
        $this->addMediaConversion('optimized-original-format')
            ->optimize()
            ->keepOriginalImageFormat();
    }
}