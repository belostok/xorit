<?php

namespace xoritTheme\Blocks;

function start() {
	$callback = function ( $function ) {
		return __NAMESPACE__ . "\\$function";
	};

	// Register function on init must have higher priority than each block itself
	add_action( 'init', $callback( 'register_theme_blocks' ), 9 );

	add_filter( 'block_categories_all', $callback( 'block_categories' ) );

	// Load block assets only when they are rendered
	add_filter( 'should_load_separate_core_block_assets', '__return_true' );
	add_filter( 'allowed_block_types_all', $callback( 'allowed_block_types' ), 10, 2 );
}


/**
 * Write your blocks here, just folder name from src/blocks.
 *
 * @return void
 */
function register_theme_blocks() {
	$blocks = array();

	foreach ( $blocks as $block ) {
		$block_path = ALBEN_THEME_BLOCKS . "$block/index.php";

		$block_path = str_replace( '\\', '/', $block_path );

		if ( file_exists( $block_path ) ) {
			require_once $block_path;
		}
	}
}

/**
 * Add theme blocks category, put it first.
 *
 * @param $categories
 *
 * @return array
 */
function block_categories( $categories ): array {
	return array_merge(
		[
			[
				'slug'  => 'xorit-blocks',
				'title' => esc_attr__( 'Theme Blocks', 'xorit' ),
			],
		],
		$categories
	);
}

function allowed_block_types( $allowed_blocks, $editor_context ): array {
	$blocks = \WP_Block_Type_Registry::get_instance()->get_all_registered();

	return array_keys( $blocks );
}
