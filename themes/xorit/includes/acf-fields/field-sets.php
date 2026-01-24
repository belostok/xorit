<?php
/**
 * Reusable ACF Field Sets
 *
 * Contains functions that return common field configurations
 * that can be reused across multiple ACF field groups.
 *
 * @package xoritTheme
 */

namespace xoritTheme\ACF\FieldSets;

use xoritTheme\Constants\Constants;

/**
 * Get Simple Banner fields
 *
 * Returns an array of ACF fields for a simple banner section
 * with title, description, and CTA button.
 *
 * @param string $field_prefix Field name prefix (e.g., 'services', 'home').
 * @param array $args Optional. Additional arguments to customize fields.
 *
 * @return array Array of ACF field configurations.
 */
function get_simple_banner_fields( $field_prefix = '', $args = array() ) {
	// Calculate suffix from field prefix
	$suffix = md5( $field_prefix );

	// Default arguments
	$defaults = array(
		'show_hide_toggle'          => true,
		'image_instructions'        => esc_attr__( 'Используется поле из Настроек сайта, если пусто', 'xorit' ),
		'title_instructions'        => esc_attr__( 'Десктоп. Используется поле из Настроек сайта, если пусто', 'xorit' ),
		'title_mobile_instructions' => esc_attr__( 'Мобайл. Используется поле из Настроек сайта, если пусто', 'xorit' ),
		'description_instructions'  => esc_attr__( 'Используется поле из Настроек сайта, если пусто', 'xorit' ),
		'cta_instructions'          => esc_attr__( 'Используется поле из Настроек сайта, если пусто', 'xorit' ),
		'conditional_logic'         => 0,
	);

	$args = wp_parse_args( $args, $defaults );

	$fields = array(
		// Tab
		array(
			'key'               => 'field_68fc79541chg4' . $suffix,
			'label'             => esc_attr__( 'Простой баннер', 'xorit' ),
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
	);

	// Hide toggle (optional)
	if ( $args['show_hide_toggle'] ) {
		$fields[] = array(
			'key'               => 'field_68fc79681xe45' . $suffix,
			'label'             => esc_attr__( 'Скрыть блок', 'xorit' ),
			'name'              => $field_prefix . '_simple_banner_hide',
			'aria-label'        => '',
			'type'              => 'true_false',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => $args['conditional_logic'],
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
		);
	}

	// Image
	$fields[] = array(
		'key'               => 'field_6904a5ddb5lk7' . $suffix,
		'label'             => esc_attr__( 'Изображение', 'xorit' ),
		'name'              => $field_prefix . '_simple_banner_image',
		'aria-label'        => '',
		'type'              => 'image',
		'instructions'      => $args['image_instructions'],
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
	);

	// Title (Desktop)
	$fields[] = array(
		'key'               => 'field_68fc79c91cjj6' . $suffix,
		'label'             => esc_attr__( 'Заголовок', 'xorit' ),
		'name'              => $field_prefix . '_simple_banner_title',
		'aria-label'        => '',
		'type'              => 'textarea',
		'instructions'      => $args['title_instructions'],
		'required'          => 0,
		'conditional_logic' => $args['conditional_logic'],
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
	);

	// Title (Mobile)
	$fields[] = array(
		'key'               => 'field_68fc79c91cbnr' . $suffix,
		'label'             => esc_attr__( 'Заголовок', 'xorit' ),
		'name'              => $field_prefix . '_simple_banner_title_mobile',
		'aria-label'        => '',
		'type'              => 'textarea',
		'instructions'      => $args['title_mobile_instructions'],
		'required'          => 0,
		'conditional_logic' => $args['conditional_logic'],
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
	);

	// Description
	$fields[] = array(
		'key'               => 'field_68fc79c91cjk8' . $suffix,
		'label'             => esc_attr__( 'Описание', 'xorit' ),
		'name'              => $field_prefix . '_simple_banner_description',
		'aria-label'        => '',
		'type'              => 'textarea',
		'instructions'      => $args['description_instructions'],
		'required'          => 0,
		'conditional_logic' => $args['conditional_logic'],
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
	);

	// CTA Button
	$fields[] = array(
		'key'               => 'field_68fb911760jbf' . $suffix,
		'label'             => esc_attr__( 'Кнопка', 'xorit' ),
		'name'              => $field_prefix . '_simple_banner_cta',
		'aria-label'        => '',
		'type'              => 'link',
		'instructions'      => $args['cta_instructions'],
		'required'          => 0,
		'conditional_logic' => $args['conditional_logic'],
		'wrapper'           => array(
			'width' => '',
			'class' => '',
			'id'    => '',
		),
		'return_format'     => 'array',
		'allow_in_bindings' => 0,
	);

	return $fields;
}

/**
 * Get Stack fields
 *
 * Returns an array of ACF fields for a stack section
 * with hide toggle, title (desktop/mobile), and repeater items.
 *
 * @param string $field_prefix Field name prefix (e.g., 'services', 'home').
 * @param array $args Optional. Additional arguments to customize fields.
 *
 * @return array Array of ACF field configurations.
 */
function get_stack_fields( $field_prefix = '', $args = array() ) {
	// Calculate suffix from field prefix
	$suffix = md5( $field_prefix );

	// Default arguments
	$defaults = array(
		'show_hide_toggle'          => true,
		'title_instructions'        => esc_attr__( 'Десктоп. Используется поле из Настроек сайта, если пусто', 'xorit' ),
		'title_mobile_instructions' => esc_attr__( 'Мобайл. Используется поле из Настроек сайта, если пусто', 'xorit' ),
		'items_instructions'        => esc_attr__( 'Используется поле из Настроек сайта, если пусто', 'xorit' ),
		'conditional_logic'         => 0,
		'title_width'               => '50',
		'title_rows'                => 3,
	);

	$args = wp_parse_args( $args, $defaults );

	$fields = array(
		// Tab
		array(
			'key'               => 'field_6904a439b5bn5' . $suffix,
			'label'             => esc_attr__( 'Стек', 'xorit' ),
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
	);

	// Hide toggle (optional)
	if ( $args['show_hide_toggle'] ) {
		$fields[] = array(
			'key'               => 'field_68fc79681xmm6' . $suffix,
			'label'             => esc_attr__( 'Скрыть блок', 'xorit' ),
			'name'              => $field_prefix . '_stack_hide',
			'aria-label'        => '',
			'type'              => 'true_false',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => $args['conditional_logic'],
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
		);
	}

	// Title (Desktop)
	$fields[] = array(
		'key'               => 'field_68fc79c91cnce' . $suffix,
		'label'             => esc_attr__( 'Заголовок', 'xorit' ),
		'name'              => $field_prefix . '_stack_title',
		'aria-label'        => '',
		'type'              => 'textarea',
		'instructions'      => $args['title_instructions'],
		'required'          => 0,
		'conditional_logic' => $args['conditional_logic'],
		'wrapper'           => array(
			'width' => $args['title_width'],
			'class' => '',
			'id'    => '',
		),
		'default_value'     => '',
		'maxlength'         => '',
		'allow_in_bindings' => 0,
		'rows'              => $args['title_rows'],
		'placeholder'       => '',
		'new_lines'         => 'br',
	);

	// Title (Mobile)
	$fields[] = array(
		'key'               => 'field_68fc79c91ccfd' . $suffix,
		'label'             => esc_attr__( 'Заголовок', 'xorit' ),
		'name'              => $field_prefix . '_stack_title_mobile',
		'aria-label'        => '',
		'type'              => 'textarea',
		'instructions'      => $args['title_mobile_instructions'],
		'required'          => 0,
		'conditional_logic' => $args['conditional_logic'],
		'wrapper'           => array(
			'width' => $args['title_width'],
			'class' => '',
			'id'    => '',
		),
		'default_value'     => '',
		'maxlength'         => '',
		'allow_in_bindings' => 0,
		'rows'              => $args['title_rows'],
		'placeholder'       => '',
		'new_lines'         => 'br',
	);

	// Stack Items Repeater
	$fields[] = array(
		'key'               => 'field_6904a44fb5mk7' . $suffix,
		'label'             => esc_attr__( 'Стек', 'xorit' ),
		'name'              => $field_prefix . '_stack_items',
		'aria-label'        => '',
		'type'              => 'repeater',
		'instructions'      => $args['items_instructions'],
		'required'          => 0,
		'conditional_logic' => $args['conditional_logic'],
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
				'key'               => 'field_6904a54bb5kw0' . $suffix,
				'label'             => esc_attr__( 'Заголовок', 'xorit' ),
				'name'              => 'title',
				'aria-label'        => '',
				'type'              => 'textarea',
				'instructions'      => '',
				'required'          => 1,
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
				'parent_repeater'   => 'field_6904a44fb5mk7' . $suffix,
			),
		),
	);

	return $fields;
}

