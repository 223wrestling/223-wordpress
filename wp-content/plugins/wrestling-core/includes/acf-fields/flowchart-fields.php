<?php
/**
 * ACF field group for the Flowchart CPT.
 */

defined( 'ABSPATH' ) || exit;

acf_add_local_field_group( [
    'key'      => 'group_flowchart',
    'title'    => 'Flowchart Details',
    'location' => [ [ [ 'param' => 'post_type', 'operator' => '==', 'value' => 'flowchart' ] ] ],
    'position' => 'normal',
    'fields'   => [

        [
            'key'           => 'field_flowchart_root_node',
            'label'         => 'Root Node (Starting Technique)',
            'name'          => 'root_node',
            'type'          => 'relationship',
            'post_type'     => [ 'technique' ],
            'filters'       => [ 'search' ],
            'max'           => 1,
            'return_format' => 'id',
            'instructions'  => 'The technique at the top/start of this flowchart.',
        ],

        [
            'key'          => 'field_flowchart_chart_data',
            'label'        => 'Chart Data (JSON)',
            'name'         => 'chart_data',
            'type'         => 'textarea',
            'rows'         => 10,
            'instructions' => 'Managed by the visual flowchart builder. Do not edit manually. Technique references are stored as WordPress post IDs.',
            'wrapper'      => [ 'class' => 'acf-readonly' ],
        ],

    ],
] );
