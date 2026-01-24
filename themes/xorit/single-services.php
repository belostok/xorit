<?php
/**
 * Services post template
 */

use xoritTheme\Constants\Constants;

$post_parent = wp_get_post_parent_id( get_the_ID() );

get_header();

if ( $post_parent ) {
	$key = Constants::ACF_FIELD_SERVICES . '_child';

	get_template_part(
		'partials/infographics',
		null,
		array(
			'hide'       => get_field( $key . '_infograph_hide' ),
			'image'      => get_field( $key . '_infograph_image' ),
			'is_h1'      => get_field( $key . '_infograph_h1' ),
			'title'      => get_field( $key . '_infograph_title' ),
			'hide_upper' => get_field( $key . '_infograph_hide_upper' ),
			'you_do'     => get_field( $key . '_infograph_you' ),
			'we_do'      => get_field( $key . '_infograph_we' ),
			'cards'      => get_field( $key . '_infograph_cards' ),
			'classes'    => 'x-infographics_service-hero',
		)
	);

	get_template_part(
		'partials/simple-three-cards',
		null,
		array(
			'hide'  => get_field( $key . '_simple_cards_hide' ),
			'title' => get_field( $key . '_simple_cards_title' ),
			'items' => get_field( $key . '_simple_cards_items' ),
		)
	);

	get_template_part(
		'partials/advantages',
		null,
		array(
			'hide'         => get_field( $key . '_advantages_hide' ),
			'image'        => get_field( $key . '_advantages_image' ),
			'image_mobile' => get_field( $key . '_advantages_image_mobile' ),
			'title'        => get_field( $key . '_advantages_title' ),
			'items'        => get_field( $key . '_advantages_items' ),
			'cta'          => get_field( $key . '_advantages_cta' ),
			'classes'      => 'x-advantages_mobile-points x-advantages_service',
		)
	);

	get_template_part(
		'partials/services',
		null,
		array(
			'hide'    => get_field( $key . '_services_hide' ),
			'title'   => get_field( $key . '_services_title' ),
			'items'   => get_field( $key . '_services_items' ),
			'classes' => 'x-services_service',
		)
	);

	get_template_part(
		'partials/request',
		null,
		array(
			'hide'        => get_field( $key . '_request_hide' ),
			'title'       => get_field( $key . '_request_title' ),
			'threats'     => get_field( $key . '_request_threats' ),
			'description' => get_field( $key . '_request_description' ),
			'phone'       => get_field( $key . '_request_phone' ),
			'email'       => get_field( $key . '_request_email' ),
			'cta'         => get_field( $key . '_request_cta' ),
			'classes'     => 'x-request_service',
		)
	);
} else {
	get_template_part(
		'partials/single-hero',
		null,
		array(
			'title'        => get_field( Constants::ACF_FIELD_SERVICES . '_hero_title' ),
			'description'  => get_field( Constants::ACF_FIELD_SERVICES . '_hero_description' ),
			'variant'      => get_field( Constants::ACF_FIELD_SERVICES . '_hero_variant' ),
			'image'        => get_field( Constants::ACF_FIELD_SERVICES . '_hero_image' ),
			'image_mobile' => get_field( Constants::ACF_FIELD_SERVICES . '_hero_image_mobile' ),
			'cta'          => get_field( Constants::ACF_FIELD_SERVICES . '_hero_cta' ),
		)
	);

	get_template_part(
		'partials/four-cards',
		null,
		array(
			'hide'  => get_field( Constants::ACF_FIELD_SERVICES . '_cards_hide' ),
			'title' => get_field( Constants::ACF_FIELD_SERVICES . '_cards_title' ),
			'items' => get_field( Constants::ACF_FIELD_SERVICES . '_cards_items' ),
		)
	);

	get_template_part(
		'partials/clients',
		null,
		array(
			'hide'          => get_field( Constants::ACF_FIELD_SERVICES . '_child_hide' ),
			'title'         => get_field( Constants::ACF_FIELD_SERVICES . '_child_title' ),
			'description'   => get_field( Constants::ACF_FIELD_SERVICES . '_child_description' ),
			'items'         => get_field( Constants::ACF_FIELD_SERVICES . '_child_services' ),
			'is_categories' => true,
		)
	);

	get_template_part(
		'partials/infographics',
		null,
		array(
			'hide'       => get_field( Constants::ACF_FIELD_SERVICES . '_infograph_hide' ),
			'image'      => get_field( Constants::ACF_FIELD_SERVICES . '_infograph_image' ),
			'is_h1'      => get_field( Constants::ACF_FIELD_SERVICES . '_infograph_h1' ),
			'title'      => get_field( Constants::ACF_FIELD_SERVICES . '_infograph_title' ),
			'hide_upper' => get_field( Constants::ACF_FIELD_SERVICES . '_infograph_hide_upper' ),
			'you_do'     => get_field( Constants::ACF_FIELD_SERVICES . '_infograph_you' ),
			'we_do'      => get_field( Constants::ACF_FIELD_SERVICES . '_infograph_we' ),
			'cards'      => get_field( Constants::ACF_FIELD_SERVICES . '_infograph_cards' ),
		)
	);

	$services_key = Constants::ACF_FIELD_SERVICES . '_services';
	get_template_part(
		'partials/faq',
		null,
		array(
			'hide'        => get_field( $services_key . '_faq_hide' ),
			'title'       => get_field( $services_key . '_faq_title' ),
			'items'       => get_field( $services_key . '_faq_items' ),
			'is_columns'  => get_field( $services_key . '_faq_columns' ),
			'image'       => get_field( $services_key . '_faq_image' ),
			'no_override' => true,
			'classes'     => 'x-faq_light',
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
			'cta'          => get_field( Constants::ACF_FIELD_SERVICES . '_advantages_cta' ),
			'classes'      => 'x-advantages_mobile-points',
		)
	);

	get_template_part(
		'partials/steps',
		null,
		array(
			'hide'  => get_field( Constants::ACF_FIELD_SERVICES . '_steps_hide' ),
			'image' => get_field( Constants::ACF_FIELD_SERVICES . '_steps_image' ),
			'title' => get_field( Constants::ACF_FIELD_SERVICES . '_steps_title' ),
			'items' => get_field( Constants::ACF_FIELD_SERVICES . '_steps_items' ),
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
			'image'        => get_field( Constants::ACF_FIELD_SERVICES . '_simple_banner_image' ),
		)
	);

	get_template_part(
		'partials/three-cards',
		null,
		array(
			'hide'  => get_field( Constants::ACF_FIELD_SERVICES . '_three_cards_hide' ),
			'items' => get_field( Constants::ACF_FIELD_SERVICES . '_three_cards_items' ),
		)
	);

	get_template_part(
		'partials/logo-groups',
		null,
		array(
			'hide'   => get_field( Constants::ACF_FIELD_SERVICES . '_logo_groups_hide' ),
			'groups' => get_field( Constants::ACF_FIELD_SERVICES . '_logo_groups_groups' ),
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
			'threats'     => get_field( Constants::ACF_FIELD_SERVICES . '_request_threats' ),
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
			'hide'       => get_field( Constants::ACF_FIELD_SERVICES . '_faq_hide' ),
			'title'      => get_field( Constants::ACF_FIELD_SERVICES . '_faq_title' ),
			'items'      => get_field( Constants::ACF_FIELD_SERVICES . '_faq_items' ),
			'is_columns' => get_field( Constants::ACF_FIELD_SERVICES . '_faq_columns' ),
			'image'      => get_field( Constants::ACF_FIELD_SERVICES . '_faq_image' ),
			'classes'    => 'x-faq_light',
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
}

get_footer();
