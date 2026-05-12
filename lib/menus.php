<?php

function regions_refous_register_menus() {
    register_nav_menus([
        'primary' => __('Primary Menu', 'regions-refous'),
        'footer'  => __('Footer Menu', 'regions-refous'),
    ]);
}

add_action('after_setup_theme', 'regions_refous_register_menus');
