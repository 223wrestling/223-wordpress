<?php
/**
 * ACF field group for the Scouting Report CPT.
 */

defined( 'ABSPATH' ) || exit;

acf_add_local_field_group( [
    'key'      => 'group_scouting_report',
    'title'    => 'Scouting Report Details',
    'location' => [ [ [ 'param' => 'post_type', 'operator' => '==', 'value' => 'scouting_report' ] ] ],
    'position' => 'normal',
    'fields'   => [

        [
            'key'            => 'field_scouting_report_date',
            'label'          => 'Date',
            'name'           => 'date',
            'type'           => 'date_picker',
            'display_format' => 'F j, Y',
            'return_format'  => 'Y-m-d',
        ],

        [
            'key'          => 'field_scouting_report_wrestlers',
            'label'        => 'Opponents',
            'name'         => 'wrestlers',
            'type'         => 'repeater',
            'button_label' => 'Add Opponent',
            'layout'       => 'block',
            'sub_fields'   => [
                [
                    'key'   => 'field_scouting_wrestler_weight',
                    'label' => 'Weight Class',
                    'name'  => 'weight_class',
                    'type'  => 'text',
                ],
                [
                    'key'   => 'field_scouting_wrestler_name',
                    'label' => 'Name',
                    'name'  => 'name',
                    'type'  => 'text',
                ],
                [
                    'key'   => 'field_scouting_wrestler_record',
                    'label' => 'Record',
                    'name'  => 'record',
                    'type'  => 'text',
                    'placeholder' => 'e.g. 12-3',
                ],
                [
                    'key'   => 'field_scouting_wrestler_style',
                    'label' => 'Style',
                    'name'  => 'style',
                    'type'  => 'textarea',
                    'rows'  => 2,
                ],
                [
                    'key'   => 'field_scouting_wrestler_notes',
                    'label' => 'Notes',
                    'name'  => 'notes',
                    'type'  => 'textarea',
                    'rows'  => 3,
                ],
            ],
        ],

    ],
] );
