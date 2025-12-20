<?php
/**
 * The front page template file
 */

use xoritTheme\Constants\Constants;

get_header();

get_template_part( 'partials/main-hero' );

get_template_part(
	'partials/tasks',
	null,
	array(
		'hide'      => get_field( Constants::ACF_FIELD_HOME . '_tasks_hide' ),
		'title'     => get_field( Constants::ACF_FIELD_HOME . '_tasks_title' ),
		'items'     => get_field( Constants::ACF_FIELD_HOME . '_tasks_items' ),
		'cta_red'   => get_field( Constants::ACF_FIELD_HOME . '_tasks_cta_red' ),
		'cta_white' => get_field( Constants::ACF_FIELD_HOME . '_tasks_cta_white' ),
	)
);

get_template_part(
	'partials/simple-banner',
	null,
	array(
		'hide'         => get_field( Constants::ACF_FIELD_HOME . '_simple_banner_hide' ),
		'title'        => get_field( Constants::ACF_FIELD_HOME . '_simple_banner_title' ),
		'title_mobile' => get_field( Constants::ACF_FIELD_HOME . '_simple_banner_title_mobile' ),
		'description'  => get_field( Constants::ACF_FIELD_HOME . '_simple_banner_description' ),
		'cta'          => get_field( Constants::ACF_FIELD_HOME . '_simple_banner_cta' ),
		'image'        => get_field( Constants::ACF_FIELD_HOME . '_simple_banner_image' ),
	)
);

get_template_part(
	'partials/services',
	null,
	array(
		'hide'  => get_field( Constants::ACF_FIELD_HOME . '_services_hide' ),
		'title' => get_field( Constants::ACF_FIELD_HOME . '_services_title' ),
		'items' => get_field( Constants::ACF_FIELD_HOME . '_services_items' ),
	)
);

get_template_part(
	'partials/tabs',
	null,
	array(
		'hide'         => get_field( Constants::ACF_FIELD_HOME . '_tabs_hide' ),
		'title'        => get_field( Constants::ACF_FIELD_HOME . '_tabs_title' ),
		'title_mobile' => get_field( Constants::ACF_FIELD_HOME . '_tabs_title_mobile' ),
		'items'        => get_field( Constants::ACF_FIELD_HOME . '_tabs_items' ),
		'items_mobile' => get_field( Constants::ACF_FIELD_HOME . '_tabs_items_mobile' ),
	)
);

get_template_part(
	'partials/advantages',
	null,
	array(
		'hide'         => get_field( Constants::ACF_FIELD_HOME . '_advantages_hide' ),
		'image'        => get_field( Constants::ACF_FIELD_HOME . '_advantages_image' ),
		'image_mobile' => get_field( Constants::ACF_FIELD_HOME . '_advantages_image_mobile' ),
		'title'        => get_field( Constants::ACF_FIELD_HOME . '_advantages_title' ),
		'items'        => get_field( Constants::ACF_FIELD_HOME . '_advantages_items' ),
		'cta'          => get_field( Constants::ACF_FIELD_HOME . '_advantages_cta' ),
	)
);

get_template_part(
	'partials/stack',
	null,
	array(
		'hide'         => get_field( Constants::ACF_FIELD_HOME . '_stack_hide' ),
		'title'        => get_field( Constants::ACF_FIELD_HOME . '_stack_title' ),
		'title_mobile' => get_field( Constants::ACF_FIELD_HOME . '_stack_title_mobile' ),
		'items'        => get_field( Constants::ACF_FIELD_HOME . '_stack_items' ),
	)
);

get_template_part(
	'partials/partners',
	null,
	array(
		'hide'  => get_field( Constants::ACF_FIELD_HOME . '_partners_hide' ),
		'title' => get_field( Constants::ACF_FIELD_HOME . '_partners_title' ),
		'items' => get_field( Constants::ACF_FIELD_HOME . '_partners_items' ),
	)
);

get_template_part(
	'partials/clients',
	null,
	array(
		'hide'        => get_field( Constants::ACF_FIELD_HOME . '_clients_hide' ),
		'title'       => get_field( Constants::ACF_FIELD_HOME . '_clients_title' ),
		'description' => get_field( Constants::ACF_FIELD_SERVICES . '_clients_description' ),
		'items'       => get_field( Constants::ACF_FIELD_HOME . '_clients_items' ),
		'cta'         => get_field( Constants::ACF_FIELD_HOME . '_clients_cta' ),
		'classes'     => 'desktop',
	)
);

get_template_part(
	'partials/request',
	null,
	array(
		'hide'        => get_field( Constants::ACF_FIELD_HOME . '_request_hide' ),
		'title'       => get_field( Constants::ACF_FIELD_HOME . '_request_title' ),
		'threats'     => get_field( Constants::ACF_FIELD_HOME . '_request_threats' ),
		'description' => get_field( Constants::ACF_FIELD_HOME . '_request_description' ),
		'phone'       => get_field( Constants::ACF_FIELD_HOME . '_request_phone' ),
		'email'       => get_field( Constants::ACF_FIELD_HOME . '_request_email' ),
		'cta'         => get_field( Constants::ACF_FIELD_HOME . '_request_cta' ),
	)
);

get_template_part(
	'partials/companies',
	null,
	array(
		'hide'         => get_field( Constants::ACF_FIELD_HOME . '_companies_hide' ),
		'title'        => get_field( Constants::ACF_FIELD_HOME . '_companies_title' ),
		'title_mobile' => get_field( Constants::ACF_FIELD_HOME . '_companies_title_mobile' ),
		'items'        => get_field( Constants::ACF_FIELD_HOME . '_companies_items' ),
	)
);

get_template_part(
	'partials/faq',
	null,
	array(
		'hide'  => get_field( Constants::ACF_FIELD_HOME . '_faq_hide' ),
		'title' => get_field( Constants::ACF_FIELD_HOME . '_faq_title' ),
		'items' => get_field( Constants::ACF_FIELD_HOME . '_faq_items' ),
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
		'title' => esc_html__( 'Блог', 'xorit' ),
		'items' => $latest_posts->get_posts(),
	)
);

get_footer();
