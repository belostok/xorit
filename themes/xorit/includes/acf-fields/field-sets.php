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
	}

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
		// Image (Desktop)
		array(
			'key'               => 'field_6904a5ddb5kl5' . $suffix,
			'label'             => esc_attr__( 'Изображение', 'xorit' ),
			'name'              => $field_prefix . '_hero_image',
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

