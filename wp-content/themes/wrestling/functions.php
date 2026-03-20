<?php
/**
 * 223 Wrestling theme setup.
 */

defined( 'ABSPATH' ) || exit;

add_action( 'after_setup_theme', function () {
    add_theme_support( 'wp-block-styles' );
    load_theme_textdomain( 'wrestling', get_template_directory() . '/languages' );
} );
