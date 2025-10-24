<?php

namespace xoritTheme\Shortcodes;

function start() {
	$callback = function ( $function ) {
		return __NAMESPACE__ . "\\$function";
	};

	add_shortcode( 'current-year', $callback( 'current_year' ) );
}

/**
 * Output current year
 *
 * @return mixed
 */
function current_year() {
	return esc_html( wp_date( 'Y' ) );
}
