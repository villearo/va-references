<?php
/*
Plugin Name:    VA References
Plugin URI:     https://github.com/villearo/va-references
Description:    Custom post type for website references. Shortcode usage: [references] or more specific [references order='asc' orderby='date' posts='10' columns='3' ids='60, 64']
Version:        1.0.0
Author:         Ville Aro
Author URI:     https://villearo.fi/
Text Domain:    va-references
Domain Path:    /languages
License:        GPLv2 or later
License URI:    http://www.gnu.org/licenses/gpl-2.0.html
*/

/**
 * Global variables
 */
$plugin_file = plugin_basename(__FILE__);                               // plugin file for reference
define( 'VA_REFERENCES_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );   // define the absolute plugin path for includes
define( 'VA_REFERENCES_PLUGIN_URL', plugin_dir_url( __FILE__ ) );     // define the plugin url for use in enqueue

/**
 * Includes
 */
include( VA_REFERENCES_PLUGIN_PATH . 'functions/activation.php' );
include( VA_REFERENCES_PLUGIN_PATH . 'functions/deactivation.php' );
include( VA_REFERENCES_PLUGIN_PATH . 'functions/meta-boxes.php' );
include( VA_REFERENCES_PLUGIN_PATH . 'functions/display-reference.php' );
include( VA_REFERENCES_PLUGIN_PATH . 'functions/shortcode.php' );

