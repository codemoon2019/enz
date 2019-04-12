<?php

namespace App\Models\Traits;

trait Image
{
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
        return $this->getMedia($collection_name)->map(function ($media) use ($conversion) {
            $obj = new \StdClass;

            $obj->name = $media->file_name;
            $obj->source = $media->getUrl(($media->mime_type == 'image/x-icon') ? '' : $conversion);
            $obj->fullSource = $media->getFullUrl(($media->mime_type == 'image/x-icon') ? '' : $conversion);
            $obj->thumbnail = $media->getUrl(($media->mime_type == 'image/x-icon') ? '' : 'thumbnail');
            $obj->deleteUrl = route('webapi.admin.image.destroy', $media);
            $obj->updatePropertyUrl = route('webapi.admin.image.update.property', $media);
            $obj->properties = $this->formatCustomProperties($media->custom_properties,
                defined('self::MEDIA_LIBRARY_CUSTOM_PROPERTIES') ? self::MEDIA_LIBRARY_CUSTOM_PROPERTIES : []);
            $obj->size = $media->size;

            return $obj;
        });
    }

    /**
     * @param array $customProperties
     * @param array $allowedProperties
     *
     * @return array
     */
    private function formatCustomProperties(array $customProperties, array $allowedProperties)
    {
        $properties = [];

        foreach ($allowedProperties as $property) {
            $properties[$property] = $customProperties[$property] ?? '';
        }

        return $properties;
    }
}
