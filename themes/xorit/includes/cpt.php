<?php

namespace xoritTheme\CPT;

use xoritTheme\Constants\Constants;

function start() {
	$callback = function ( $function ) {
		return __NAMESPACE__ . "\\$function";
	};

	add_action( 'init', $callback( 'register_post_types' ) );
}

/**
 * Register post types
 * @return void
 */
function register_post_types() {
	register_post_type(
		Constants::PT_SLUG_SERVICES,
		[
			'label'                 => esc_attr__( 'Услуги', 'xorit' ),
			'labels'                => [
				'name'          => esc_attr__( 'Услуги', 'xorit' ),
				'singular_name' => esc_attr__( 'Услуга', 'xorit' ),
			],
			'description'           => '',
			'public'                => true,
			'publicly_queryable'    => true,
			'show_ui'               => true,
			'show_in_rest'          => true,
			'rest_base'             => 'service',
			'rest_controller_class' => 'WP_REST_Posts_Controller',
			'has_archive'           => false,
			'show_in_menu'          => true,
			'show_in_nav_menus'     => true,
			'delete_with_user'      => false,
			'exclude_from_search'   => false,
			'capability_type'       => 'post',
			'map_meta_cap'          => true,
			'hierarchical'          => false,
			'query_var'             => true,
			'supports'              => [
				'title',
				'editor',
				'thumbnail',
			],
			'menu_icon'             => 'dashicons-star-filled',
		]
	);
}

