<?php

use xoritTheme\Constants\Constants;
use function xoritTheme\ACF\FieldSets\get_simple_banner_fields;
use function xoritTheme\ACF\FieldSets\get_stack_fields;
use function xoritTheme\ACF\FieldSets\get_request_fields;
use function xoritTheme\ACF\FieldSets\get_services_fields;
use function xoritTheme\ACF\FieldSets\get_faq_fields;
use function xoritTheme\ACF\FieldSets\get_advantages_fields;
use function xoritTheme\ACF\FieldSets\get_hero_fields;

$suffix = md5( Constants::ACF_FIELD_SERVICES );

acf_add_local_field_group(
	array(
		'key'                   => 'group_6929b81d53426' . $suffix,
		'title'                 => esc_attr__( 'Услуги', 'xorit' ),
		'fields'                => array(
			array(
				'key'               => 'field_6929b81dae954' . $suffix,
				'label'             => esc_attr__( 'Превью', 'xorit' ),
				'name'              => '',
				'aria-label'        => '',
				'type'              => 'tab',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
				'placement'         => 'left',
				'endpoint'          => 0,
				'selected'          => 0,
			),
			array(
				'key'               => 'field_68fc79c91cll9' . $suffix,
				'label'             => esc_attr__( 'Заголовок', 'xorit' ),
				'name'              => Constants::ACF_FIELD_SERVICES . '_preview_title',
				'aria-label'        => '',
				'type'              => 'textarea',
				'instructions'      => esc_attr__( 'Используется заголовок поста, если пусто', 'xorit' ),
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
				'default_value'     => '',
				'maxlength'         => '',
				'allow_in_bindings' => 0,
				'rows'              => 2,
				'placeholder'       => '',
				'new_lines'         => 'br',
			),
			array(
				'key'               => 'field_68fc817c1cne3' . $suffix,
				'label'             => esc_attr__( 'Изображение', 'xorit' ),
				'name'              => Constants::ACF_FIELD_SERVICES . '_preview_image',
				'aria-label'        => '',
				'type'              => 'image',
				'instructions'      => esc_attr__( 'Десктоп', 'xorit' ),
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '50',
					'class' => '',
					'id'    => '',
				),
				'return_format'     => 'id',
				'library'           => 'all',
				'min_width'         => '',
				'min_height'        => '',
				'min_size'          => '',
				'max_width'         => '',
				'max_height'        => '',
				'max_size'          => '',
				'mime_types'        => '',
				'allow_in_bindings' => 0,
				'preview_size'      => 'medium',
			),
			array(
				'key'               => 'field_68fc817c1cnmv' . $suffix,
				'label'             => esc_attr__( 'Изображение', 'xorit' ),
				'name'              => Constants::ACF_FIELD_SERVICES . '_preview_image_mobile',
				'aria-label'        => '',
				'type'              => 'image',
				'instructions'      => esc_attr__( 'Мобайл', 'xorit' ),
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '50',
					'class' => '',
					'id'    => '',
				),
				'return_format'     => 'id',
				'library'           => 'all',
				'min_width'         => '',
				'min_height'        => '',
				'min_size'          => '',
				'max_width'         => '',
				'max_height'        => '',
				'max_size'          => '',
				'mime_types'        => '',
				'allow_in_bindings' => 0,
				'preview_size'      => 'medium',
			),

			// Hero
			...get_hero_fields( Constants::ACF_FIELD_SERVICES ),

			// Advantages
			...get_advantages_fields(
				Constants::ACF_FIELD_SERVICES,
				array(
					'hide_images' => true,
				)
			),

			// Single banner
			...get_simple_banner_fields( Constants::ACF_FIELD_SERVICES ),

			// Stack
			...get_stack_fields( Constants::ACF_FIELD_SERVICES ),

			// Request
			...get_request_fields( Constants::ACF_FIELD_SERVICES ),

			// Services
			...get_services_fields( Constants::ACF_FIELD_SERVICES ),

			// FAQ
			...get_faq_fields( Constants::ACF_FIELD_SERVICES ),
		),
		'location'              => array(
			array(
				array(
					'param'    => 'post_type',
					'operator' => '==',
					'value'    => Constants::PT_SLUG_SERVICES,
				),
			),
		),
		'menu_order'            => 0,
		'position'              => 'normal',
		'style'                 => 'default',
		'label_placement'       => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen'        => '',
		'active'                => true,
		'description'           => '',
		'show_in_rest'          => 0,
		'display_title'         => '',
	)
);
