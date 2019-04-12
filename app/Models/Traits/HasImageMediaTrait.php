<?php

namespace App\Models\Traits;

use Illuminate\Support\Collection;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

trait HasImageMediaTrait
{
    use HasMediaTrait {
        getMedia as protected getMediaOverride;
    }

    /**
     * @param string $collection
     * @param string $conversionName
     * @param string $field
     * @param array  $attributes
     * @param bool   $lazyLoad
     *
     * @return \Spatie\Html\Elements\Img|string
     */
    public function getFirstMediaImage(
        string $collection = 'images',
        string $conversionName = '',
        string $field = 'title',
        array $attributes = [],
        bool $lazyLoad = false
    ) {
        $media = $this->getFirstMedia($collection);

        if (empty($media)) {
            $attributes = [
                    'title' => $this->{$field},
                ] + $attributes;

            return html()->img(null, $this->{$field})->attributes($attributes);
        }

        $attributeString = collect($media->getCustomProperty('attributes') + $attributes)
            ->map(function ($value, $name) use ($lazyLoad) {
                if ($name == 'class' && $lazyLoad) {
                    return $name . '="lazy ' . $value . '"';
                }
                return $name . '="' . $value . '"';
            })->implode(' ');

        $src = $media->getUrl($conversionName);

        if ($lazyLoad) {
            return <<<EOT
<img data-src="{$src}" {$attributeString} />
EOT;
        }
        return <<<EOT
<img src="{$src}" {$attributeString} />
EOT;
    }

    /**
     * Return an array of image objects.
     * Used in image uploader.
     *
     * @param string $collection_name
     * @param string $conversion
     *
     * @return mixed
     */
    public function getUploaderImages(string $collection_name = 'images', string $conversion = '')
    {
        $defaultAllowedProperties = ["attributes"];

        $allowedProperties = defined('self::MEDIA_LIBRARY_CUSTOM_PROPERTIES') ? self::MEDIA_LIBRARY_CUSTOM_PROPERTIES : [];
        $allowedProperties = array_merge($allowedProperties, $defaultAllowedProperties);

        return $this->getMedia($collection_name)->map(function ($media) use ($conversion, $allowedProperties) {
            $obj = new \StdClass;

            $obj->name = $media->file_name;
            $obj->source = $media->getUrl(($media->mime_type == 'image/x-icon') ? '' : $conversion);
            $obj->thumbnail = $media->getUrl(($media->mime_type == 'image/x-icon') ? '' : 'thumbnail');
            $obj->deleteUrl = route('webapi.admin.image.destroy', $media);
            $obj->updatePropertyUrl = route('webapi.admin.image.update.property', $media);
            $obj->properties = $this->formatCustomProperties($media->custom_properties, $allowedProperties);

            return $obj;
        });
    }

    /**
     * Get media collection by its collectionName.
     *
     * @param string         $collectionName
     * @param array|callable $filters
     *
     * @return \Illuminate\Support\Collection
     * @override
     */
    public function getMedia(string $collectionName = 'default', $filters = []): Collection
    {
        return app('query.cache')->queryCache(function () use ($collectionName, $filters) {
            return $this->getMediaOverride($collectionName, $filters);
        }, [get_class($this), $this->id, $collectionName, implode(',', $filters)]);
    }

    /**
     * @param array $customProperties
     * @param array $allowedProperties
     *
     * @return \StdClass
     */
    private function formatCustomProperties(array $customProperties, array $allowedProperties)
    {
        $properties = new \StdClass;

        foreach ($allowedProperties as $property) {
            $properties->{$property} = $customProperties[$property] ?? '';
        }

        return $properties;
    }
}
