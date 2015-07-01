<?php
/*
 * Plugin Name: Discourse Topic Integration
 * Version: 0.4.1
 * Plugin URI: https://github.com/matthieu-lapeyre/wp-discourse-topic-integration
 * GitHub Plugin URI: https://github.com/matthieu-lapeyre/wp-discourse-topic-integration
 * Description: Integrate Discourse topic into wordpress posts or pages
 * Author: Matthieu Lapeyre
 * Author URI: http://www.github.com/matthieu-lapeyre
 * Requires at least: 3.0
 * Tested up to: 4.2
 *
 * Text Domain: discourse-topic-integration
 * Domain Path: /lang/
 *
 * @package WordPress
 * @author Hugh Lashbrooke
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// Load plugin class files
require_once( 'includes/class-discourse-topic-integration.php' );
require_once( 'includes/class-discourse-topic-integration-settings.php' );

// Load plugin libraries
require_once( 'includes/lib/class-discourse-topic-integration-admin-api.php' );

require_once( 'discourse-topic-integration-shortcode.php' );
/**
 * Returns the main instance of Discourse_Topic_Integration to prevent the need to use globals.
 *
 * @since  0.1.0
 * @return object Discourse_Topic_Integration
 */


function discourse_add_custom_css() { ?>
    <style type="text/css" media="screen">
		<?php echo get_option('dti_discourse_custom_css'); ?>
    </style>
<?php
    wp_register_style( 'discourse-style', plugins_url('includes/style/discourse-integration.css', __FILE__), array(), null);
    wp_enqueue_style( 'discourse-style' );

}
// wp_register_script( 'discourse-app', plugins_url( '/stuff/js/app.js', __FILE__ ) );


add_action('wp_head', 'discourse_add_custom_css');


function Discourse_Topic_Integration () {
  $instance = Discourse_Topic_Integration::instance( __FILE__, '0.4.1' );

  if ( is_null( $instance->settings ) ) {
    $instance->settings = Discourse_Topic_Integration_Settings::instance( $instance );
  }

  return $instance;
}

Discourse_Topic_Integration();
