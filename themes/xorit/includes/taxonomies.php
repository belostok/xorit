<?php

namespace xoritTheme\Taxonomies;

function start() {
	$callback = function ( $function ) {
		return __NAMESPACE__ . "\\$function";
	};

}
