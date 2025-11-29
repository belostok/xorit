<?php
/**
 * Services post template
 */

use xoritTheme\Constants\Constants;

get_header();

get_template_part(
	'partials/single-hero',
	null,
	array(
		'title'        => get_field( Constants::ACF_FIELD_SERVICES . '_hero_title' ),
		'description'  => get_field( Constants::ACF_FIELD_SERVICES . '_hero_description' ),
		'image'        => get_field( Constants::ACF_FIELD_SERVICES . '_hero_image' ),
		'image_mobile' => get_field( Constants::ACF_FIELD_SERVICES . '_hero_image_mobile' ),
		'cta'          => get_field( Constants::ACF_FIELD_SERVICES . '_hero_cta' ),
	)
);

get_template_part(
	'partials/advantages',
	null,
	array(
		'hide'         => get_field( Constants::ACF_FIELD_SERVICES . '_advantages_hide' ),
		'image'        => get_field( Constants::ACF_FIELD_SERVICES . '_advantages_image' ),
		'image_mobile' => get_field( Constants::ACF_FIELD_SERVICES . '_advantages_image_mobile' ),
		'title'        => get_field( Constants::ACF_FIELD_SERVICES . '_advantages_title' ),
		'items'        => get_field( Constants::ACF_FIELD_SERVICES . '_advantages_items' ),
	)
);

get_template_part(
	'partials/simple-banner',
	null,
	array(
		'hide'         => get_field( Constants::ACF_FIELD_SERVICES . '_simple_banner_hide' ),
		'title'        => get_field( Constants::ACF_FIELD_SERVICES . '_simple_banner_title' ),
		'title_mobile' => get_field( Constants::ACF_FIELD_SERVICES . '_simple_banner_title_mobile' ),
		'description'  => get_field( Constants::ACF_FIELD_SERVICES . '_simple_banner_description' ),
		'cta'          => get_field( Constants::ACF_FIELD_SERVICES . '_simple_banner_cta' ),
	)
);

get_template_part(
	'partials/stack',
	null,
	array(
		'hide'         => get_field( Constants::ACF_FIELD_SERVICES . '_stack_hide' ),
		'title'        => get_field( Constants::ACF_FIELD_SERVICES . '_stack_title' ),
		'title_mobile' => get_field( Constants::ACF_FIELD_SERVICES . '_stack_title_mobile' ),
		'items'        => get_field( Constants::ACF_FIELD_SERVICES . '_stack_items' ),
	)
);

get_template_part(
	'partials/request',
	null,
	array(
		'hide'        => get_field( Constants::ACF_FIELD_SERVICES . '_request_hide' ),
		'title'       => get_field( Constants::ACF_FIELD_SERVICES . '_request_title' ),
		'description' => get_field( Constants::ACF_FIELD_SERVICES . '_request_description' ),
		'phone'       => get_field( Constants::ACF_FIELD_SERVICES . '_request_phone' ),
		'email'       => get_field( Constants::ACF_FIELD_SERVICES . '_request_email' ),
		'cta'         => get_field( Constants::ACF_FIELD_SERVICES . '_request_cta' ),
		'classes'     => 'x-request_dark',
	)
);

get_template_part(
	'partials/services',
	null,
	array(
		'hide'  => get_field( Constants::ACF_FIELD_SERVICES . '_services_hide' ),
		'title' => get_field( Constants::ACF_FIELD_SERVICES . '_services_title' ),
		'items' => get_field( Constants::ACF_FIELD_SERVICES . '_services_items' ),
	)
);

get_template_part(
	'partials/faq',
	null,
	array(
		'hide'    => get_field( Constants::ACF_FIELD_SERVICES . '_faq_hide' ),
		'title'   => get_field( Constants::ACF_FIELD_SERVICES . '_faq_title' ),
		'items'   => get_field( Constants::ACF_FIELD_SERVICES . '_faq_items' ),
		'classes' => 'x-faq_light',
	)
);

$args         = array(
	'post_type'      => 'post',
	'posts_per_page' => 4,
	'post_status'    => 'publish',
);
$latest_posts = new \WP_Query( $args );
get_template_part(
	'partials/posts',
	null,
	array(
		'title'   => esc_html__( 'Блог', 'xorit' ),
		'items'   => $latest_posts->get_posts(),
		'classes' => 'x-posts_dark',
	)
);

get_footer();