/**
 * Get Request fields
 *
 * Returns an array of ACF fields for a request/contact section
 * with hide toggle, title, description, phone, email, and CTA button.
 *
 * @param string $field_prefix Field name prefix (e.g., 'services', 'home').
 * @param array $args Optional. Additional arguments to customize fields.
 *
 * @return array Array of ACF field configurations.
 */
function get_request_fields( $field_prefix = '', $args = array() ) {
	// Calculate suffix from field prefix
	$suffix = md5( $field_prefix );

	// Default arguments
	$defaults = array(
		'show_hide_toggle'         => true,
		'hide_contacts'            => false,
		'title_instructions'       => esc_attr__( 'Если не заполнено, используются настройки сайта', 'xorit' ),
		'description_instructions' => esc_attr__( 'Если не заполнено, используются настройки сайта', 'xorit' ),
		'phone_instructions'       => esc_attr__( 'Если не заполнено, используются настройки сайта', 'xorit' ),
		'email_instructions'       => esc_attr__( 'Если не заполнено, используются настройки сайта', 'xorit' ),
		'cta_instructions'         => esc_attr__( 'Если не заполнено, используются настройки сайта', 'xorit' ),
		'threats_instructions'     => esc_attr__( 'Если не заполнено, используются настройки сайта', 'xorit' ),
		'conditional_logic'        => 0,
	);

	$args = wp_parse_args( $args, $defaults );

	$fields = array(
		// Tab
		array(
			'key'               => 'field_6904a439b5ss2' . $suffix,
			'label'             => esc_attr__( 'Заявка', 'xorit' ),
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
	);

	// Hide toggle (optional)
	if ( $args['show_hide_toggle'] ) {
		$fields[] = array(
			'key'               => 'field_68fc79681xzw3' . $suffix,
			'label'             => esc_attr__( 'Скрыть блок', 'xorit' ),
			'name'              => $field_prefix . '_request_hide',
			'aria-label'        => '',
			'type'              => 'true_false',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => $args['conditional_logic'],
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
		);
	}

	// Title
	$fields[] = array(
		'key'               => 'field_68fc79c91bgh4' . $suffix,
		'label'             => esc_attr__( 'Заголовок', 'xorit' ),
		'name'              => $field_prefix . '_request_title',
		'aria-label'        => '',
		'type'              => 'textarea',
		'instructions'      => $args['title_instructions'],
		'required'          => 0,
		'conditional_logic' => $args['conditional_logic'],
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
	);

	// Items Repeater
	$fields[] = array(
		'key'               => 'field_6904a44fb5hjh' . $suffix,
		'label'             => esc_attr__( 'Угрозы', 'xorit' ),
		'name'              => $field_prefix . '_request_threats',
		'aria-label'        => '',
		'type'              => 'repeater',
		'instructions'      => $args['threats_instructions'],
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
				'key'               => 'field_68fb76d2c1lb5' . $suffix,
				'label'             => esc_attr__( 'Угроза', 'xorit' ),
				'name'              => 'threat',
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
				'maxlength'         => '',
				'allow_in_bindings' => 0,
				'placeholder'       => '',
				'prepend'           => '',
				'append'            => '',
				'parent_repeater'   => 'field_6904a44fb5hjh' . $suffix,
			),
		),
	);

	// Description
	$fields[] = array(
		'key'               => 'field_68fc79c91bnbn' . $suffix,
		'label'             => esc_attr__( 'Описание', 'xorit' ),
		'name'              => $field_prefix . '_request_description',
		'aria-label'        => '',
		'type'              => 'textarea',
		'instructions'      => $args['description_instructions'],
		'required'          => 0,
		'conditional_logic' => $args['conditional_logic'],
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
	);

	// Phone
	$fields[] = ! $args['hide_contacts'] ? array(
		'key'               => 'field_68fb76d2c1bnt' . $suffix,
		'label'             => esc_attr__( 'Телефон', 'xorit' ),
		'name'              => $field_prefix . '_request_phone',
		'aria-label'        => '',
		'type'              => 'text',
		'instructions'      => $args['phone_instructions'],
		'required'          => 0,
		'conditional_logic' => $args['conditional_logic'],
		'wrapper'           => array(
			'width' => '',
			'class' => '',
			'id'    => '',
		),
		'default_value'     => '',
		'maxlength'         => '',
		'allow_in_bindings' => 0,
		'placeholder'       => '',
		'prepend'           => '',
		'append'            => '',
	) : array();

	// Email
	$fields[] = ! $args['hide_contacts'] ? array(
		'key'               => 'field_68fb76d2c1klk' . $suffix,
		'label'             => esc_attr__( 'Email', 'xorit' ),
		'name'              => $field_prefix . '_request_email',
		'aria-label'        => '',
		'type'              => 'text',
		'instructions'      => $args['email_instructions'],
		'required'          => 0,
		'conditional_logic' => $args['conditional_logic'],
		'wrapper'           => array(
			'width' => '',
			'class' => '',
			'id'    => '',
		),
		'default_value'     => '',
		'maxlength'         => '',
		'allow_in_bindings' => 0,
		'placeholder'       => '',
		'prepend'           => '',
		'append'            => '',
	) : array();

	// CTA Button
	$fields[] = array(
		'key'               => 'field_68fb911760mnj' . $suffix,
		'label'             => esc_attr__( 'Кнопка', 'xorit' ),
		'name'              => $field_prefix . '_request_cta',
		'aria-label'        => '',
		'type'              => 'link',
		'instructions'      => $args['cta_instructions'],
		'required'          => 0,
		'conditional_logic' => $args['conditional_logic'],
		'wrapper'           => array(
			'width' => '',
			'class' => '',
			'id'    => '',
		),
		'return_format'     => 'array',
		'allow_in_bindings' => 0,
	);

	return $fields;
}

