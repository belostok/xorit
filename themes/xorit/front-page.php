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
get_footer();
