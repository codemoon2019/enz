{{-- @php

    if (! isset($page)) {

        $page = homeData();

    }

    $fullUrl = app('request')->fullUrl();

    $metaTag = $page->metaTag;

    // OG Image will be the page meta

    $get_og_image = $page->metaTag->getFirstMediaUrl('images');

    $og_image = $get_og_image != '' ? $get_og_image : app_logo('og_image');
    
    if (isset($model)) {

        switch (get_class($model)) {

            case 'App\Models\News\News':

                // OG Image will be the news featured image

                $og_image = url('/') . $model->getFirstMediaUrl('featured');
            
            break;
            
            default: break;
            
        }

    }

    $meta_title = $metaTag->title;

    $meta_keywords = $metaTag->keywords;

    $meta_description = $metaTag->description;

    MetaTag::setDefault([

        'title' => $meta_title,

        'keywords' =>$meta_keywords,
        
        'description' => $meta_description,
        
        'og_type' => 'website',
        
        'og_url' => $fullUrl,
        
        'og_title' => $meta_title,
        
        'og_description' => $meta_description,
        
        'og_image' =>$og_image,
    
    ]);

@endphp

{!! MetaTag::render() !!} --}}