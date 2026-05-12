<?php

if (!defined('ABSPATH')) exit;

/*
|--------------------------------------------------------------------------
| Load Theme Files
|--------------------------------------------------------------------------
*/

$regions_refous_includes = [
    // 'lib/setup.php',
    'lib/assets.php',
    'lib/menus.php',
    'lib/customize-theme/main.php',
    // 'lib/sidebars.php',
    // 'lib/helpers.php',
    // 'lib/cleanup.php',
    // 'lib/social-links.php',
];

foreach ($regions_refous_includes as $file) {
    if ($filepath = locate_template($file)) {
        require_once $filepath;
    }
}