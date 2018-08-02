<?php
/**
 * Plugin Name: ND Team
 * Plugin URI:
 * Description: WordPress plugin which creates a Team custom post type.
 * Version:     0.1.0
 * Author:      Nick Davis
 * Author URI:  http://nickdavis.co
 * Text Domain: nd-team
 * Domain Path: /languages
 *
 * @package PluginScaffold
 */

// Useful global constants
define( 'ND_TEAM_VERSION', '0.1.0' );
define( 'ND_TEAM_URL', plugin_dir_url( __FILE__ ) );
define( 'ND_TEAM_PATH', dirname( __FILE__ ) . '/' );
define( 'ND_TEAM_INC', ND_TEAM_PATH . 'includes/' );

// Autoload
$autoloader = __DIR__ . '/vendor/autoload.php';
if ( is_readable( $autoloader ) ) {
	require_once $autoloader;
}

// Include files
require_once ND_TEAM_INC . 'functions/core.php';


// Activation/Deactivation
register_activation_hook( __FILE__, '\NickDavis\Team\Core\activate' );
register_deactivation_hook( __FILE__, '\NickDavis\Team\Core\deactivate' );

// Bootstrap
NickDavis\Team\Core\setup();
