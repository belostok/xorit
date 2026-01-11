<?php

use xoritTheme\Constants\Constants;
use function xoritTheme\ACF\FieldSets\get_simple_banner_fields;
use function xoritTheme\ACF\FieldSets\get_stack_fields;
use function xoritTheme\ACF\FieldSets\get_request_fields;
use function xoritTheme\ACF\FieldSets\get_services_fields;
use function xoritTheme\ACF\FieldSets\get_faq_fields;
use function xoritTheme\ACF\FieldSets\get_advantages_fields;
use function xoritTheme\ACF\FieldSets\get_hero_fields;
use function xoritTheme\ACF\FieldSets\get_infofraph_fields;

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

			// Cards
			array(
				'key'               => 'field_692c867bc9f13' . $suffix,
				'label'             => esc_attr__( 'Карточки', 'xorit' ),
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
				'key'               => 'field_68fc79681xkjt' . $suffix,
				'label'             => esc_attr__( 'Скрыть блок', 'xorit' ),
				'name'              => Constants::ACF_FIELD_SERVICES . '_cards_hide',
				'aria-label'        => '',
				'type'              => 'true_false',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
				'message'           => '',
				'default_value'     => 0,
				'allow_in_bindings' => 0,
				'ui_on_text'        => '',
				'ui_off_text'       => '',
				'ui'                => 1,
			),
			array(
				'key'               => 'field_692c86a4c9f14' . $suffix,
				'label'             => esc_attr__( 'Карточки', 'xorit' ),
				'name'              => Constants::ACF_FIELD_SERVICES . '_cards_items',
				'aria-label'        => '',
				'type'              => 'repeater',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
				'layout'            => 'table',
				'pagination'        => 0,
				'min'               => 0,
				'max'               => 0,
				'collapsed'         => '',
				'button_label'      => esc_attr__( 'Добавить', 'xorit' ),
				'rows_per_page'     => 20,
				'sub_fields'        => array(
					array(
						'key'               => 'field_692c86dfc9f15' . $suffix,
						'label'             => esc_attr__( 'Изображение', 'xorit' ),
						'name'              => 'image',
						'aria-label'        => '',
						'type'              => 'image',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '20',
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
						'parent_repeater'   => 'field_692c86a4c9f14' . $suffix,
					),
					array(
						'key'               => 'field_692c8702c9f16' . $suffix,
						'label'             => esc_attr__( 'Заголовок', 'xorit' ),
						'name'              => 'title',
						'aria-label'        => '',
						'type'              => 'textarea',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => '',
							'id'    => '',
						),
						'default_value'     => '',
						'maxlength'         => 250,
						'allow_in_bindings' => 0,
						'rows'              => 4,
						'placeholder'       => '',
						'new_lines'         => 'br',
						'parent_repeater'   => 'field_692c86a4c9f14' . $suffix,
					),
					array(
						'key'               => 'field_692c8702c9kn5' . $suffix,
						'label'             => esc_attr__( 'Описание', 'xorit' ),
						'name'              => 'description',
						'aria-label'        => '',
						'type'              => 'textarea',
						'instructions'      => '',
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
						'rows'              => 4,
						'placeholder'       => '',
						'new_lines'         => 'br',
						'parent_repeater'   => 'field_692c86a4c9f14' . $suffix,
					),
				),
			),

			// Child services
			array(
				'key'               => 'field_6945537ea522a' . $suffix,
				'label'             => esc_attr__( 'Дочерние услуги', 'xorit' ),
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
				'key'               => 'field_6945542ea522c' . $suffix,
				'label'             => esc_attr__( 'Скрыть блок', 'xorit' ),
				'name'              => Constants::ACF_FIELD_SERVICES . '_child_hide',
				'aria-label'        => '',
				'type'              => 'true_false',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
				'message'           => '',
				'default_value'     => 0,
				'allow_in_bindings' => 0,
				'ui_on_text'        => '',
				'ui_off_text'       => '',
				'ui'                => 1,
			),
			array(
				'key'               => 'field_69455466a522d' . $suffix,
				'label'             => esc_attr__( 'Заголовок', 'xorit' ),
				'name'              => Constants::ACF_FIELD_SERVICES . '_child_title',
				'aria-label'        => '',
				'type'              => 'textarea',
				'instructions'      => '',
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
				'rows'              => 4,
				'placeholder'       => '',
				'new_lines'         => 'br',
			),
			array(
				'key'               => 'field_69455496a522e' . $suffix,
				'label'             => esc_attr__( 'Описание', 'xorit' ),
				'name'              => Constants::ACF_FIELD_SERVICES . '_child_description',
				'aria-label'        => '',
				'type'              => 'textarea',
				'instructions'      => '',
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
				'rows'              => 4,
				'placeholder'       => '',
				'new_lines'         => 'br',
			),
			array(
				'key'               => 'field_6945539fa522b' . $suffix,
				'label'             => esc_attr__( 'Дочерние услуги', 'xorit' ),
				'name'              => Constants::ACF_FIELD_SERVICES . '_child_services',
				'aria-label'        => '',
				'type'              => 'select',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
				'choices'           => array(),
				'default_value'     => array(),
				'return_format'     => 'value',
				'multiple'          => 1,
				'allow_null'        => 1,
				'allow_in_bindings' => 0,
				'ui'                => 1,
				'ajax'              => 0,
				'create_options'    => 0,
				'placeholder'       => '',
				'save_options'      => 0,
			),

			// Infographic
			...get_infofraph_fields( Constants::ACF_FIELD_SERVICES ),

			// Services
			...get_faq_fields(
				Constants::ACF_FIELD_SERVICES . '_services',
				array(
					'tab_title'          => esc_attr__( 'Направления', 'xorit' ),
					'title_instructions' => '',
					'items_instructions' => '',
				)
			),

			// Advantages
			...get_advantages_fields(
				Constants::ACF_FIELD_SERVICES,
				array(
					'hide_images' => true,
					'image_width' => '100',
				)
			),

			// Steps
			array(
				'key'               => 'field_6932e846e4996' . $suffix,
				'label'             => esc_attr__( 'Шаги', 'xorit' ),
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
				'key'               => 'field_6932e858e4997' . $suffix,
				'label'             => esc_attr__( 'Скрыть блок', 'xorit' ),
				'name'              => Constants::ACF_FIELD_SERVICES . '_steps_hide',
				'aria-label'        => '',
				'type'              => 'true_false',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
				'message'           => '',
				'default_value'     => 0,
				'allow_in_bindings' => 0,
				'ui_on_text'        => '',
				'ui_off_text'       => '',
				'ui'                => 1,
			),
			array(
				'key'               => 'field_6932e89ee4998' . $suffix,
				'label'             => esc_attr__( 'Изображение', 'xorit' ),
				'name'              => Constants::ACF_FIELD_SERVICES . '_steps_image',
				'aria-label'        => '',
				'type'              => 'image',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '',
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
				'key'               => 'field_6932e8d8e4jk5' . $suffix,
				'label'             => esc_attr__( 'Заголовок', 'xorit' ),
				'name'              => Constants::ACF_FIELD_SERVICES . '_steps_title',
				'aria-label'        => '',
				'type'              => 'textarea',
				'instructions'      => '',
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
				'key'               => 'field_6932e8bce4999' . $suffix,
				'label'             => esc_attr__( 'Шаги', 'xorit' ),
				'name'              => Constants::ACF_FIELD_SERVICES . '_steps_items',
				'aria-label'        => '',
				'type'              => 'repeater',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
				'layout'            => 'row',
				'pagination'        => 0,
				'min'               => 0,
				'max'               => 0,
				'collapsed'         => '',
				'button_label'      => esc_attr__( 'Добавить', 'xorit' ),
				'rows_per_page'     => 20,
				'sub_fields'        => array(
					array(
						'key'               => 'field_6932e8d8e499a' . $suffix,
						'label'             => esc_attr__( 'Заголовок', 'xorit' ),
						'name'              => 'title',
						'aria-label'        => '',
						'type'              => 'textarea',
						'instructions'      => '',
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
						'parent_repeater'   => 'field_6932e8bce4999' . $suffix,
					),
					array(
						'key'               => 'field_6932e90ee499b' . $suffix,
						'label'             => esc_attr__( 'Описание', 'xorit' ),
						'name'              => 'description',
						'aria-label'        => '',
						'type'              => 'textarea',
						'instructions'      => '',
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
						'rows'              => 4,
						'placeholder'       => '',
						'new_lines'         => 'br',
						'parent_repeater'   => 'field_6932e8bce4999' . $suffix,
					),
				),
			),

			// Simple banner
			...get_simple_banner_fields( Constants::ACF_FIELD_SERVICES ),

			// Three cards
			array(
				'key'               => 'field_6933d636329ca' . $suffix,
				'label'             => esc_attr__( 'Три карточки', 'xorit' ),
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
				'key'               => 'field_6933d64f329cb' . $suffix,
				'label'             => esc_attr__( 'Скрыть блок', 'xorit' ),
				'name'              => Constants::ACF_FIELD_SERVICES . '_three_cards_hide',
				'aria-label'        => '',
				'type'              => 'true_false',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
				'message'           => '',
				'default_value'     => 0,
				'allow_in_bindings' => 0,
				'ui_on_text'        => '',
				'ui_off_text'       => '',
				'ui'                => 1,
			),
			array(
				'key'               => 'field_6933d730329cc' . $suffix,
				'label'             => esc_attr__( 'Карточки', 'xorit' ),
				'name'              => Constants::ACF_FIELD_SERVICES . '_three_cards_items',
				'aria-label'        => '',
				'type'              => 'repeater',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
				'layout'            => 'row',
				'pagination'        => 0,
				'min'               => 0,
				'max'               => 0,
				'collapsed'         => '',
				'button_label'      => esc_attr__( 'Добавить', 'xorit' ),
				'rows_per_page'     => 20,
				'sub_fields'        => array(
					array(
						'key'               => 'field_6933d75f329cd' . $suffix,
						'label'             => esc_attr__( 'Заголовок', 'xorit' ),
						'name'              => 'title',
						'aria-label'        => '',
						'type'              => 'text',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => '',
							'id'    => '',
						),
						'default_value'     => '',
						'maxlength'         => 150,
						'allow_in_bindings' => 0,
						'placeholder'       => '',
						'prepend'           => '',
						'append'            => '',
						'parent_repeater'   => 'field_6933d730329cc' . $suffix,
					),
					array(
						'key'               => 'field_6933d782329ce',
						'label'             => esc_attr__( 'Подзаголовок', 'xorit' ),
						'name'              => 'sub_title',
						'aria-label'        => '',
						'type'              => 'textarea',
						'instructions'      => '',
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
						'parent_repeater'   => 'field_6933d730329cc' . $suffix,
					),
					array(
						'key'               => 'field_6933d80b329cf' . $suffix,
						'label'             => esc_attr__( 'Описание', 'xorit' ),
						'name'              => 'description',
						'aria-label'        => '',
						'type'              => 'textarea',
						'instructions'      => '',
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
						'rows'              => 4,
						'placeholder'       => '',
						'new_lines'         => 'br',
						'parent_repeater'   => 'field_6933d730329cc' . $suffix,
					),
				),
			),

			// Logo groups
			array(
				'key'               => 'field_6933d84a911e9' . $suffix,
				'label'             => esc_attr__( 'Группы логотипов', 'xorit' ),
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
				'key'               => 'field_6933d909911ec' . $suffix,
				'label'             => esc_attr__( 'Скрыть блок', 'xorit' ),
				'name'              => Constants::ACF_FIELD_SERVICES . '_logo_groups_hide',
				'aria-label'        => '',
				'type'              => 'true_false',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
				'message'           => '',
				'default_value'     => 0,
				'allow_in_bindings' => 0,
				'ui_on_text'        => '',
				'ui_off_text'       => '',
				'ui'                => 1,
			),
			array(
				'key'               => 'field_6933d8ac911eb' . $suffix,
				'label'             => esc_attr__( 'Группы', 'xorit' ),
				'name'              => Constants::ACF_FIELD_SERVICES . '_logo_groups_groups',
				'aria-label'        => '',
				'type'              => 'repeater',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
				'layout'            => 'row',
				'pagination'        => 0,
				'min'               => 0,
				'max'               => 0,
				'collapsed'         => '',
				'button_label'      => esc_attr__( 'Добавить', 'xorit' ),
				'rows_per_page'     => 20,
				'sub_fields'        => array(
					array(
						'key'               => 'field_6933d863911ea' . $suffix,
						'label'             => esc_attr__( 'Заголовок', 'xorit' ),
						'name'              => 'title',
						'aria-label'        => '',
						'type'              => 'textarea',
						'instructions'      => '',
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
						'parent_repeater'   => 'field_6933d8ac911eb' . $suffix,
					),
					array(
						'key'               => 'field_6933d930911ed' . $suffix,
						'label'             => esc_attr__( 'Логотипы', 'xorit' ),
						'name'              => 'items',
						'aria-label'        => '',
						'type'              => 'repeater',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => '',
							'id'    => '',
						),
						'layout'            => 'table',
						'pagination'        => 0,
						'min'               => 0,
						'max'               => 0,
						'collapsed'         => '',
						'button_label'      => esc_attr__( 'Добавить', 'xorit' ),
						'rows_per_page'     => 20,
						'sub_fields'        => array(
							array(
								'key'               => 'field_6933d951911ee' . $suffix,
								'label'             => esc_attr__( 'Логотип', 'xorit' ),
								'name'              => 'image',
								'aria-label'        => '',
								'type'              => 'image',
								'instructions'      => '',
								'required'          => 0,
								'conditional_logic' => 0,
								'wrapper'           => array(
									'width' => '',
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
								'parent_repeater'   => 'field_6933d930911ed' . $suffix,
							),
						),
						'parent_repeater'   => 'field_6933d8ac911eb' . $suffix,
					),
				),
			),

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
				array(
					'param'    => 'post_parent',
					'operator' => '==',
					'value'    => '0',
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

/**
 * Populate child services field with children posts of the current post
 */
add_filter(
	'acf/load_field/name=' . Constants::ACF_FIELD_SERVICES . '_child_services',
	function ( $field ) {
		// Reset choices
		$field['choices'] = [];

		// Get current post ID
		$post_id = 0;

		// phpcs:disable
		if ( isset( $_GET['post'] ) ) {
			$post_id = absint( $_GET['post'] );
		} elseif ( isset( $_POST['post_ID'] ) ) {
			$post_id = absint( $_POST['post_ID'] );
		}
		// phpcs:enable

		// If no post ID, return field as is
		if ( ! $post_id ) {
			return $field;
		}

		// Verify this is a services post
		if ( get_post_type( $post_id ) !== Constants::PT_SLUG_SERVICES ) {
			return $field;
		}

		// Get children posts
		$args = [
			'post_type'      => Constants::PT_SLUG_SERVICES,
			'post_parent'    => $post_id,
			'posts_per_page' => 100,
			'orderby'        => 'menu_order title',
			'order'          => 'ASC',
			'post_status'    => [ 'publish', 'draft', 'pending' ],
		];

		$children = get_posts( $args );

		// Populate choices with child posts
		if ( ! empty( $children ) && ! is_wp_error( $children ) ) {
			foreach ( $children as $child ) {
				if ( ! $child instanceof \WP_Post ) {
					continue;
				}

				$status_label = '';
				if ( 'draft' === $child->post_status ) {
					$status_label = ' [' . esc_attr__( 'Черновик', 'xorit' ) . ']';
				} elseif ( 'pending' === $child->post_status ) {
					$status_label = ' [' . esc_attr__( 'Ожидает', 'xorit' ) . ']';
				}

				$field['choices'][ $child->ID ] = esc_html( $child->post_title ) . $status_label;
			}
		}

		return $field;
	}
);

