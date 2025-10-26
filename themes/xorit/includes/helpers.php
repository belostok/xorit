<?php

namespace xoritTheme\Helpers;

/**
 * Get version.
 * @return array|false|int|string
 */
function get_version(): false|array|int|string {
	if ( XORIT_WP_ENV === 'development' ) {
		// Help us develop without browser caching
		return time();
	} else {
		return wp_get_theme()->get( 'Version' );
	}
}

/**
 * Trim string or return second argument if string is empty
 *
 * @param $value
 * @param string $return_if_not_string
 *
 * @return string
 */
function trim_string( $value, string $return_if_not_string = '' ): string {
	if ( ! is_string( $value ) ) {
		return $return_if_not_string;
	}

	return trim( $value );
}

/**
 * Check if value is array and return it or return an empty array if value is not array
 * @param $value
 *
 * @return array
 */
function get_array( $value ): array {
	if ( ! is_array( $value ) ) {
		return [];
	}

	return $value;
}

/**
 * Get details of the ACF Link field array
 * @param $link
 *
 * @return array|string[]
 */
function get_link_details( $link ): array {
	$link = get_array( $link );

	if ( empty( $link ) ) {
		return [];
	}

	$url    = trim_string( $link['url'] ?? '' );
	$title  = trim_string( $link['title'] ?? '' );
	$target = trim_string( $link['target'] ?? '' );

	if ( ! $url || ! $title ) {
		return [];
	}

	return [
		'url'    => $url,
		'title'  => $title,
		'target' => $target ? $target : '_self',
	];
}
