<?php
/**
 * Relationship hooks for 223 Wrestling.
 *
 * Hook 1: Bidirectional technique relationships.
 *   When technique A lists B as related, B automatically lists A as related.
 *   When A removes B, B's back-reference is also removed.
 *
 * Hook 2: Appears-in-flowcharts.
 *   When a Flowchart post is saved, all referenced Technique posts are updated
 *   with this flowchart ID in their appears_in_flowcharts field.
 */

defined( 'ABSPATH' ) || exit;

// ── Hook 1: Bidirectional technique relationships ─────────────────────────────

add_action( 'acf/save_post', 'wrestling_sync_related_techniques', 20 );

function wrestling_sync_related_techniques( int $post_id ): void {
    if ( get_post_type( $post_id ) !== 'technique' ) {
        return;
    }

    // Guard against infinite recursion when the hook fires on the other technique.
    static $running = [];
    if ( isset( $running[ $post_id ] ) ) {
        return;
    }
    $running[ $post_id ] = true;
    try {
        // IDs this technique currently lists as related (already saved by ACF).
        $related_ids = get_field( 'related_techniques', $post_id ) ?: [];
        $related_ids = array_map( 'intval', (array) $related_ids );

        // For each related technique, ensure this post appears in its list.
        foreach ( $related_ids as $other_id ) {
            if ( ! $other_id ) {
                continue;
            }
            $other_related = get_field( 'related_techniques', $other_id ) ?: [];
            $other_related = array_map( 'intval', (array) $other_related );

            if ( ! in_array( $post_id, $other_related, true ) ) {
                $other_related[] = $post_id;
                update_field( 'related_techniques', $other_related, $other_id );
            }
        }

        // Find all techniques that still reference this post but are no longer in our list.
        // Query by serialized ACF meta value (ACF stores relationship as serialized PHP string).
        $referencing = get_posts( [
            'post_type'      => 'technique',
            'posts_per_page' => -1,
            'post__not_in'   => [ $post_id ],
            'fields'         => 'ids',
            'meta_query'     => [ [
                'key'     => 'related_techniques',
                'value'   => '"' . $post_id . '"',
                'compare' => 'LIKE',
            ] ],
        ] );

        foreach ( $referencing as $other_id ) {
            if ( in_array( $other_id, $related_ids, true ) ) {
                continue; // Still related — leave it.
            }
            // Remove back-reference.
            $other_related = get_field( 'related_techniques', $other_id ) ?: [];
            $other_related = array_map( 'intval', (array) $other_related );
            $other_related = array_values( array_filter( $other_related, fn( $id ) => $id !== $post_id ) );
            update_field( 'related_techniques', $other_related, $other_id );
        }
    } finally {
        unset( $running[ $post_id ] );
    }
}

// ── Hook 2: Appears-in-flowcharts ────────────────────────────────────────────

add_action( 'acf/save_post', 'wrestling_sync_appears_in_flowcharts', 20 );

function wrestling_sync_appears_in_flowcharts( int $post_id ): void {
    if ( get_post_type( $post_id ) !== 'flowchart' ) {
        return;
    }

    // Collect all technique IDs referenced by this flowchart.
    $technique_ids = [];

    // Root node field.
    $root = get_field( 'root_node', $post_id );
    $root = array_map( 'intval', (array) $root );
    $technique_ids = array_merge( $technique_ids, array_filter( $root ) );

    // Nodes inside chart_data JSON.
    $chart_json = get_field( 'chart_data', $post_id );
    if ( $chart_json ) {
        $chart = json_decode( $chart_json, true );
        if ( is_array( $chart ) && isset( $chart['nodes'] ) ) {
            foreach ( $chart['nodes'] as $node ) {
                if ( ! empty( $node['techniqueId'] ) ) {
                    $technique_ids[] = intval( $node['techniqueId'] );
                }
            }
        }
    }

    $technique_ids = array_values( array_unique( array_filter( $technique_ids ) ) );

    // Clear this flowchart from all techniques that currently reference it.
    $previously_linked = get_posts( [
        'post_type'      => 'technique',
        'posts_per_page' => -1,
        'fields'         => 'ids',
        'meta_query'     => [ [
            'key'     => 'appears_in_flowcharts',
            'value'   => '"' . $post_id . '"',
            'compare' => 'LIKE',
        ] ],
    ] );

    foreach ( $previously_linked as $tech_id ) {
        $current = get_field( 'appears_in_flowcharts', $tech_id ) ?: [];
        $current = array_map( 'intval', (array) $current );
        $current = array_values( array_filter( $current, fn( $id ) => $id !== $post_id ) );
        update_field( 'appears_in_flowcharts', $current, $tech_id );
    }

    // Write this flowchart ID to all currently referenced techniques.
    foreach ( $technique_ids as $tech_id ) {
        $current = get_field( 'appears_in_flowcharts', $tech_id ) ?: [];
        $current = array_map( 'intval', (array) $current );
        if ( ! in_array( $post_id, $current, true ) ) {
            $current[] = $post_id;
            update_field( 'appears_in_flowcharts', $current, $tech_id );
        }
    }
}
