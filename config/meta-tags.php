<?php

return [

    /* -----------------------------------------------------------------
     |  The default Model metatag
     | -----------------------------------------------------------------
     */
    'model' => App\Models\MetaTag::class,

    /* -----------------------------------------------------------------
     |  Available fields (for migration, render in blade,...)
     |  Uncoment nedded:
     | -----------------------------------------------------------------
     */
    'available' => [
        //  Meta-tags
        'title' => ['title' => 'Title'],
        // recommend max => 60
        'description' => ['title' => 'Description'],
        // recommend max => 300
        'keywords' => ['title' => 'Keywords'],
        // recommend max => 300

        //  SEO fields
        'h1' => ['title' => 'H1'],
        // only for migration
        'canonical' => ['title' => 'Canonical link'],
        'robots' => ['title' => 'Robots'],
        'changefreq' => ['title' => 'Changefreq'],
        'priority' => ['title' => 'Priority'],

        //  OG-tags
        'og_site_name' => ['title' => 'OG-site_name', 'default' => '[site:name]', 'type' => 'og'],
        'og_locale' => ['title' => 'OG-locale', 'type' => 'og'],
        'og_title' => ['title' => 'OG-title', 'type' => 'og'],
        'og_description' => ['title' => 'OG-description', 'type' => 'og'],
        'og_type' => ['title' => 'OG-type', 'type' => 'og'],
        'og_image' => ['title' => 'OG-image', 'type' => 'og'],
        'og_url' => ['title' => 'OG-url', 'type' => 'og'],
        'og_audio' => ['title' => 'OG-audio', 'type' => 'og'],
        'og_determiner' => ['title' => 'OG-determiner', 'type' => 'og'],
        'og_video' => ['title' => 'OG-video', 'type' => 'og'],


        'twitter_card' => ['title' => 'Twitter-card', 'type' => 'twitter'],
        'twitter_site' => ['title' => 'Twitter-site', 'type' => 'twitter'],
        'twitter_url' => ['title' => 'Twitter-url', 'type' => 'twitter'],
        'twitter_title' => ['title' => 'Twitter-title', 'type' => 'twitter'],
        'twitter_description' => ['title' => 'Twitter-description', 'type' => 'twitter'],
        'twitter_image' => ['title' => 'Twitter-image', 'type' => 'twitter'],

        // 'fb_app_id' => ['title' => 'OG-title', 'type' => 'fb'], // do not saved in DB meta_tags table, saved, for example, in config!
    ],

    'default' => [
        'og_image' => [
            'type' => 'image/png',
            'width' => '1920',
            'height' => '1080',
        ],
        'fb_app_id' => '',
    ],

    /* -----------------------------------------------------------------
     |  This is example, for dashboard SEO form,...
     |  Available values
     |  This list is a sample and is not used in the package
     | -----------------------------------------------------------------
     */
    'values' => [
        'robots' => ['none', 'all', 'index', 'noindex', 'nofollow', 'follow',],
        'changefreq' => ['always', 'daily', 'hourly', 'weekly',],
        'priority' => [0.1, 0.2, 0.3, 0.5, 0.6, 0.7, 0.8, 0.9,],
    ],

    //'types' => [
    //    'article_categories' => [
    //        'model' => \App\Models\Taxonomies\Term::class,
    //        'where_has' => ['type' => 'categories'],
    //    ]
    //],
];
