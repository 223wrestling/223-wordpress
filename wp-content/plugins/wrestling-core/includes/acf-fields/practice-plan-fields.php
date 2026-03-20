<?php
/**
 * ACF field group for the Practice Plan CPT.
 */

defined( 'ABSPATH' ) || exit;

acf_add_local_field_group( [
    'key'      => 'group_practice_plan',
    'title'    => 'Practice Plan Details',
    'location' => [ [ [ 'param' => 'post_type', 'operator' => '==', 'value' => 'practice_plan' ] ] ],
    'position' => 'normal',
    'fields'   => [

        [
            'key'             => 'field_practice_plan_date',
            'label'           => 'Date',
            'name'            => 'date',
            'type'            => 'date_picker',
            'display_format'  => 'F j, Y',
            'return_format'   => 'Y-m-d',
        ],

        [
            'key'   => 'field_practice_plan_duration',
            'label' => 'Duration',
            'name'  => 'duration',
            'type'  => 'text',
            'placeholder' => '120 min',
        ],

        [
            'key'   => 'field_practice_plan_focus',
            'label' => 'Focus',
            'name'  => 'focus',
            'type'  => 'text',
            'placeholder' => 'e.g. Takedowns',
        ],

        [
            'key'   => 'field_practice_plan_warmup',
            'label' => 'Warmup',
            'name'  => 'warmup',
            'type'  => 'textarea',
            'rows'  => 3,
        ],

        [
            'key'          => 'field_practice_plan_technique_drills',
            'label'        => 'Technique Drills',
            'name'         => 'technique_drills',
            'type'         => 'repeater',
            'button_label' => 'Add Drill',
            'layout'       => 'block',
            'sub_fields'   => [
                [
                    'key'   => 'field_practice_plan_drill_name',
                    'label' => 'Drill',
                    'name'  => 'drill',
                    'type'  => 'text',
                ],
                [
                    'key'   => 'field_practice_plan_drill_duration',
                    'label' => 'Duration',
                    'name'  => 'duration',
                    'type'  => 'text',
                    'placeholder' => '15 min',
                ],
                [
                    'key'   => 'field_practice_plan_drill_notes',
                    'label' => 'Notes',
                    'name'  => 'notes',
                    'type'  => 'textarea',
                    'rows'  => 2,
                ],
            ],
        ],

        [
            'key'   => 'field_practice_plan_live_wrestling',
            'label' => 'Live Wrestling',
            'name'  => 'live_wrestling',
            'type'  => 'textarea',
            'rows'  => 3,
        ],

        [
            'key'   => 'field_practice_plan_conditioning',
            'label' => 'Conditioning',
            'name'  => 'conditioning',
            'type'  => 'textarea',
            'rows'  => 3,
        ],

        [
            'key'   => 'field_practice_plan_notes',
            'label' => 'Notes',
            'name'  => 'notes',
            'type'  => 'textarea',
            'rows'  => 4,
        ],

        [
            'key'           => 'field_practice_plan_pdf',
            'label'         => 'PDF Attachment',
            'name'          => 'pdf_attachment',
            'type'          => 'file',
            'return_format' => 'id',
            'library'       => 'all',
            'mime_types'    => 'pdf',
        ],

    ],
] );
