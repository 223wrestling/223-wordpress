<?php
/**
 * ACF field group for the Technique CPT.
 */

defined( 'ABSPATH' ) || exit;

acf_add_local_field_group( [
    'key'      => 'group_technique',
    'title'    => 'Technique Details',
    'location' => [ [ [ 'param' => 'post_type', 'operator' => '==', 'value' => 'technique' ] ] ],
    'position' => 'normal',
    'fields'   => [

        [
            'key'   => 'field_technique_description',
            'label' => 'Description',
            'name'  => 'description',
            'type'  => 'textarea',
            'rows'  => 5,
            'instructions' => 'Coaching points: starting position, key steps, finish.',
        ],

        [
            'key'          => 'field_technique_critical',
            'label'        => 'Critical / Foundational',
            'name'         => 'critical',
            'type'         => 'true_false',
            'message'      => 'Mark this as a foundational technique (displays ★ in the UI)',
            'default_value'=> 0,
            'ui'           => 1,
        ],

        [
            'key'          => 'field_technique_key_points',
            'label'        => 'Key Points',
            'name'         => 'key_points',
            'type'         => 'repeater',
            'button_label' => 'Add Key Point',
            'min'          => 0,
            'layout'       => 'table',
            'sub_fields'   => [
                [
                    'key'   => 'field_technique_key_point_text',
                    'label' => 'Point',
                    'name'  => 'point',
                    'type'  => 'text',
                ],
            ],
        ],

        [
            'key'          => 'field_technique_common_mistakes',
            'label'        => 'Common Mistakes',
            'name'         => 'common_mistakes',
            'type'         => 'repeater',
            'button_label' => 'Add Mistake',
            'min'          => 0,
            'layout'       => 'table',
            'sub_fields'   => [
                [
                    'key'   => 'field_technique_common_mistake_text',
                    'label' => 'Mistake',
                    'name'  => 'mistake',
                    'type'  => 'text',
                ],
            ],
        ],

        [
            'key'          => 'field_technique_videos',
            'label'        => 'Videos',
            'name'         => 'videos',
            'type'         => 'repeater',
            'button_label' => 'Add Video',
            'min'          => 0,
            'layout'       => 'block',
            'sub_fields'   => [
                [
                    'key'   => 'field_technique_video_url',
                    'label' => 'URL',
                    'name'  => 'url',
                    'type'  => 'url',
                ],
                [
                    'key'   => 'field_technique_video_label',
                    'label' => 'Label (optional)',
                    'name'  => 'label',
                    'type'  => 'text',
                ],
            ],
        ],

        [
            'key'           => 'field_technique_related_techniques',
            'label'         => 'Related Techniques',
            'name'          => 'related_techniques',
            'type'          => 'relationship',
            'post_type'     => [ 'technique' ],
            'filters'       => [ 'search' ],
            'return_format' => 'id',
            'instructions'  => 'Bidirectional — adding a technique here automatically adds this technique to its related list.',
        ],

        [
            'key'           => 'field_technique_appears_in_flowcharts',
            'label'         => 'Appears In Flowcharts',
            'name'          => 'appears_in_flowcharts',
            'type'          => 'relationship',
            'post_type'     => [ 'flowchart' ],
            'return_format' => 'id',
            'instructions'  => 'Auto-populated when a Flowchart is saved. Do not edit manually.',
            'wrapper'       => [ 'class' => 'acf-readonly' ],
        ],

    ],
] );
