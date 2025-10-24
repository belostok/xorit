<?php

namespace xoritTheme\Helpers;

/**
 * Get version.
 * @return array|false|int|string
 */
function get_version() {
	if ( XORIT_WP_ENV === 'development' ) {
		// Help us develop without browser caching
		return time();
	} else {
		return wp_get_theme()->get( 'Version' );
	}
}

/**
 * Trim string or return second argument if string is empty
 * @param $value
 * @param $return_if_not_string
 *
 * @return mixed|string
 */
function trim_string( $value, $return_if_not_string = '' ) {
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
function get_array( $value ) {
	if ( ! is_array( $value ) ) {
		return [];
	}

	return $value;
}
