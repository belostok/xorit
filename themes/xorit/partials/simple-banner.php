<?php

use xoritTheme\Constants\Constants;
use function xoritTheme\Helpers\trim_string;
use function xoritTheme\Helpers\get_array;
use function xoritTheme\Helpers\get_link_details;

$hide = (bool) ( $args['hide'] ?? false );

if ( $hide ) {
	return null;
}

$_title       = trim_string( $args['title'] ?? '' );
$_title       = $_title ? $_title : trim_string( get_field( Constants::ACF_FIELD_OPTIONS . '_simple_banner_title', 'option' ) );
$title_mobile = trim_string( $args['title_mobile'] ?? '' );
$title_mobile = $title_mobile ? $title_mobile : trim_string( get_field( Constants::ACF_FIELD_OPTIONS . '_simple_banner_title_mobile', 'option' ) );
$title_mobile = $title_mobile ? $title_mobile : $_title;
$description  = trim_string( $args['description'] ?? '' );
$description  = $description ? $description : trim_string( get_field( Constants::ACF_FIELD_OPTIONS . '_simple_banner_description', 'option' ) );
$cta          = get_link_details( get_array( $args['cta'] ?? array() ) );
$cta          = ! empty( $cta ) ? $cta : get_array( get_field( Constants::ACF_FIELD_OPTIONS . '_simple_banner_cta', 'option' ) );
$classes      = trim_string( $args['classes'] ?? '' );

if ( ! $_title && ! $description ) {
	return null;
}
?>
<section class="x-simple-banner container <?php echo esc_attr( $classes ); ?>">
	<div class="x-simple-banner__wrapper wrapper flex fdc">
		<?php if ( $_title ) : ?>
			<div class="x-simple-banner__title-container js-x-fade-item">
				<h2 class="x-simple-banner__title h2 desktop">
					<?php echo wp_kses_post( $_title ); ?>
				</h2>
				<h2 class="x-simple-banner__title h2 mobile">
					<?php echo wp_kses_post( $title_mobile ); ?>
				</h2>
			</div>
		<?php endif; ?>
		<?php if ( $description ) : ?>
			<div class="x-simple-banner__description-container">
				<p class="x-simple-banner__description body-1">
					<?php echo wp_kses_post( $description ); ?>
				</p>
			</div>
		<?php endif; ?>
		<?php if ( ! empty( $cta ) ) : ?>
			<div class="x-simple-banner__button-container">
				<?php
				get_template_part(
					'elements/button',
					null,
					array(
						'link'   => $cta['url'] ?? '',
						'title'  => $cta['title'] ?? '',
						'target' => $cta['target'] ?? '',
					)
				);
				?>
			</div>
		<?php endif; ?>
	</div>
</section>
