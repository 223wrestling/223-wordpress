<?php
/**
 * Custom Post Types and Taxonomies for 223 Wrestling.
 */

defined( 'ABSPATH' ) || exit;

add_action( 'init', 'wrestling_register_cpts' );

function wrestling_register_cpts(): void {

    // ── Technique ────────────────────────────────────────────────────────────
    register_post_type( 'technique', [
        'labels' => [
            'name'               => 'Techniques',
            'singular_name'      => 'Technique',
            'add_new_item'       => 'Add New Technique',
            'edit_item'          => 'Edit Technique',
            'search_items'       => 'Search Techniques',
            'not_found'          => 'No techniques found.',
        ],
        'public'             => true,
        'show_in_rest'       => true,
        'show_in_menu'       => true,
        'menu_icon'          => 'dashicons-awards',
        'supports'           => [ 'title', 'custom-fields' ],
        'has_archive'        => true,
        'rewrite'            => [ 'slug' => 'techniques' ],
        'capability_type'    => [ 'technique', 'techniques' ],
        'map_meta_cap'       => true,
    ] );

    // ── Flowchart ─────────────────────────────────────────────────────────────
    register_post_type( 'flowchart', [
        'labels' => [
            'name'               => 'Flowcharts',
            'singular_name'      => 'Flowchart',
            'add_new_item'       => 'Add New Flowchart',
            'edit_item'          => 'Edit Flowchart',
            'search_items'       => 'Search Flowcharts',
            'not_found'          => 'No flowcharts found.',
        ],
        'public'             => true,
        'show_in_rest'       => true,
        'show_in_menu'       => true,
        'menu_icon'          => 'dashicons-networking',
        'supports'           => [ 'title', 'custom-fields' ],
        'has_archive'        => false,
        'rewrite'            => [ 'slug' => 'flowcharts' ],
        'capability_type'    => [ 'flowchart', 'flowcharts' ],
        'map_meta_cap'       => true,
    ] );

    // ── Wrestler ──────────────────────────────────────────────────────────────
    register_post_type( 'wrestler', [
        'labels' => [
            'name'               => 'Wrestlers & Coaches',
            'singular_name'      => 'Wrestler',
            'add_new_item'       => 'Add New Wrestler / Coach',
            'edit_item'          => 'Edit Wrestler / Coach',
            'search_items'       => 'Search Roster',
            'not_found'          => 'No roster entries found.',
        ],
        'public'             => false,
        'show_ui'            => true,
        'show_in_rest'       => true,
        'show_in_menu'       => true,
        'menu_icon'          => 'dashicons-groups',
        'supports'           => [ 'title', 'custom-fields' ],
        'has_archive'        => false,
        'capability_type'    => [ 'wrestler', 'wrestlers' ],
        'map_meta_cap'       => true,
    ] );

    // ── Practice Plan ─────────────────────────────────────────────────────────
    register_post_type( 'practice_plan', [
        'labels' => [
            'name'               => 'Practice Plans',
            'singular_name'      => 'Practice Plan',
            'add_new_item'       => 'Add New Practice Plan',
            'edit_item'          => 'Edit Practice Plan',
            'not_found'          => 'No practice plans found.',
        ],
        'public'             => false,
        'show_ui'            => true,
        'show_in_rest'       => true,
        'show_in_menu'       => true,
        'menu_icon'          => 'dashicons-clipboard',
        'supports'           => [ 'title', 'custom-fields' ],
        'has_archive'        => false,
        'capability_type'    => [ 'practice_plan', 'practice_plans' ],
        'map_meta_cap'       => true,
    ] );

    // ── Wrestler Note ─────────────────────────────────────────────────────────
    register_post_type( 'wrestler_note', [
        'labels' => [
            'name'               => 'Wrestler Notes',
            'singular_name'      => 'Wrestler Note',
            'add_new_item'       => 'Add New Note',
            'edit_item'          => 'Edit Note',
            'not_found'          => 'No wrestler notes found.',
        ],
        'public'             => false,
        'show_ui'            => true,
        'show_in_rest'       => true,
        'show_in_menu'       => true,
        'menu_icon'          => 'dashicons-edit',
        'supports'           => [ 'title', 'custom-fields' ],
        'has_archive'        => false,
        'capability_type'    => [ 'wrestler_note', 'wrestler_notes' ],
        'map_meta_cap'       => true,
    ] );

    // ── Scouting Report ───────────────────────────────────────────────────────
    register_post_type( 'scouting_report', [
        'labels' => [
            'name'               => 'Scouting Reports',
            'singular_name'      => 'Scouting Report',
            'add_new_item'       => 'Add New Scouting Report',
            'edit_item'          => 'Edit Scouting Report',
            'not_found'          => 'No scouting reports found.',
        ],
        'public'             => false,
        'show_ui'            => true,
        'show_in_rest'       => true,
        'show_in_menu'       => true,
        'menu_icon'          => 'dashicons-visibility',
        'supports'           => [ 'title', 'custom-fields' ],
        'has_archive'        => false,
        'capability_type'    => [ 'scouting_report', 'scouting_reports' ],
        'map_meta_cap'       => true,
    ] );

    // ── Taxonomy: Technique Category ──────────────────────────────────────────
    register_taxonomy( 'technique_category', 'technique', [
        'labels' => [
            'name'          => 'Technique Categories',
            'singular_name' => 'Technique Category',
            'search_items'  => 'Search Categories',
            'all_items'     => 'All Categories',
            'edit_item'     => 'Edit Category',
            'add_new_item'  => 'Add New Category',
        ],
        'hierarchical'      => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'rewrite'           => [ 'slug' => 'technique-category' ],
    ] );

    // ── Taxonomy: Wrestler Role ───────────────────────────────────────────────
    register_taxonomy( 'wrestler_role', 'wrestler', [
        'labels' => [
            'name'          => 'Roles',
            'singular_name' => 'Role',
            'all_items'     => 'All Roles',
        ],
        'hierarchical'      => false,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'rewrite'           => false,
    ] );

    // Flush rewrite rules only once after CPT registration (not on every request).
    if ( get_option( 'wrestling_flush_rewrite' ) ) {
        flush_rewrite_rules();
        delete_option( 'wrestling_flush_rewrite' );
    }
}

// Set flag to flush rewrite rules on plugin activation.
register_activation_hook( WRESTLING_CORE_DIR . 'wrestling-core.php', function () {
    add_option( 'wrestling_flush_rewrite', true );
} );
