<?php

namespace xoritTheme\Hooks;

/**
 * Add custom toolbars to wysiwyg
 */
add_filter( 'acf/fields/wysiwyg/toolbars', __NAMESPACE__ . '\\wysiwyg_custom_toolbars', 10, 1 );
/**
 * @param $toolbars
 *
 * @return mixed
 */
function wysiwyg_custom_toolbars( $toolbars ) {

	$toolbars['Mini'] = [
		'1' => [
			'bold',
			'link',
			'wp_adv',
		],
		'2' => [
			'forecolor',
		],
	];

	$toolbars['List'] = [
		'1' => [
			'bold',
			'bullist',
			'link',
			'wp_adv',
		],
		'2' => [
			'forecolor',
		],
	];

	return $toolbars;
}
