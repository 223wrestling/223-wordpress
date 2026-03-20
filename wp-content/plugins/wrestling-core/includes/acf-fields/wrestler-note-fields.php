<?php
/**
 * ACF field group for the Wrestler Note CPT.
 */

defined( 'ABSPATH' ) || exit;

acf_add_local_field_group( [
    'key'      => 'group_wrestler_note',
    'title'    => 'Wrestler Note Details',
    'location' => [ [ [ 'param' => 'post_type', 'operator' => '==', 'value' => 'wrestler_note' ] ] ],
    'position' => 'normal',
    'fields'   => [

        [
            'key'           => 'field_wrestler_note_wrestler',
            'label'         => 'Wrestler',
            'name'          => 'wrestler',
            'type'          => 'relationship',
            'post_type'     => [ 'wrestler' ],
            'filters'       => [ 'search' ],
            'max'           => 1,
            'return_format' => 'id',
        ],

        [
            'key'            => 'field_wrestler_note_date',
            'label'          => 'Date',
            'name'           => 'date',
            'type'           => 'date_picker',
            'display_format' => 'F j, Y',
            'return_format'  => 'Y-m-d',
        ],

        [
            'key'   => 'field_wrestler_note_strengths',
            'label' => 'Strengths',
            'name'  => 'strengths',
            'type'  => 'textarea',
            'rows'  => 4,
        ],

        [
            'key'   => 'field_wrestler_note_areas_to_improve',
            'label' => 'Areas to Improve',
            'name'  => 'areas_to_improve',
            'type'  => 'textarea',
            'rows'  => 4,
        ],

        [
            'key'   => 'field_wrestler_note_notes',
            'label' => 'Notes',
            'name'  => 'notes',
            'type'  => 'textarea',
            'rows'  => 4,
        ],

    ],
] );
