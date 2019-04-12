@php
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
{!! MetaTag::render() !!}