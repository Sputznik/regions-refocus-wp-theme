<?php
	function regions_refocus_theme() {

    // add_theme_support('title-tag');
    // add_theme_support('post-thumbnails');
    // add_theme_support('html5', [
    //     'search-form',
    //     'comment-form',
    //     'comment-list',
    //     'gallery',
    //     'caption',
    // ]);

    add_theme_support('custom-logo', [
        // 'height' => 60,
        'flex-height' => false,
        'flex-width' => false,
    ]);

    // add_theme_support('align-wide');
    // add_theme_support('wp-block-styles');
    // add_theme_support('responsive-embeds');

	}
	add_action('after_setup_theme', 'regions_refocus_theme');