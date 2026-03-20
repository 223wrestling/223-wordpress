<?php
/**
 * User roles and capabilities for 223 Wrestling.
 */

defined( 'ABSPATH' ) || exit;

/**
 * Register the Coach role with capabilities for all wrestling CPTs.
 * Called on plugin activation and on init (in case role was removed).
 */
function wrestling_register_coach_role(): void {
    // Build capability set for each CPT.
    $cpts = [
        [ 'technique',      'techniques' ],
        [ 'flowchart',      'flowcharts' ],
        [ 'wrestler',       'wrestlers' ],
        [ 'practice_plan',  'practice_plans' ],
        [ 'wrestler_note',  'wrestler_notes' ],
        [ 'scouting_report','scouting_reports' ],
    ];

    $caps = [
        'read'         => true,
        'upload_files' => true,
    ];

    foreach ( $cpts as [ $singular, $plural ] ) {
        $caps[ "edit_{$singular}" ]            = true;
        $caps[ "read_{$singular}" ]            = true;
        $caps[ "delete_{$singular}" ]          = true;
        $caps[ "edit_{$plural}" ]              = true;
        $caps[ "edit_others_{$plural}" ]       = true;
        $caps[ "publish_{$plural}" ]           = true;
        $caps[ "read_private_{$plural}" ]      = true;
        $caps[ "delete_{$plural}" ]            = true;
        $caps[ "delete_others_{$plural}" ]     = true;
        $caps[ "delete_published_{$plural}" ]  = true;
        $caps[ "delete_private_{$plural}" ]    = true;
        $caps[ "edit_published_{$plural}" ]    = true;
        $caps[ "edit_private_{$plural}" ]      = true;
    }

    // Remove the role first in case capabilities have changed since last activation.
    remove_role( 'coach' );

    add_role( 'coach', 'Coach', $caps );
}

// Register on activation.
register_activation_hook( WRESTLING_CORE_DIR . 'wrestling-core.php', 'wrestling_register_coach_role' );

// Also register on init so the role exists even after a database wipe / fresh WP install.
add_action( 'init', function () {
    if ( ! get_role( 'coach' ) ) {
        wrestling_register_coach_role();
    }
} );