/**
 * Get Services fields
 *
 * Returns an array of ACF fields for a services section
 * with hide toggle, title, and relationship field for services posts.
 *
 * @param string $field_prefix Field name prefix (e.g., 'services', 'home').
 * @param array $args Optional. Additional arguments to customize fields.
 *
 * @return array Array of ACF field configurations.
 */
function get_services_fields( $field_prefix = '', $args = array() ) {
	// Calculate suffix from field prefix
	$suffix = md5( $field_prefix );

	// Default arguments
	$defaults = array(
		'show_hide_toggle'   => true,
		'title_instructions' => esc_attr__( 'Если не заполнено, используются настройки сайта', 'xorit' ),
		'items_instructions' => esc_attr__( 'Если не выбраны, используются настройки сайта', 'xorit' ),
		'post_type'          => Constants::PT_SLUG_SERVICES,
		'conditional_logic'  => 0,
	);

	$args = wp_parse_args( $args, $defaults );

	$fields = array(
		// Tab
		array(
			'key'               => 'field_68fc79541cnm5' . $suffix,
			'label'             => esc_attr__( 'Услуги', 'xorit' ),
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
	);

	// Hide toggle (optional)
	if ( $args['show_hide_toggle'] ) {
		$fields[] = array(
			'key'               => 'field_68fc79681xzz3' . $suffix,
			'label'             => esc_attr__( 'Скрыть блок', 'xorit' ),
			'name'              => $field_prefix . '_services_hide',
			'aria-label'        => '',
			'type'              => 'true_false',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => $args['conditional_logic'],
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
		);
	}

	// Title
	$fields[] = array(
		'key'               => 'field_68fc79c91cjh4' . $suffix,
		'label'             => esc_attr__( 'Заголовок', 'xorit' ),
		'name'              => $field_prefix . '_services_title',
		'aria-label'        => '',
		'type'              => 'textarea',
		'instructions'      => $args['title_instructions'],
		'required'          => 0,
		'conditional_logic' => $args['conditional_logic'],
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
	);

	// Services Relationship
	$fields[] = array(
		'key'                  => 'field_68fc813e1cmt5' . $suffix,
		'label'                => esc_attr__( 'Услуги', 'xorit' ),
		'name'                 => $field_prefix . '_services_items',
		'aria-label'           => '',
		'type'                 => 'relationship',
		'instructions'         => $args['items_instructions'],
		'required'             => 0,
		'conditional_logic'    => $args['conditional_logic'],
		'wrapper'              => array(
			'width' => '',
			'class' => '',
			'id'    => '',
		),
		'post_type'            => array(
			0 => $args['post_type'],
		),
		'post_status'          => '',
		'taxonomy'             => '',
		'filters'              => array(
			0 => 'search',
		),
		'return_format'        => 'id',
		'min'                  => '',
		'max'                  => '',
		'allow_in_bindings'    => 0,
		'elements'             => '',
		'bidirectional'        => 0,
		'bidirectional_target' => array(),
	);

	return $fields;
}

/**
 * Get FAQ fields
 *
 * Returns an array of ACF fields for a FAQ section
 * with hide toggle, title, and repeater for question/answer pairs.
 *
 * @param string $field_prefix Field name prefix (e.g., 'services', 'home').
 * @param array $args Optional. Additional arguments to customize fields.
 * @param string $suffix Optional. Suffix to append to field names.
 *
 * @return array Array of ACF field configurations.
 */
function get_faq_fields( $field_prefix = '', $args = array(), $suffix = '' ) {
	// Calculate suffix from field prefix
	$suffix = md5( $suffix ? $suffix : $field_prefix );

	// Default arguments
	$defaults = array(
		'show_hide_toggle'   => true,
		'title_instructions' => esc_attr__( 'Если не заполнено, используются настройки сайта', 'xorit' ),
		'items_instructions' => esc_attr__( 'Если не заполнено, используются настройки сайта', 'xorit' ),
		'conditional_logic'  => 0,
		'tab_title'          => esc_attr__( 'Вопросы и ответы', 'xorit' ),
	);

	$args = wp_parse_args( $args, $defaults );

	$fields = array(
		// Tab
		array(
			'key'               => 'field_6904a439b5xr4' . $suffix,
			'label'             => $args['tab_title'],
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
	);

	// Hide toggle (optional)
	if ( $args['show_hide_toggle'] ) {
		$fields[] = array(
			'key'               => 'field_68fc79681xas3' . $suffix,
			'label'             => esc_attr__( 'Скрыть блок', 'xorit' ),
			'name'              => $field_prefix . '_faq_hide',
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
		);
		$fields[] = array(
			'key'               => 'field_68fc79681xlk8' . $suffix,
			'label'             => esc_attr__( 'Колонки', 'xorit' ),
			'name'              => $field_prefix . '_faq_columns',
			'aria-label'        => '',
			'type'              => 'true_false',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => $args['conditional_logic'],
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
		);
		$fields[] = array(
			'key'               => 'field_6904a5ddb5kk8' . $suffix,
			'label'             => esc_attr__( 'Изображение', 'xorit' ),
			'name'              => $field_prefix . '_faq_image',
			'aria-label'        => '',
			'type'              => 'image',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => array(
				array(
					array(
						'field'    => 'field_68fc79681xlk8' . $suffix,
						'operator' => '==',
						'value'    => '1',
					),
				),
			),
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
		);
	}

	// Title
	$fields[] = array(
		'key'               => 'field_68fc79c91cjk6' . $suffix,
		'label'             => esc_attr__( 'Заголовок', 'xorit' ),
		'name'              => $field_prefix . '_faq_title',
		'aria-label'        => '',
		'type'              => 'textarea',
		'instructions'      => $args['title_instructions'],
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
	);

	// FAQ Items Repeater
	$fields[] = array(
		'key'               => 'field_6904a44fb5nh3' . $suffix,
		'label'             => esc_attr__( 'Элементы', 'xorit' ),
		'name'              => $field_prefix . '_faq_items',
		'aria-label'        => '',
		'type'              => 'repeater',
		'instructions'      => $args['items_instructions'],
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
				'key'               => 'field_68fc79681ckk7' . $suffix,
				'label'             => esc_attr__( 'Открыт', 'xorit' ),
				'name'              => 'opened',
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
				'parent_repeater'   => 'field_6904a44fb5nh3' . $suffix,
			),
			array(
				'key'               => 'field_6904a54bb5xr4' . $suffix,
				'label'             => esc_attr__( 'Вопрос', 'xorit' ),
				'name'              => 'question',
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
				'parent_repeater'   => 'field_6904a44fb5nh3' . $suffix,
			),
			array(
				'key'               => 'field_6904a5a2b5ki6' . $suffix,
				'label'             => esc_attr__( 'Ответ', 'xorit' ),
				'name'              => 'answer',
				'aria-label'        => '',
				'type'              => 'wysiwyg',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
				'default_value'     => '',
				'allow_in_bindings' => 0,
				'tabs'              => 'all',
				'toolbar'           => 'mini',
				'media_upload'      => 0,
				'delay'             => 0,
				'parent_repeater'   => 'field_6904a44fb5nh3' . $suffix,
			),
		),
	);

	return $fields;
}

