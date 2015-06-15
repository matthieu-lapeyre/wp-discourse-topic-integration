<?php
/*
 * Plugin Name: Discourse Topic Integration
 * Version: 1.0
 * Plugin URI: http://www.hughlashbrooke.com/
 * Description: This is your starter template for your next WordPress plugin.
 * Author: Hugh Lashbrooke
 * Author URI: http://www.hughlashbrooke.com/
 * Requires at least: 4.0
 * Tested up to: 4.0
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
require_once( 'includes/lib/class-discourse-topic-integration-post-type.php' );
require_once( 'includes/lib/class-discourse-topic-integration-taxonomy.php' );

/**
 * Returns the main instance of Discourse_Topic_Integration to prevent the need to use globals.
 *
 * @since  1.0.0
 * @return object Discourse_Topic_Integration
 */
function Discourse_Topic_Integration () {
	$instance = Discourse_Topic_Integration::instance( __FILE__, '1.0.0' );

	if ( is_null( $instance->settings ) ) {
		$instance->settings = Discourse_Topic_Integration_Settings::instance( $instance );
	}

	return $instance;
}

Discourse_Topic_Integration();