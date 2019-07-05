{{-- @php
    MetaTag::setDefault([
        'title' => $current_domain->title,
        'description' => setting('site-description'),
        'og_type' => 'website',
        'og_url' => app('request')->fullUrl(),
        'og_title' => MetaTag::tag('title') ?: $current_domain->title,
        'og_description' => MetaTag::tag('description') ?: setting('site-description'),
        'og_image' => (isset($model) && $model->metaTag->getFirstMedia('images'))? $model->metaTag->getFirstMedia('images')->getFullUrl('og_image') : app_logo('og_image'),
        'twitter_card' => 'summary_large_image',
        'twitter_site' => app('request')->fullUrl(),
        'twitter_url' => app('request')->fullUrl(),
        'twitter_title' =>  MetaTag::tag('title') ?: $current_domain->title,
        'twitter_description' => MetaTag::tag('description') ?: setting('site-description'),
        'twitter_image' =>  app_logo('og_image'),
    ]);
@endphp
{!! MetaTag::render() !!} --}}

{{-- 

@php
    
    if (! isset($page)) {

        $page = homeData();

    }

    $fullUrl = app('request')->fullUrl();

    $metaTag = $page->metaTag;

    $get_og_image = $page->metaTag->getFirstMediaUrl('images');

    $og_image = $get_og_image != '' ? $get_og_image : app_logo('og_image');

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