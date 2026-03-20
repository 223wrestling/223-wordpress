<?php
/**
 * ACF field group for the Wrestler CPT.
 */

defined( 'ABSPATH' ) || exit;

acf_add_local_field_group( [
    'key'      => 'group_wrestler',
    'title'    => 'Wrestler / Coach Details',
    'location' => [ [ [ 'param' => 'post_type', 'operator' => '==', 'value' => 'wrestler' ] ] ],
    'position' => 'normal',
    'fields'   => [

        [
            'key'     => 'field_wrestler_weight_class',
            'label'   => 'Weight Class',
            'name'    => 'weight_class',
            'type'    => 'select',
            'choices' => [
                '106' => '106', '113' => '113', '120' => '120',
                '126' => '126', '132' => '132', '138' => '138',
                '144' => '144', '150' => '150', '157' => '157',
                '165' => '165', '175' => '175', '190' => '190',
                '215' => '215', '285' => '285',
            ],
            'allow_null'    => 1,
            'default_value' => '',
            'instructions'  => 'Leave blank for coaches and staff.',
        ],

        [
            'key'     => 'field_wrestler_year',
            'label'   => 'Year',
            'name'    => 'year',
            'type'    => 'select',
            'choices' => [
                'Freshman'  => 'Freshman',
                'Sophomore' => 'Sophomore',
                'Junior'    => 'Junior',
                'Senior'    => 'Senior',
                '8th'       => '8th Grade',
                '7th'       => '7th Grade',
            ],
            'allow_null'    => 1,
            'default_value' => '',
            'instructions'  => 'Leave blank for coaches and staff.',
        ],

        [
            'key'          => 'field_wrestler_bio',
            'label'        => 'Bio',
            'name'         => 'bio',
            'type'         => 'textarea',
            'rows'         => 4,
            'instructions' => 'Used for coaches and staff. Leave blank for wrestlers.',
        ],

        [
            'key'           => 'field_wrestler_photo',
            'label'         => 'Photo',
            'name'          => 'photo',
            'type'          => 'image',
            'return_format' => 'id',
            'preview_size'  => 'thumbnail',
        ],

    ],
] );
