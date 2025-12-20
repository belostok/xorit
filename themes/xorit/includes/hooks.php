<?php

namespace xoritTheme\Hooks;

use xoritTheme\Constants\Constants;

/**
 * Add custom toolbars to wysiwyg
 */
add_filter( 'acf/fields/wysiwyg/toolbars', __NAMESPACE__ . '\\wysiwyg_custom_toolbars', 10, 1 );

/**
 * Hide parent services fields for child services posts
 */
add_filter( 'acf/location/rule_match/post_parent', __NAMESPACE__ . '\\acf_location_rule_match_post_parent', 10, 3 );

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

/**
 * Fix ACF location rule for post_parent
 *
 * @param bool  $match   Whether the rule matches.
 * @param array $rule    The location rule.
 * @param array $options Options for the location rule.
 *
 * @return bool
 */
function acf_location_rule_match_post_parent( $match, $rule, $options ) {
	if ( ! isset( $options['post_id'] ) ) {
		return $match;
	}

	$post_id = $options['post_id'];

	// For new posts (post_id is a string like 'post_type:services')
	if ( is_string( $post_id ) && strpos( $post_id, 'post_type:' ) !== false ) {
		// Check if parent is selected in the request
		$post_parent = isset( $_REQUEST['post_parent'] ) ? absint( $_REQUEST['post_parent'] ) : 0;
	} else {
		// For existing posts
		$post_parent = wp_get_post_parent_id( $post_id );
	}

	// Compare with the rule value
	$rule_value = absint( $rule['value'] );

	if ( '==' === $rule['operator'] ) {
		$match = ( $post_parent === $rule_value );
	} elseif ( '!=' === $rule['operator'] ) {
		$match = ( $post_parent !== $rule_value );
	}

	return $match;
}
