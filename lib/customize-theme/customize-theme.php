<?php

// INCLUDE FILES
$inc_files = array(
	'settings/class-rgnrfs-theme-customize.php',
	'settings/class-rgnrfs-theme-css-variables.php',
	'settings/logo-settings.php'
);

foreach( $inc_files as $inc_file ){
	require_once( $inc_file );
}
