<?php

namespace App\Http\Controllers\Api\Backend\Image;

use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use App\Models\MetaTag;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\Models\Media;
use App\Models\Core\Page\Page;
use App\Models\Core\Block\Block;
use App\Models\Core\Setting;
use App\Models\Core\Slide\Slide;
use App\Models\Content\Content;
use App\Models\MoreLife\MoreLife;
use App\Models\Course\Course;
use App\Models\Event\Event;
use App\Models\News\News;
use App\Models\OurTeam\OurTeam;
use App\Models\Service\Service;
use App\Models\Testimonial\Testimonial;
use App\Models\Why\Why;
use App\Models\Linkages\Linkages;
use App\Models\Country\Country;
use App\Models\CoreValue\CoreValue;
use App\Models\Details\Details;
use App\Models\Institution\Institution;

/**
 * Class ImageController
 *
 * @package App\Http\Controllers\Api\Backend\Image
 */
class ImageController extends Controller
{
    protected const MODELS = [
        'slide'       => Slide::class,
        'page'        => Page::class,
        'setting'     => Setting::class,
        'meta'        => MetaTag::class,
        'blocks'      => Block::class,
        'content'     => Content::class,
        'more-life'   => MoreLife::class,
        'course'      => Course::class,
        'event'       => Event::class,
        'news'        => News::class,
        'our-team'    => OurTeam::class,
        'service'     => Service::class,
        'testimonial' => Testimonial::class,
        'why'         => Why::class,
        'linkages'    => Linkages::class,
        'country'     => Country::class,
        'core-values' => CoreValue::class,
        'details'     => Details::class,
        'institution' => Institution::class,
    ];

    /**
     * @param \Spatie\MediaLibrary\Models\Media $media
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Media $media)
    {
        $media->delete();
        app('query.cache')->flush();
        return response()->json([], 204);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param string                   $routeKeyValue
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function upload(Request $request, string $routeKeyValue)
    {
        $this->validate($request, [
            'model' => 'required|in:' . $this->allowedModels(),
            'image' => 'required|image',
        ]);

        $model = $this->getModel($request, $routeKeyValue);

        $collection_name = $request->collection ?? ($model->collection_name ?? 'images');
        $conversion = $request->conversion ?? '';

        $fileName = $this->getFileName($request->image->getClientOriginalName());

        $latestImage = $model->addMedia($request->image)
            ->withCustomProperties([
                'attributes' => [
                    'alt' => $fileName,
                    'title' => $fileName,
                ]
            ])
            ->toMediaCollection($collection_name);

        $image = $this->convertToUploaderImageFormat($latestImage, $conversion,
            defined(self::MODELS[$request->model] . '::MEDIA_LIBRARY_CUSTOM_PROPERTIES')
                ? ['attributes'] + $model::MEDIA_LIBRARY_CUSTOM_PROPERTIES
                : ['attributes']
        );

        // update og_image field
        if ($model instanceof MetaTag) {
            $this->forMeta($model);
        }

        app('query.cache')->flush();
        return response()->json([
            'status' => 'success',
            'data' => $image,
            'message' => 'Success upload for [' . get_class($model) . ']',
        ], 200);
    }

    private function allowedModels(): string
    {
        return implode(',', array_keys(self::MODELS));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param string                   $routeKeyValue
     *
     * @return \Spatie\MediaLibrary\HasMedia\HasMedia
     */
    private function getModel(Request $request, string $routeKeyValue): HasMedia
    {
        $model = app(self::MODELS[$request->model]);

        return $model::where($model->getRouteKeyName(), $routeKeyValue)->firstOrFail();
    }

    /**
     * @param string $fileName_
     *
     * @return string
     */
    private function getFileName(string $fileName_): string
    {
        $fileName = explode('/', $fileName_);
        $fileName = $fileName[count($fileName) - 1];
        $fileName = explode('.', $fileName)[0];
        $fileName = str_replace('%20', ' ', $fileName);
        $fileName = str_replace('-', ' ', $fileName);
        return str_replace('_', ' ', $fileName);
    }

    /**
     * @param \Spatie\MediaLibrary\Models\Media $media
     * @param string                            $conversion
     * @param array                             $allowedProperties
     *
     * @return \StdClass
     */
    private function convertToUploaderImageFormat(Media $media, string $conversion, array $allowedProperties = [])
    {
        $image = new \StdClass;

        $image->name = $media->file_name;
        $image->source = $media->getUrl($conversion);

        // issue on background task, so return original immediately
        $image->thumbnail = $media->getUrl();

        $image->deleteUrl = route('webapi.admin.image.destroy', $media);
        $image->updatePropertyUrl = route('webapi.admin.image.update.property', $media);
        $image->properties = $this->formatCustomProperties($media->custom_properties, $allowedProperties);

        return $image;
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

    /**
     * @param \App\Models\MetaTag $metaTag
     */
    public function forMeta(MetaTag $metaTag)
    {
        $metaTag->update([
            'og_image' => $metaTag->getFirstMediaUrl('images', 'og_image'),
        ]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param string                   $routeKeyValue
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
//    public function multiUpload(Request $request, string $routeKeyValue)
//    {
//        $this->validate($request, [
//            'model' => 'required|in:' . $this->allowedModels(),
//            'images' => 'required',
//            'images.*' => 'image'
//        ]);
//
//        $model = $this->getModel($request, $routeKeyValue);
//
//        $collection_name = $model->collection_name ?? 'images';
//        $conversion = $request->conversion ?? '';
//
//        foreach ($request->images as $image) {
//            $model->addMedia($image)->toMediaCollection($collection_name);
//        }
//
//        $images = $model->getUploaderImages($collection_name, $conversion);
//
//        return response()->json([
//            'status' => 'success',
//            'data' => $images
//        ], 200);
//    }

    /**
     * @param \Illuminate\Http\Request          $request
     * @param \Spatie\MediaLibrary\Models\Media $media
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateProperty(Request $request, Media $media)
    {
        $this->validate($request, [
            'properties' => 'required',
        ]);

        foreach ($request->properties as $key => $property) {
            $media->setCustomProperty($key, $property);
        }

        $media->save();

        // Get allowed properties
        $allowed_properties = $media->custom_properties;
        unset($allowed_properties['custom_headers']);
        unset($allowed_properties['generated_conversions']);

        $properties = $this->formatCustomProperties($media->custom_properties, array_keys($allowed_properties));

        app('query.cache')->flush();
        return response()->json(['status' => 'success', 'data' => $properties], 200);
    }
}
