<?php
/**
 * Plugin Name: Wrestling Core
 * Plugin URI:
 * Description: Custom post types, fields, REST endpoints, and business logic for the 223 Wrestling site.
 * Version: 1.0.0
 * Requires at least: 6.4
 * Requires PHP: 8.1
 * Author: 223 Wrestling
 * Text Domain: wrestling-core
 */

defined( 'ABSPATH' ) || exit;

define( 'WRESTLING_CORE_VERSION', '1.0.0' );
define( 'WRESTLING_CORE_DIR', plugin_dir_path( __FILE__ ) );
define( 'WRESTLING_CORE_URL', plugin_dir_url( __FILE__ ) );

// Includes are added in Plan 2:
// require_once WRESTLING_CORE_DIR . 'includes/cpts.php';
// require_once WRESTLING_CORE_DIR . 'includes/roles.php';
// require_once WRESTLING_CORE_DIR . 'includes/rest-api.php';
// require_once WRESTLING_CORE_DIR . 'includes/hooks.php';
