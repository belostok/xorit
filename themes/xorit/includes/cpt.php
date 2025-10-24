<?php

namespace xoritTheme\CPT;

function start() {
	$callback = function ( $function ) {
		return __NAMESPACE__ . "\\$function";
	};

}

