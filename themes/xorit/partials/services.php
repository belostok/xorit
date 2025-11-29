<?php

use xoritTheme\Constants\Constants;

use function xoritTheme\Helpers\trim_string;
use function xoritTheme\Helpers\get_array;

$hide = (bool) ( $args['hide'] ?? false );

if ( $hide ) {
	return null;
}

$_post_id = get_the_ID();
$_title   = trim_string( $args['title'] ?? '' );
$_title   = $_title ? $_title : trim_string( get_field( Constants::ACF_FIELD_OPTIONS . '_services_title', 'option' ) );
$items    = get_array( $args['items'] ?? array() );
$items    = ! empty( $items ) ? $items : get_array( get_field( Constants::ACF_FIELD_OPTIONS . '_services_items', 'option' ) );
$classes  = trim_string( $args['classes'] ?? '' );

if ( empty( $items ) ) {
	$args  = array(
		'post_type'      => Constants::PT_SLUG_SERVICES,
		'posts_per_page' => 100,
		'post_status'    => array( 'publish', 'draft' ),
		'fields'         => 'ids',
	);
	$query = new \WP_Query( $args );
	$items = $query->posts;
}

if ( empty( $items ) ) {
	return null;
}
?>
<section id="services" class="x-services container <?php echo esc_attr( $classes ); ?>">
	<div class="x-services__wrapper wrapper">
		<?php if ( $_title ) : ?>
			<div class="x-services__title-container">
				<h2 class="x-services__title h2">
					<?php echo wp_kses_post( $_title ); ?>
				</h2>
			</div>
		<?php endif; ?>
		<div class="x-services__items">
			<div
			class="x-services__slider x-services__slider_desktop desktop js-x-services-slider"
			data-autoplay="1"
			>
				<div class="swiper-wrapper">
					<?php
					$i = 0;
					foreach ( $items as $item ) :
						$item_status = get_post_status( $item );
						$is_draft    = $item_status === 'draft';

						if ( $item === $_post_id || ( $item_status !== 'publish' && ! $is_draft ) ) {
							continue;
						}

						$item_title = trim_string( get_field( Constants::ACF_FIELD_SERVICES . '_preview_title', $item ) );
						$item_title = $item_title ? $item_title : get_the_title( $item );

						if ( ! $item_title ) {
							continue;
						}

						$item_link  = $is_draft ? '' : get_the_permalink( $item );
						$item_image = (int) get_field( Constants::ACF_FIELD_SERVICES . '_preview_image', $item );

						if ( $i % 4 === 0 ) {
							echo '<div class="x-services__slider-group swiper-slide">';
						}
						?>
						<<?php echo esc_attr( $item_link ? 'a href=' . esc_url( $item_link ) : 'div' ); ?> class="x-services__slide relative flex jcc aic">
							<?php if ( $item_image ) : ?>
								<div class="x-services__slide-image-container absolute img-cover">
									<?php xorit_the_image( $item_image, 'x-services__slide-image' ); ?>
								</div>
							<?php endif; ?>
							<div class="x-services__slide-title-container relative">
								<h3 class="x-services__slide-title">
									<?php echo wp_kses_post( $item_title ); ?>
								</h3>
							</div>
						</<?php echo esc_attr( $item_link ? 'a' : 'div' ); ?>>
						<?php
						$i ++;
						if ( $i % 4 === 0 ) {
							echo '</div>';
						}
					endforeach;

					if ( $i % 4 !== 0 ) {
						echo '</div>';
					}
					?>
				</div>
			</div>

			<div
				class="x-services__slider x-services__slider_mobile mobile js-x-services-slider-mobile"
				data-autoplay="1"
			>
				<div class="swiper-wrapper">
					<?php
					foreach ( $items as $item ) :
						$item_status = get_post_status( $item );
						$is_draft    = $item_status === 'draft';

						if ( $item === $_post_id || ( $item_status !== 'publish' && ! $is_draft ) ) {
							continue;
						}

						$item_title = trim_string( get_field( Constants::ACF_FIELD_SERVICES . '_preview_title', $item ) );
						$item_title = $item_title ? $item_title : get_the_title( $item );

						if ( ! $item_title ) {
							continue;
						}

						$item_link         = $is_draft ? '' : get_the_permalink( $item );
						$item_image        = (int) get_field( Constants::ACF_FIELD_SERVICES . '_preview_image', $item );
						$item_image_mobile = (int) get_field( Constants::ACF_FIELD_SERVICES . '_preview_image_mobile', $item );
						$item_image_mobile = $item_image_mobile ? $item_image_mobile : $item_image;
						?>
						<<?php echo esc_attr( $item_link ? 'a href=' . esc_url( $item_link ) : 'div' ); ?> class="x-services__slide swiper-slide relative flex jcc aic default-hover">
							<?php if ( $item_image_mobile ) : ?>
								<div class="x-services__slide-image-container absolute img-cover">
									<?php xorit_the_image( $item_image_mobile, 'x-services__slide-image' ); ?> ?>
								</div>
							<?php endif; ?>
							<div class="x-services__slide-title-container">
								<h3 class="x-services__slide-title">
									<?php echo wp_kses_post( $item_title ); ?>
								</h3>
							</div>
						</<?php echo esc_attr( $item_link ? 'a' : 'div' ); ?>>
						<?php
					endforeach;
					?>
				</div>

				<div class="x-services__slider-nav-container flex aic jcc">
					<button class="x-services__slider-nav x-services__slider-nav_prev x-nav img-contain js-x-nav-prev">
						<svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
							<ellipse cx="10.5" cy="10.5" rx="10.5" ry="10.5"
								transform="matrix(1 9.28593e-08 8.23045e-08 -1 0.5 21.5)" stroke="#20202C"/>
							<path d="M12.5 7.5L8.5 11.0004L12.5 14.5" stroke="#20202C"/>
						</svg>
					</button>
					<div class="x-services__slider-pagination x-pagination flex fwrap jcc js-x-pagination"></div>
					<button class="x-services__slider-nav x-services__slider-nav_next x-nav img-contain js-x-nav-next">
						<svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
							<ellipse cx="11" cy="11" rx="10.5" ry="10.5" transform="rotate(180 11 11)"
								stroke="#20202C"/>
							<path d="M9.5 7.5L13.5 11.0004L9.5 14.5" stroke="#20202C"/>
						</svg>
					</button>
				</div>
			</div>
		</div>
	</div>
</section>
