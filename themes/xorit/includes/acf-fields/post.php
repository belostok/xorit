<?php

use xoritTheme\Constants\Constants;

acf_add_local_field_group(
	array(
		'key'                   => 'group_696b694274687',
		'title'                 => esc_attr__( 'Настройки страницы', 'xorit' ),
		'fields'                => array(
			array(
				'key'                   => 'field_696b69436c2b3',
				'label'                 => esc_attr__( 'Цвет бэкграунда', 'xorit' ),
				'name'                  => Constants::ACF_FIELD_PAGE . '_background',
				'aria-label'            => '',
				'type'                  => 'color_picker',
				'instructions'          => '',
				'required'              => 0,
				'conditional_logic'     => 0,
				'wrapper'               => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
				'default_value'         => '',
				'enable_opacity'        => 0,
				'return_format'         => 'string',
				'allow_in_bindings'     => 0,
				'show_custom_palette'   => 0,
				'show_color_wheel'      => 1,
				'custom_palette_source' => '',
				'palette_colors'        => '',
			),
		),
		'location'              => array(
			array(
				array(
					'param'    => 'post_type',
					'operator' => '==',
					'value'    => 'page',
				),
			),
		),
		'menu_order'            => 0,
		'position'              => 'side',
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
