<?php

namespace xoritTheme\ACF;

function start() {
	$callback = function ( $function ) {
		return __NAMESPACE__ . "\\$function";
	};

	// Options page
	// https://www.advancedcustomfields.com/resources/options-page/
	add_action( 'init', $callback( 'register_options_page' ) );

	// You should register your fields in this hook
	// https://www.advancedcustomfields.com/resources/register-fields-via-php/
	add_action( 'init', $callback( 'register_fields' ) );

	// Show custom fields in admin area
	// add_filter( 'acf/settings/show_admin', '__return_false' );
}

/**
 * Register options page.
 *
 * @return void
 */
function register_options_page() {
	if ( ! function_exists( 'acf_add_options_page' ) ) {
		return;
	}

	acf_add_options_page(
		[
			'page_title' => esc_attr__( 'Настройки сайта', 'xorit' ),
			'menu_title' => esc_attr__( 'Настройки сайта', 'xorit' ),
			'menu_slug'  => 'xorit-options',
			'capability' => 'edit_posts',
			'redirect'   => false,
		]
	);
}

/**
 * Register fields.
 *
 * @return void
 */
function register_fields() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	// Load reusable field sets
	include_once sprintf( '%s/acf-fields/field-sets.php', __DIR__ );

	$items = [
		'options',
		'services',
		'services-child',
		'home',
	];
	foreach ( $items as $item ) {
		include_once sprintf( '%s/acf-fields/%s.php', __DIR__, $item );
	}
}

