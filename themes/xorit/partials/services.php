<?php

use function xoritTheme\Helpers\trim_string;
use function xoritTheme\Helpers\get_array;

$hide = (bool) ( $args['hide'] ?? false );

if ( $hide ) {
	return null;
}

$_title  = trim_string( $args['title'] ?? '' );
$items   = get_array( $args['items'] ?? array() );
$classes = trim_string( $args['classes'] ?? '' );

if ( empty( $items ) ) {
	return null;
}
?>
<section class="x-services container <?php echo esc_attr( $classes ); ?>">
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
						$item_link  = trim_string( $item['link'] ?? '' );
						$item_image = (int) ( $item['image'] ?? 0 );
						$item_title = trim_string( $item['title'] ?? '' );

						if ( ! $item_title ) {
							continue;
						}

						if ( $i % 4 === 0 ) {
							echo '<div class="x-services__slider-group swiper-slide">';
						}
						?>
						<<?php echo esc_attr( $item_link ? 'a href=' . esc_url( $item_link ) : 'div' ); ?> class="x-services__slide relative flex jcc aic default-hover">
							<?php if ( $item_image ) : ?>
								<div class="x-services__slide-image-container absolute img-contain">
									<?php xorit_the_image( $item_image, 'x-services__slide-image' ); ?>
								</div>
							<?php endif; ?>
							<div class="x-services__slide-title-container">
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
						$item_link  = trim_string( $item['link'] ?? '' );
						$item_image = (int) ( $item['image'] ?? 0 );
						$item_title = trim_string( $item['title'] ?? '' );

						if ( ! $item_title ) {
							continue;
						}
						?>
						<<?php echo esc_attr( $item_link ? 'a href=' . esc_url( $item_link ) : 'div' ); ?> class="x-services__slide relative flex jcc aic default-hover">
							<?php if ( $item_image ) : ?>
								<div class="x-services__slide-image-container absolute img-contain">
									<?php xorit_the_image( $item_image, 'x-services__slide-image' ); ?> ?>
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
					<button class="x-services__slider-nav x-services__slider-nav_prev js-x-nav-prev">
						<svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
							<ellipse cx="10.5" cy="10.5" rx="10.5" ry="10.5"
								transform="matrix(1 9.28593e-08 8.23045e-08 -1 0.5 21.5)" stroke="#20202C"/>
							<path d="M12.5 7.5L8.5 11.0004L12.5 14.5" stroke="#20202C"/>
						</svg>
					</button>
					<div class="x-services__slider-pagination js-x-pagination"></div>
					<button class="x-services__slider-nav x-services__slider-nav_next js-x-nav-next">
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
