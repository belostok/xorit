<?php
/**
 * The front page template file
 */

use xoritTheme\Constants\Constants;

get_header();
?>

<?php get_template_part( 'partials/main-hero' ); ?>

<?php
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
?>

<?php
get_template_part(
	'partials/simple-banner',
	null,
	array(
		'hide'         => get_field( Constants::ACF_FIELD_HOME . '_simple_banner_hide' ),
		'title'        => get_field( Constants::ACF_FIELD_HOME . '_simple_banner_title' ),
		'title_mobile' => get_field( Constants::ACF_FIELD_HOME . '_simple_banner_title_mobile' ),
		'description'  => get_field( Constants::ACF_FIELD_HOME . '_simple_banner_description' ),
		'cta'          => get_field( Constants::ACF_FIELD_HOME . '_simple_banner_cta' ),
	)
);
?>

<?php
get_template_part(
	'partials/services',
	null,
	array(
		'hide'  => get_field( Constants::ACF_FIELD_HOME . '_services_hide' ),
		'title' => get_field( Constants::ACF_FIELD_HOME . '_services_title' ),
		'items' => get_field( Constants::ACF_FIELD_HOME . '_services_items' ),
	)
);
?>

<?php
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
?>

<?php
get_template_part(
	'partials/advantages',
	null,
	array(
		'hide'  => get_field( Constants::ACF_FIELD_HOME . '_advantages_hide' ),
		'image' => get_field( Constants::ACF_FIELD_HOME . '_advantages_image' ),
		'title' => get_field( Constants::ACF_FIELD_HOME . '_advantages_title' ),
		'items' => get_field( Constants::ACF_FIELD_HOME . '_advantages_items' ),
	)
);
?>

<?php
get_template_part(
	'partials/stack',
	null,
	array(
		'hide'  => get_field( Constants::ACF_FIELD_HOME . '_stack_hide' ),
		'title' => get_field( Constants::ACF_FIELD_HOME . '_stack_title' ),
		'items' => get_field( Constants::ACF_FIELD_HOME . '_stack_items' ),
	)
);
?>

<?php
get_template_part(
	'partials/partners',
	null,
	array(
		'hide'  => get_field( Constants::ACF_FIELD_HOME . '_partners_hide' ),
		'title' => get_field( Constants::ACF_FIELD_HOME . '_partners_title' ),
		'items' => get_field( Constants::ACF_FIELD_HOME . '_partners_items' ),
	)
);
?>

<?php
get_template_part(
	'partials/clients',
	null,
	array(
		'hide'    => get_field( Constants::ACF_FIELD_HOME . '_clients_hide' ),
		'title'   => get_field( Constants::ACF_FIELD_HOME . '_clients_title' ),
		'items'   => get_field( Constants::ACF_FIELD_HOME . '_clients_items' ),
		'cta'     => get_field( Constants::ACF_FIELD_HOME . '_clients_cta' ),
		'classes' => 'desktop',
	)
);
?>

<?php
get_template_part(
	'partials/request',
	null,
	array(
		'hide'        => get_field( Constants::ACF_FIELD_HOME . '_request_hide' ),
		'title'       => get_field( Constants::ACF_FIELD_HOME . '_request_title' ),
		'description' => get_field( Constants::ACF_FIELD_HOME . '_request_description' ),
		'phone'       => get_field( Constants::ACF_FIELD_HOME . '_request_phone' ),
		'email'       => get_field( Constants::ACF_FIELD_HOME . '_request_email' ),
		'cta'         => get_field( Constants::ACF_FIELD_HOME . '_request_cta' ),
	)
);
?>

<?php
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
?>

<?php
get_footer();
