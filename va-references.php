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
 * Load plugin textdomain
 */
function va_references_load_textdomain() {
  load_plugin_textdomain( 'va-references', false, 'va-references/languages' ); 
}
add_action( 'plugins_loaded', 'va_references_load_textdomain' );


/**
 * Global variables
 */
$plugin_file = plugin_basename(__FILE__);                             // plugin file for reference
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


/**
 * Use templates shipped with plugin
 */
function get_custom_post_type_template( $archive_template ) {
     global $post;
     if ( is_post_type_archive( 'va-references' ) ) {
          $archive_template = VA_REFERENCES_PLUGIN_PATH . '/templates/archive-references.php';
     }
     return $archive_template;
}

add_filter( 'archive_template', 'get_custom_post_type_template' ) ;





////XX
////XXadd_filter('archive_template', 'yourplugin_get_custom_archive_template');
////XX
////XXfunction yourplugin_get_custom_archive_template($template) {
////XX    global $wp_query;
////XX    if (is_post_type_archive('va-references')) {
////XX        $templates[] = 'archive-references.php';
////XX        $template = yourplugin_locate_plugin_template($templates);
////XX    }
////XX    return $template;
////XX}
////XX
////XX
////XX//Rinse and repeat with the appropriate checks for each template you want to implement (single, taxonomy etc).
////XX
////XXfunction yourplugin_locate_plugin_template($template_names, $load = false, $require_once = true ) {
////XX    if (!is_array($template_names)) {
////XX        return '';
////XX    }
////XX    $located = '';  
////XX    $this_plugin_dir = WP_PLUGIN_DIR . '/' . str_replace( basename(__FILE__), "", plugin_basename(__FILE__));
////XX    foreach ( $template_names as $template_name ) {
////XX        if ( !$template_name )
////XX            continue;
////XX        if ( file_exists(STYLESHEETPATH . '/' . $template_name)) {
////XX            $located = STYLESHEETPATH . '/' . $template_name;
////XX            break;
////XX        } elseif ( file_exists(TEMPLATEPATH . '/' . $template_name) ) {
////XX            $located = TEMPLATEPATH . '/' . $template_name;
////XX            break;
////XX        } elseif ( file_exists( $this_plugin_dir . '/templates/' . $template_name) ) {
////XX            $located =  $this_plugin_dir . '/templates/' . $template_name;
////XX            break;
////XX        }
////XX    }
////XX    if ( $load && $located != '' ) {
////XX        load_template( $located, $require_once );
////XX    }
////XX    return $located;
////XX}
////XX
////XX
////XX
////XX
////XX//Doing it this way means that WP will look in the theme first for your templates, but will fall back to the plugin's templates folder if not found in your theme. If users want to modify the templates to fit their theme, they can simply copy them to their theme's folder.
////XX
////XX//If you want to be really clever about it, you can force a check for the templates in their theme folder and load some default styles if they're using the plugin's copy of the templates:
////XX
////XX
////XXadd_action('switch_theme', 'yourplugin_theme_check');
////XXadd_action('wp_enqueue_scripts', 'yourplugin_css');
////XX
////XX
////XXfunction yourplugin_css() {
////XX    if(get_option('yourplugin-own-theme') != true && !is_admin()) {
////XX    wp_enqueue_style('yourplugin-styles', plugins_url('/css/yourplugin.css', __FILE__));
////XX    }
////XX}
////XX
////XXfunction yourplugin_theme_check() {
////XX    if(locate_template('archive-yourCPT.php') != '' && locate_template('single-yourCPT.php') != '' && locate_template('taxonomy-yourTaxonomy.php') != '' && locate_template('taxonomy-anotherTaxonomy.php') != '') {
////XX    update_option('yourplugin-own-theme', true);
////XX     }   
////XX     else {
////XX     update_option('yourplugin-own-theme', false);
////XX     }
////XX}