/**
 * Get Advantages fields
 *
 * Returns an array of ACF fields for an advantages section
 * with hide toggle, images (desktop/mobile), title, and repeater for advantages.
 *
 * @param string $field_prefix Field name prefix (e.g., 'services', 'home').
 * @param array $args Optional. Additional arguments to customize fields.
 *
 * @return array Array of ACF field configurations.
 */
function get_advantages_fields( $field_prefix = '', $args = array() ) {
	// Calculate suffix from field prefix
	$suffix = md5( $field_prefix );

	// Default arguments
	$defaults = array(
		'show_hide_toggle'          => true,
		'hide_images'               => false,
		'image_instructions'        => esc_attr__( 'Десктоп', 'xorit' ),
		'image_mobile_instructions' => esc_attr__( 'Мобайл', 'xorit' ),
		'title_instructions'        => '',
		'items_instructions'        => '',
		'max_items'                 => 4,
		'conditional_logic'         => 0,
		'image_width'               => '50',
	);

	$args = wp_parse_args( $args, $defaults );

	$fields = array(
		// Tab
		array(
			'key'               => 'field_6904a439b5kj6' . $suffix,
			'label'             => esc_attr__( 'Преимущества', 'xorit' ),
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
	);

	// Hide toggle (optional)
	if ( $args['show_hide_toggle'] ) {
		$fields[] = array(
			'key'               => 'field_68fc79681xdd3' . $suffix,
			'label'             => esc_attr__( 'Скрыть блок', 'xorit' ),
			'name'              => $field_prefix . '_advantages_hide',
			'aria-label'        => '',
			'type'              => 'true_false',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => $args['conditional_logic'],
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
		);
	}

	if ( ! $args['hide_images'] ) {
		// Image (Desktop)
		$fields[] = array(
			'key'               => 'field_6904a5ddb5li6' . $suffix,
			'label'             => esc_attr__( 'Изображение', 'xorit' ),
			'name'              => $field_prefix . '_advantages_image',
			'aria-label'        => '',
			'type'              => 'image',
			'instructions'      => $args['image_instructions'],
			'required'          => 0,
			'conditional_logic' => $args['conditional_logic'],
			'wrapper'           => array(
				'width' => $args['image_width'],
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
		);

		// Image (Mobile)
		$fields[] = array(
			'key'               => 'field_6904a5ddb5ll7' . $suffix,
			'label'             => esc_attr__( 'Изображение', 'xorit' ),
			'name'              => $field_prefix . '_advantages_image_mobile',
			'aria-label'        => '',
			'type'              => 'image',
			'instructions'      => $args['image_mobile_instructions'],
			'required'          => 0,
			'conditional_logic' => $args['conditional_logic'],
			'wrapper'           => array(
				'width' => $args['image_width'],
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
		);
	}

	// Title
	$fields[] = array(
		'key'               => 'field_68fc79c91cnm5' . $suffix,
		'label'             => esc_attr__( 'Заголовок', 'xorit' ),
		'name'              => $field_prefix . '_advantages_title',
		'aria-label'        => '',
		'type'              => 'textarea',
		'instructions'      => $args['title_instructions'],
		'required'          => 0,
		'conditional_logic' => $args['conditional_logic'],
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
	);

	// Advantages Repeater
	$fields[] = array(
		'key'               => 'field_6904a44fb5je5' . $suffix,
		'label'             => esc_attr__( 'Преимущества', 'xorit' ),
		'name'              => $field_prefix . '_advantages_items',
		'aria-label'        => '',
		'type'              => 'repeater',
		'instructions'      => $args['items_instructions'],
		'required'          => 0,
		'conditional_logic' => $args['conditional_logic'],
		'wrapper'           => array(
			'width' => '',
			'class' => '',
			'id'    => '',
		),
		'layout'            => 'table',
		'pagination'        => 0,
		'min'               => 0,
		'max'               => $args['max_items'],
		'collapsed'         => '',
		'button_label'      => esc_attr__( 'Добавить', 'xorit' ),
		'rows_per_page'     => 20,
		'sub_fields'        => array(
			array(
				'key'               => 'field_6904a54bb5cd8' . $suffix,
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
				'parent_repeater'   => 'field_6904a44fb5je5' . $suffix,
			),
			array(
				'key'               => 'field_6904a54bb5jk5' . $suffix,
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
				'parent_repeater'   => 'field_6904a44fb5je5' . $suffix,
			),
		),
	);

	// CTA
	$fields[] = array(
		'key'               => 'field_68fb911760sgk' . $suffix,
		'label'             => esc_attr__( 'Кнопка', 'xorit' ),
		'name'              => $field_prefix . '_advantages_cta',
		'aria-label'        => '',
		'type'              => 'link',
		'instructions'      => '',
		'required'          => 0,
		'conditional_logic' => 0,
		'wrapper'           => array(
			'width' => '',
			'class' => '',
			'id'    => '',
		),
		'return_format'     => 'array',
		'allow_in_bindings' => 0,
	);

	return $fields;
}

/**
 * Get Hero fields
 *
 * Returns an array of ACF fields for a hero/main banner section
 * with title, description, and CTA button.
 *
 * @param string $field_prefix Field name prefix (e.g., 'services', 'home').
 * @param array $args Optional. Additional arguments to customize fields.
 *
 * @return array Array of ACF field configurations.
 */
function get_hero_fields( $field_prefix = '', $args = array() ) {
	// Calculate suffix from field prefix
	$suffix = md5( $field_prefix );

	// Default arguments
	$defaults = array(
		'image_instructions'        => esc_attr__( 'Десктоп', 'xorit' ),
		'image_mobile_instructions' => esc_attr__( 'Мобайл', 'xorit' ),
		'image_width'               => '50',
		'title_instructions'        => esc_attr__( 'Используется заголовок поста, если пусто', 'xorit' ),
		'title_maxlength'           => 150,
		'description_instructions'  => '',
		'description_maxlength'     => 300,
		'cta_instructions'          => '',
		'conditional_logic'         => 0,
	);

	$args = wp_parse_args( $args, $defaults );

	$fields = array(
		// Tab
		array(
			'key'               => 'field_68fb8fe060651' . $suffix,
			'label'             => esc_attr__( 'Главный баннер', 'xorit' ),
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
			'key'               => 'field_694504af29cb4' . $suffix,
			'label'             => esc_attr__( 'Вариант', 'xorit' ),
			'name'              => $field_prefix . '_hero_variant',
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
			'choices'           => array(
				'image' => esc_attr__( 'Изображение', 'xorit' ),
				'pulse' => esc_attr__( 'Пульсация', 'xorit' ),
			),
			'default_value'     => 'image',
			'return_format'     => 'value',
			'multiple'          => 0,
			'allow_null'        => 0,
			'allow_in_bindings' => 0,
			'ui'                => 0,
			'ajax'              => 0,
			'placeholder'       => '',
			'create_options'    => 0,
			'save_options'      => 0,
		),
		// Image (Desktop)
		array(
			'key'               => 'field_6904a5ddb5kl5' . $suffix,
			'label'             => esc_attr__( 'Изображение', 'xorit' ),
			'name'              => $field_prefix . '_hero_image',
			'aria-label'        => '',
			'type'              => 'image',
			'instructions'      => $args['image_instructions'],
			'required'          => 0,
			'conditional_logic' => array(
				array(
					array(
						'field'    => 'field_694504af29cb4' . $suffix,
						'operator' => '==',
						'value'    => 'image',
					),
				),
			),
			'wrapper'           => array(
				'width' => $args['image_width'],
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
		// Image (Mobile)
		array(
			'key'               => 'field_6904a5ddb5fg3' . $suffix,
			'label'             => esc_attr__( 'Изображение', 'xorit' ),
			'name'              => $field_prefix . '_hero_image_mobile',
			'aria-label'        => '',
			'type'              => 'image',
			'instructions'      => $args['image_mobile_instructions'],
			'required'          => 0,
			'conditional_logic' => array(
				array(
					array(
						'field'    => 'field_694504af29cb4' . $suffix,
						'operator' => '==',
						'value'    => 'image',
					),
				),
			),
			'wrapper'           => array(
				'width' => $args['image_width'],
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
		// Title
		array(
			'key'               => 'field_68fb907f60652' . $suffix,
			'label'             => esc_attr__( 'Заголовок', 'xorit' ),
			'name'              => $field_prefix . '_hero_title',
			'aria-label'        => '',
			'type'              => 'textarea',
			'instructions'      => $args['title_instructions'],
			'required'          => 0,
			'conditional_logic' => $args['conditional_logic'],
			'wrapper'           => array(
				'width' => '',
				'class' => '',
				'id'    => '',
			),
			'default_value'     => '',
			'maxlength'         => $args['title_maxlength'],
			'allow_in_bindings' => 0,
			'rows'              => 2,
			'placeholder'       => '',
			'new_lines'         => 'br',
		),
		// Description
		array(
			'key'               => 'field_68fb90c760653' . $suffix,
			'label'             => esc_attr__( 'Описание', 'xorit' ),
			'name'              => $field_prefix . '_hero_description',
			'aria-label'        => '',
			'type'              => 'textarea',
			'instructions'      => $args['description_instructions'],
			'required'          => 0,
			'conditional_logic' => $args['conditional_logic'],
			'wrapper'           => array(
				'width' => '',
				'class' => '',
				'id'    => '',
			),
			'default_value'     => '',
			'maxlength'         => $args['description_maxlength'],
			'allow_in_bindings' => 0,
			'rows'              => 2,
			'placeholder'       => '',
			'new_lines'         => 'br',
		),
		// CTA Button
		array(
			'key'               => 'field_68fb911760654' . $suffix,
			'label'             => esc_attr__( 'Кнопка', 'xorit' ),
			'name'              => $field_prefix . '_hero_cta',
			'aria-label'        => '',
			'type'              => 'link',
			'instructions'      => $args['cta_instructions'],
			'required'          => 0,
			'conditional_logic' => $args['conditional_logic'],
			'wrapper'           => array(
				'width' => '',
				'class' => '',
				'id'    => '',
			),
			'return_format'     => 'array',
			'allow_in_bindings' => 0,
		),
	);

	return $fields;
}

/**
 * Get Clients fields
 *
 * Returns an array of ACF fields for a clients section, including a hide toggle,
 * title, repeater for client items, and a call-to-action link.
 *
 * @param string $field_prefix Field name prefix used for generating unique field keys.
 * @param array $args Optional. Additional arguments to customize fields.
 *
 * @return array Array of ACF field configurations.
 */
function get_clients_fields( $field_prefix = '', $args = array() ) {
	// Calculate suffix from field prefix
	$suffix = $field_prefix === Constants::ACF_FIELD_HOME ? '' : md5( $field_prefix );

	// Default arguments
	$defaults = array();

	$args = wp_parse_args( $args, $defaults );

	$fields = array(
		array(
			'key'               => 'field_6904a439b5mg5' . $suffix,
			'label'             => esc_attr__( 'Клиенты', 'xorit' ),
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
			'key'               => 'field_68fc79681xwq6' . $suffix,
			'label'             => esc_attr__( 'Скрыть блок', 'xorit' ),
			'name'              => $field_prefix . '_clients_hide',
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
			'key'               => 'field_68fc79c91cmm6' . $suffix,
			'label'             => esc_attr__( 'Заголовок', 'xorit' ),
			'name'              => $field_prefix . '_clients_title',
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
			'key'               => 'field_68fc79c91cuw3' . $suffix,
			'label'             => esc_attr__( 'Описание', 'xorit' ),
			'name'              => $field_prefix . '_clients_description',
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
			'key'               => 'field_6904a44fb5jh5' . $suffix,
			'label'             => esc_attr__( 'Элементы', 'xorit' ),
			'name'              => $field_prefix . '_clients_items',
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
					'key'               => 'field_6904a54bb5xy5' . $suffix,
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
					'parent_repeater'   => 'field_6904a44fb5jh5' . $suffix,
				),
				array(
					'key'               => 'field_6904a5a2b5kjf' . $suffix,
					'label'             => esc_attr__( 'Описание', 'xorit' ),
					'name'              => 'description',
					'aria-label'        => '',
					'type'              => 'wysiwyg',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'default_value'     => '',
					'allow_in_bindings' => 0,
					'tabs'              => 'all',
					'toolbar'           => 'list',
					'media_upload'      => 0,
					'delay'             => 0,
					'parent_repeater'   => 'field_6904a44fb5jh5' . $suffix,
				),
			),
		),
		array(
			'key'               => 'field_68fb911760jh6' . $suffix,
			'label'             => esc_attr__( 'Кнопка', 'xorit' ),
			'name'              => $field_prefix . '_clients_cta',
			'aria-label'        => '',
			'type'              => 'link',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => '',
				'class' => '',
				'id'    => '',
			),
			'return_format'     => 'array',
			'allow_in_bindings' => 0,
		),
	);

	return $fields;
}

/**
 * Get Infograph fields
 *
 * Returns an array of ACF fields for an infographic section, including
 * options to hide the block, upper section, and configurations for image,
 * title, and grouped content for "What You Do" and "What We Do".
 *
 * @param string $field_prefix Field name prefix (e.g., 'infograph', 'home').
 * @param array $args Optional. Arguments to customize fields configuration, such as labels.
 *
 * @return array Array of ACF field configurations for the infographic section.
 */
function get_infofraph_fields( $field_prefix = '', $args = array() ) {
	// Calculate suffix from field prefix
	$suffix = md5( $field_prefix );

	// Default arguments
	$defaults = array(
		'tab_label'          => esc_attr__( 'Инфографика', 'xorit' ),
		'first_group_label'  => esc_attr__( 'Что делаете вы', 'xorit' ),
		'second_group_label' => esc_attr__( 'Что делаем мы', 'xorit' ),
	);

	$args = wp_parse_args( $args, $defaults );

	$fields = array(
		array(
			'key'               => 'field_692dd146b4efe' . $suffix,
			'label'             => $args['tab_label'],
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
			'key'               => 'field_68fc79681xkly' . $suffix,
			'label'             => esc_attr__( 'Скрыть блок', 'xorit' ),
			'name'              => $field_prefix . '_infograph_hide',
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
			'key'               => 'field_692dd7fed4be6' . $suffix,
			'label'             => esc_attr__( 'Изображение', 'xorit' ),
			'name'              => $field_prefix . '_infograph_image',
			'aria-label'        => '',
			'type'              => 'image',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => array(
				array(
					array(
						'field'    => 'field_692dd73ad7lk7' . $suffix,
						'operator' => '!=',
						'value'    => '1',
					),
				),
			),
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
			'key'               => 'field_68fc79681xjjh' . $suffix,
			'label'             => '',
			'name'              => $field_prefix . '_infograph_h1',
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
			'ui_on_text'        => 'h1',
			'ui_off_text'       => 'h2',
			'ui'                => 1,
		),
		array(
			'key'               => 'field_692dd15fb4eff' . $suffix,
			'label'             => esc_attr__( 'Заголовок', 'xorit' ),
			'name'              => $field_prefix . '_infograph_title',
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
			'maxlength'         => 150,
			'allow_in_bindings' => 0,
			'rows'              => 2,
			'placeholder'       => '',
			'new_lines'         => 'br',
		),
		array(
			'key'               => 'field_692dd73ad7lk7' . $suffix,
			'label'             => esc_attr__( 'Скрыть верхнюю часть', 'xorit' ),
			'name'              => $field_prefix . '_infograph_hide_upper',
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
			'key'               => 'field_692dd207b4f00' . $suffix,
			'label'             => $args['first_group_label'],
			'name'              => $field_prefix . '_infograph_you',
			'aria-label'        => '',
			'type'              => 'group',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => array(
				array(
					array(
						'field'    => 'field_692dd73ad7lk7' . $suffix,
						'operator' => '!=',
						'value'    => '1',
					),
				),
			),
			'wrapper'           => array(
				'width' => '',
				'class' => '',
				'id'    => '',
			),
			'layout'            => 'row',
			'sub_fields'        => array(
				array(
					'key'               => 'field_692dd23bb4f01' . $suffix,
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
				),
				array(
					'key'               => 'field_692dd264b4f02' . $suffix,
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
				),
			),
		),
		array(
			'key'               => 'field_692dd29fdd23c' . $suffix,
			'label'             => $args['second_group_label'],
			'name'              => $field_prefix . '_infograph_we',
			'aria-label'        => '',
			'type'              => 'group',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => array(
				array(
					array(
						'field'    => 'field_692dd73ad7lk7' . $suffix,
						'operator' => '!=',
						'value'    => '1',
					),
				),
			),
			'wrapper'           => array(
				'width' => '',
				'class' => '',
				'id'    => '',
			),
			'layout'            => 'row',
			'sub_fields'        => array(
				array(
					'key'               => 'field_692dd2d4dd23d' . $suffix,
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
				),
				array(
					'key'               => 'field_692dd317dd23e' . $suffix,
					'label'             => esc_attr__( 'Пункты', 'xorit' ),
					'name'              => 'points',
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
							'key'               => 'field_692dd348dd23f' . $suffix,
							'label'             => esc_attr__( 'Пункт', 'xorit' ),
							'name'              => 'point',
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
							'parent_repeater'   => 'field_692dd317dd23e' . $suffix,
						),
					),
				),
			),
		),
		array(
			'key'               => 'field_692dd38d9c00f' . $suffix,
			'label'             => esc_attr__( 'Карточки', 'xorit' ),
			'name'              => $field_prefix . '_infograph_cards',
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
					'key'                   => 'field_692dd62b9c011' . $suffix,
					'label'                 => esc_attr__( 'Цвет бэкграунда', 'xorit' ),
					'name'                  => 'background',
					'aria-label'            => '',
					'type'                  => 'color_picker',
					'instructions'          => '',
					'required'              => 0,
					'conditional_logic'     => 0,
					'wrapper'               => array(
						'width' => '50',
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
					'parent_repeater'       => 'field_692dd38d9c00f' . $suffix,
				),
				array(
					'key'                   => 'field_692dd6b09c012' . $suffix,
					'label'                 => esc_attr__( 'Цвет текста', 'xorit' ),
					'name'                  => 'color',
					'aria-label'            => '',
					'type'                  => 'color_picker',
					'instructions'          => '',
					'required'              => 0,
					'conditional_logic'     => 0,
					'wrapper'               => array(
						'width' => '50',
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
					'parent_repeater'       => 'field_692dd38d9c00f' . $suffix,
				),
				array(
					'key'               => 'field_692dd5729c010' . $suffix,
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
					'parent_repeater'   => 'field_692dd38d9c00f' . $suffix,
				),
				array(
					'key'               => 'field_692dd70ed7f7b' . $suffix,
					'label'             => esc_attr__( 'Пункты', 'xorit' ),
					'name'              => 'points',
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
							'key'               => 'field_6904a5ddb5lkl8' . $suffix,
							'label'             => esc_attr__( 'Иконка', 'xorit' ),
							'name'              => 'icon',
							'aria-label'        => '',
							'type'              => 'image',
							'instructions'      => '',
							'required'          => 0,
							'conditional_logic' => 0,
							'wrapper'           => array(
								'width' => '10',
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
							'parent_repeater'   => 'field_692dd70ed7f7b' . $suffix,
						),
						array(
							'key'               => 'field_692dd7c2d7f7d' . $suffix,
							'label'             => esc_attr__( 'Пункт', 'xorit' ),
							'name'              => 'point',
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
							'parent_repeater'   => 'field_692dd70ed7f7b' . $suffix,
						),
					),
					'parent_repeater'   => 'field_692dd38d9c00f' . $suffix,
				),
			),
		),
	);

	return $fields;
}

/**
 * Get Three Cards fields
 *
 * Returns an array of ACF fields for the "Three Cards" section,
 * including a tab, a hide toggle, and a repeater field for card items.
 *
 * @param string $field_prefix Optional. Field name prefix (e.g., 'three_cards', 'homepage').
 *                             Default is an empty string.
 *
 * @return array Array of ACF field configurations for the "Three Cards" section.
 */
function get_three_cards_fields( $field_prefix = '' ) {
	$suffix = md5( $field_prefix );

	$fields = array(
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
			'name'              => $field_prefix . '_three_cards_hide',
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
			'name'              => $field_prefix . '_three_cards_items',
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
	);

	return $fields;
}

/**
 * Get Tabs fields
 *
 * Returns an array of ACF fields for a tabs section, including options for hiding the block,
 * desktop-specific and mobile-specific titles, and configurable repeater fields for tab items.
 *
 * @param string $field_prefix Field name prefix (e.g., 'tabs', 'home') used to customize field names.
 * @param array $args Optional. Additional arguments to customize the fields.
 *
 * @return array Array of ACF field configurations for the tabs section.
 */
function get_tabs_fields( $field_prefix = '', $args = array() ) {
	// Calculate suffix from field prefix
	$suffix = $field_prefix === Constants::ACF_FIELD_HOME ? '' : md5( $field_prefix );

	// Default arguments
	$defaults = array();

	$args = wp_parse_args( $args, $defaults );

	$fields = array(
		array(
			'key'               => 'field_6904a439b56f2' . $suffix,
			'label'             => esc_attr__( 'Табы', 'xorit' ),
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
			'key'               => 'field_68fc79681xjn6' . $suffix,
			'label'             => esc_attr__( 'Скрыть блок', 'xorit' ),
			'name'              => $field_prefix . '_tabs_hide',
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
			'key'               => 'field_68fc79c91cll4' . $suffix,
			'label'             => esc_attr__( 'Заголовок', 'xorit' ),
			'name'              => $field_prefix . '_tabs_title',
			'aria-label'        => '',
			'type'              => 'textarea',
			'instructions'      => esc_attr__( 'Десктоп', 'xorit' ),
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => '50',
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
			'key'               => 'field_68fc79c91cmnj' . $suffix,
			'label'             => esc_attr__( 'Заголовок', 'xorit' ),
			'name'              => $field_prefix . '_tabs_title_mobile',
			'aria-label'        => '',
			'type'              => 'textarea',
			'instructions'      => esc_attr__( 'Мобайл', 'xorit' ),
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => '50',
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
			'key'               => 'field_6904a44fb56f3' . $suffix,
			'label'             => esc_attr__( 'Табы', 'xorit' ),
			'name'              => $field_prefix . '_tabs_items',
			'aria-label'        => '',
			'type'              => 'repeater',
			'instructions'      => esc_attr__( 'Десктоп', 'xorit' ),
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => '50',
				'class' => '',
				'id'    => '',
			),
			'layout'            => 'row',
			'pagination'        => 0,
			'min'               => 0,
			'max'               => 5,
			'collapsed'         => '',
			'button_label'      => esc_attr__( 'Добавить', 'xorit' ),
			'rows_per_page'     => 20,
			'sub_fields'        => array(
				array(
					'key'               => 'field_6904a54bb56f4' . $suffix,
					'label'             => esc_attr__( 'Заголовок таба', 'xorit' ),
					'name'              => 'tab_title',
					'aria-label'        => '',
					'type'              => 'text',
					'instructions'      => '',
					'required'          => 1,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'default_value'     => '',
					'maxlength'         => 20,
					'allow_in_bindings' => 0,
					'placeholder'       => '',
					'prepend'           => '',
					'append'            => '',
					'parent_repeater'   => 'field_6904a44fb56f3' . $suffix,
				),
				array(
					'key'               => 'field_6904a5a2b56f5' . $suffix,
					'label'             => esc_attr__( 'Описание', 'xorit' ),
					'name'              => 'description',
					'aria-label'        => '',
					'type'              => 'wysiwyg',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'default_value'     => '',
					'allow_in_bindings' => 0,
					'tabs'              => 'all',
					'toolbar'           => 'full',
					'media_upload'      => 0,
					'delay'             => 0,
					'parent_repeater'   => 'field_6904a44fb56f3' . $suffix,
				),
				array(
					'key'               => 'field_6904a5ddb56f6' . $suffix,
					'label'             => esc_attr__( 'Изображение', 'xorit' ),
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
					'parent_repeater'   => 'field_6904a44fb56f3' . $suffix,
				),
				array(
					'key'               => 'field_6904a5f5b56f7' . $suffix,
					'label'             => esc_attr__( 'Кнопка', 'xorit' ),
					'name'              => 'cta',
					'aria-label'        => '',
					'type'              => 'link',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'return_format'     => 'array',
					'allow_in_bindings' => 0,
					'parent_repeater'   => 'field_6904a44fb56f3' . $suffix,
				),
			),
		),
		array(
			'key'               => 'field_6904a44fb5nm7' . $suffix,
			'label'             => esc_attr__( 'Табы', 'xorit' ),
			'name'              => $field_prefix . '_tabs_items_mobile',
			'aria-label'        => '',
			'type'              => 'repeater',
			'instructions'      => esc_attr__( 'Мобайл', 'xorit' ),
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => '50',
				'class' => '',
				'id'    => '',
			),
			'layout'            => 'row',
			'pagination'        => 0,
			'min'               => 0,
			'max'               => 5,
			'collapsed'         => '',
			'button_label'      => esc_attr__( 'Добавить', 'xorit' ),
			'rows_per_page'     => 20,
			'sub_fields'        => array(
				array(
					'key'               => 'field_6904a54bb5x4h' . $suffix,
					'label'             => esc_attr__( 'Заголовок таба', 'xorit' ),
					'name'              => 'tab_title',
					'aria-label'        => '',
					'type'              => 'text',
					'instructions'      => '',
					'required'          => 1,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'default_value'     => '',
					'maxlength'         => 20,
					'allow_in_bindings' => 0,
					'placeholder'       => '',
					'prepend'           => '',
					'append'            => '',
					'parent_repeater'   => 'field_6904a44fb5nm7' . $suffix,
				),
				array(
					'key'               => 'field_6904a5a2b5kl6' . $suffix,
					'label'             => esc_attr__( 'Описание', 'xorit' ),
					'name'              => 'description',
					'aria-label'        => '',
					'type'              => 'wysiwyg',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'default_value'     => '',
					'allow_in_bindings' => 0,
					'tabs'              => 'all',
					'toolbar'           => 'full',
					'media_upload'      => 0,
					'delay'             => 0,
					'parent_repeater'   => 'field_6904a44fb5nm7' . $suffix,
				),
				array(
					'key'               => 'field_6904a5ddb57u6' . $suffix,
					'label'             => esc_attr__( 'Изображение', 'xorit' ),
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
					'parent_repeater'   => 'field_6904a44fb5nm7' . $suffix,
				),
				array(
					'key'               => 'field_6904a5f5b5kj3' . $suffix,
					'label'             => esc_attr__( 'Кнопка', 'xorit' ),
					'name'              => 'cta',
					'aria-label'        => '',
					'type'              => 'link',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'return_format'     => 'array',
					'allow_in_bindings' => 0,
					'parent_repeater'   => 'field_6904a44fb5nm7' . $suffix,
				),
			),
		),
	);

	return $fields;
}
