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

require_once WRESTLING_CORE_DIR . 'includes/cpts.php';
require_once WRESTLING_CORE_DIR . 'includes/roles.php';
require_once WRESTLING_CORE_DIR . 'includes/hooks.php';

// ACF field groups — loaded only when ACF is active
add_action( 'acf/init', function () {
    require_once WRESTLING_CORE_DIR . 'includes/acf-fields/technique-fields.php';
    require_once WRESTLING_CORE_DIR . 'includes/acf-fields/flowchart-fields.php';
    require_once WRESTLING_CORE_DIR . 'includes/acf-fields/wrestler-fields.php';
    require_once WRESTLING_CORE_DIR . 'includes/acf-fields/practice-plan-fields.php';
    require_once WRESTLING_CORE_DIR . 'includes/acf-fields/wrestler-note-fields.php';
    require_once WRESTLING_CORE_DIR . 'includes/acf-fields/scouting-report-fields.php';
} );
