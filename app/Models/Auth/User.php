<?php

namespace App\Models\Auth;

use App\Models\Auth\Traits\Attribute\UserAttribute;
use App\Models\Auth\Traits\Method\UserMethod;
use App\Models\Auth\Traits\Relationship\UserRelationship;
use App\Models\Auth\Traits\Scope\UserScope;
use App\Models\Auth\Traits\SendUserPasswordReset;
use App\Models\Traits\Uuid;
use HalcyonLaravel\Base\Models\Traits\ModelTraits;
use HalcyonLaravel\History\Models\Contracts\UserHistoryTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

/**
 * Class User.
 */
class User extends Authenticatable implements UserHistoryTrait, HasMedia
{
    use HasMediaTrait;
    use HasRoles;
    use Notifiable;
    use SendUserPasswordReset;
    use SoftDeletes;
    use UserAttribute;
    use UserMethod;
    use UserRelationship;
    use UserScope;
    use Uuid;
    use HasSlug;
    // Historable,
    use ModelTraits;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'avatar_type',
        'avatar_location',
        'password',
        'password_changed_at',
        'active',
        'confirmation_code',
        'confirmed',
        'timezone',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The dynamic attributes from mutators that should be returned with the user object.
     *
     * @var array
     */
    protected $appends = ['full_name'];

    /**
     * Return the baseable name for this model.
     *
     * @return String
     */
    public function baseable(): array
    {
        return [
            'source' => 'first_name',
        ];
    }

    public function historableName(): string
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    /**
     * Return the links related to this model.
     *
     * @return array
     */
    public function links(): array
    {
        return [

            // 'frontend' => [

            //     'show' => []

            // ]

        ];
    }

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom(['first_name', 'last_name'])
            ->saveSlugsTo('slug');
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function registerMediaCollections()
    {
        $this->addMediaCollection('images')
            ->singleFile()
            //->acceptsFile(function (File $file) {
            //    return $file->mimeType === 'image/jpeg';
            //})
            ->registerMediaConversions(function (Media $media) {
                $this->addMediaConversion('backend-header')
                    ->optimize()
                    ->format(Manipulations::FORMAT_JPG)
                    ->width(70)
                    ->height(70);

                $this->addMediaConversion('small')
                    ->optimize()
                    ->format(Manipulations::FORMAT_JPG)
                    ->width(80)
                    ->height(80);

                $this->addMediaConversion('front-end-dashboard')
                    ->optimize()
                    ->format(Manipulations::FORMAT_JPG)
                    ->width(100)
                    ->height(100);

                $this->addMediaConversion('backend-user-show')
                    ->optimize()
                    ->format(Manipulations::FORMAT_JPG)
                    ->width(80)
                    ->height(80);
            });
    }
}
