<?php

namespace xoritTheme\Customizer;

use WP_Customize_Manager;
use WP_Customize_Media_Control;

function start() {
	$callback = function ( $function ) {
		return __NAMESPACE__ . "\\$function";
	};

	add_action( 'customize_register', $callback( 'customize_identify' ) );
}

/**
 * Customize identify
 *
 * @param WP_Customize_Manager $wp_customize
 *
 * @return void
 */
function customize_identify( WP_Customize_Manager $wp_customize ) {
	$wp_customize->add_setting(
		'xorit_logo',
		[
			'default'   => '',
			'transport' => 'refresh',
		]
	);

	$wp_customize->add_control(
		new WP_Customize_Media_Control(
			$wp_customize,
			'xorit_logo',
			[
				'label'     => esc_html__( 'Upload your logo image', 'xorit' ),
				'settings'  => 'xorit_logo',
				'section'   => 'title_tagline',
				'mime_type' => 'image',
				'priority'  => 1,
			]
		)
	);

	$wp_customize->add_setting(
		'xorit_mobile_logo',
		[
			'default'   => '',
			'transport' => 'refresh',
		]
	);

	$wp_customize->add_control(
		new WP_Customize_Media_Control(
			$wp_customize,
			'xorit_mobile_logo',
			[
				'label'     => esc_html__( 'Upload your logo image for mobile', 'xorit' ),
				'settings'  => 'xorit_mobile_logo',
				'section'   => 'title_tagline',
				'mime_type' => 'image',
				'priority'  => 1,
			]
		)
	);
}
