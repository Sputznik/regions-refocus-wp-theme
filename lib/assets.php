<?php

function regions_refous_enqueue_assets() {

    wp_enqueue_style(
        'regions-refous-main',
        get_theme_file_uri('/assets/css/main.css'),
        array(),
        filemtime(get_theme_file_path('/assets/css/main.css'))
    );

    wp_enqueue_style(
        'regions-refous-header',
        get_theme_file_uri('/assets/css/header.css'),
        array(),
        filemtime(get_theme_file_path('/assets/css/header.css'))
    );

    //the below things are copied from the old theme, not sure if we need all of these or if we should add some more, but this is a good starting point for now.

    wp_enqueue_style(
        'regions-refous-elementor-global',
        get_theme_file_uri('/assets/css/elementor/global.css'),
        array(),
        filemtime(get_theme_file_path('/assets/css/elementor/global.css'))
    );

    wp_enqueue_style(
        'regions-refous-elementor-post',
        get_theme_file_uri('/assets/css/elementor/post.css'),
        array(),
        filemtime(get_theme_file_path('/assets/css/elementor/post.css'))
    );

    wp_enqueue_style(
        'regions-refous-main-10dd13a8',
        get_theme_file_uri('/assets/css/styles/main_10dd13a8.css'),
        array(),
        filemtime(get_theme_file_path('/assets/css/styles/main_10dd13a8.css'))
    );

    wp_enqueue_style(
        'regions-refous-main_e1c55997',
        get_theme_file_uri('/assets/css/styles/main_e1c55997.css'),
        array(),
        filemtime(get_theme_file_path('/assets/css/styles/main_e1c55997.css'))
    );

    wp_enqueue_style(
        'block-library',
        get_theme_file_uri('/assets/css/block-library/style.min.css'),
        array(),
        filemtime(get_theme_file_path('/assets/css/block-library/style.min.css'))
    );

    wp_enqueue_script(
        'regions-refous-main',
        get_theme_file_uri('/assets/js/main.js'),
        array(),
        filemtime(get_theme_file_path('/assets/js/main.js')),
        true
    );

    wp_enqueue_style(
        'regions-refous-fonts',
        'https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap',
        array(),
        null
    );

}

add_action('wp_enqueue_scripts', 'regions_refous_enqueue_assets');

// copied directly from old theme, not sure if we need all of these or if we should add some more, but this is a good starting point for now.
function regionsrefocus_enqueue_assets() {

    /* --------------------
     * Styles
     * -------------------- */

    // wp_enqueue_style(
    //     'wp-block-library',
    //     'https://regionsrefocus.org/wp/wp-includes/css/dist/block-library/style.min.css',
    //     array(),
    //     '5.8'
    // );

    wp_enqueue_style(
        'elementor-icons',
        'https://regionsrefocus.org/app/plugins/elementor/assets/lib/eicons/css/elementor-icons.min.css',
        array(),
        '5.13.0'
    );

    wp_enqueue_style(
        'elementor-frontend',
        'https://regionsrefocus.org/app/plugins/elementor/assets/css/frontend.min.css',
        array(),
        '3.4.6'
    );

    // wp_enqueue_style(
    //     'elementor-post-1550',
    //     'https://regionsrefocus.org/app/uploads/elementor/css/post-1550.css',
    //     array(),
    //     '1643144189'
    // );

    wp_enqueue_style(
        'elementor-pro',
        'https://regionsrefocus.org/app/plugins/elementor-pro/assets/css/frontend.min.css',
        array(),
        '3.4.1'
    );

    // wp_enqueue_style(
    //     'elementor-global',
    //     'https://regionsrefocus.org/app/uploads/elementor/css/global.css',
    //     array(),
    //     '1643147710'
    // );

    // wp_enqueue_style(
    //     'sage-main',
    //     'https://regionsrefocus.org/app/themes/regionsrefocus/dist/styles/main_10dd13a8.css',
    //     array(),
    //     null
    // );

    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css?family=Roboto:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic|Roboto+Slab:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic&display=auto',
        array(),
        null
    );


    /* --------------------
     * Scripts
     * -------------------- */

    wp_enqueue_script(
        'jquery'
    );

    wp_enqueue_script(
        'jquery-migrate'
    );

    wp_enqueue_script(
        'sage-main-js',
        'https://regionsrefocus.org/app/themes/regionsrefocus/dist/scripts/main_10dd13a8.js',
        array('jquery'),
        null,
        true
    );

    wp_enqueue_script(
        'wp-embed',
        'https://regionsrefocus.org/wp/wp-includes/js/wp-embed.min.js',
        array(),
        '5.8',
        true
    );

    wp_enqueue_script(
        'mc4wp-forms-api',
        'https://regionsrefocus.org/app/plugins/mailchimp-for-wp/assets/js/forms.min.js',
        array('jquery'),
        '4.8.3',
        true
    );

}
add_action('wp_enqueue_scripts', 'regionsrefocus_enqueue_assets');
add_filter('get_custom_logo', function($html){
    return str_replace('custom-logo-link', 'custom-logo-link brand', $html);
});