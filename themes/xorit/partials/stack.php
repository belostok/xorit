<?php

use xoritTheme\Constants\Constants;
use function xoritTheme\Helpers\trim_string;
use function xoritTheme\Helpers\get_array;

$hide = (bool) ( $args['hide'] ?? false );

if ( $hide ) {
	return null;
}

$_title       = trim_string( $args['title'] ?? '' );
$_title       = $_title ? $_title : trim_string( get_field( Constants::ACF_FIELD_OPTIONS . '_stack_title', 'option' ) );
$title_mobile = trim_string( $args['title_mobile'] ?? '' );
$title_mobile = $title_mobile ? $title_mobile : trim_string( get_field( Constants::ACF_FIELD_OPTIONS . '_stack_title_mobile', 'option' ) );
$title_mobile = $title_mobile ? $title_mobile : $_title;
$items        = get_array( $args['items'] ?? array() );
$items        = ! empty( $items ) ? $items : get_array( get_field( Constants::ACF_FIELD_OPTIONS . '_stack_items', 'option' ) );
$classes      = trim_string( $args['classes'] ?? '' );

if ( empty( $items ) ) {
	return null;
}
?>
<section class="x-stack container <?php echo esc_attr( $classes ); ?>">
	<div class="x-stack__wrapper wrapper">
		<?php if ( $_title ) : ?>
			<div class="x-stack__title-container">
				<h2 class="x-stack__title h2 desktop">
					<?php echo wp_kses_post( $_title ); ?>
				</h2>
				<h2 class="x-stack__title h2 mobile">
					<?php echo wp_kses_post( $title_mobile ); ?>
				</h2>
			</div>
		<?php endif; ?>
		<div class="x-stack__items flex fwrap jcc relative desktop">
			<div class="x-stack__image-container absolute">
				<img
					width="1440"
					height="328"
					class="x-stack__image"
					src="<?php echo esc_url( XORIT_STATIC_MEDIA_URL . 'stack.svg' ); ?>"
					alt="<?php echo esc_attr( $_title ); ?>"
				>
			</div>
			<?php
			$i = 0;
			$d = 0;
			foreach ( $items as $item ) :
				$item_title = trim_string( $item['title'] ?? '' );

				if ( ! $item_title ) {
					continue;
				}
				?>
				<div
					class="x-stack__item js-x-fade-up-item"
					data-delay="<?php echo esc_attr( $d ); ?>"
				>
					<div class="x-stack__item-inner flex jcc aic">
						<div class="x-stack__item-title-container">
							<p class="x-stack__item-title body-1">
								<?php echo wp_kses_post( $item_title ); ?>
							</p>
						</div>
					</div>
				</div>
				<?php
				$i ++;
				$d += 0.3;

				if ( $i % 4 === 0 ) {
					$d = 0;
				}
			endforeach;
			?>
		</div>
		<div
			class="x-stack__items mobile js-x-stack-slider"
			data-autoplay="1"
		>
			<div class="swiper-wrapper">
				<?php
				foreach ( $items as $item ) :
					$item_title = trim_string( $item['title'] ?? '' );

					if ( ! $item_title ) {
						continue;
					}
					?>
					<div class="x-stack__item swiper-slide">
						<div class="x-stack__item-inner flex jcc aic">
							<div class="x-stack__item-title-container">
								<p class="x-stack__item-title body-1">
									<?php echo wp_kses_post( $item_title ); ?>
								</p>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
			<div class="x-stack__slider-nav-container flex aic jcc">
				<button class="x-stack__slider-nav x-stack__slider-nav_prev x-nav img-contain js-x-nav-prev">
					<svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
						<ellipse cx="10.5" cy="10.5" rx="10.5" ry="10.5"
							transform="matrix(1 9.28593e-08 8.23045e-08 -1 0.5 21.5)" stroke="#20202C"/>
						<path d="M12.5 7.5L8.5 11.0004L12.5 14.5" stroke="#20202C"/>
					</svg>
				</button>
				<div class="x-stack__slider-pagination x-pagination flex fwrap jcc js-x-pagination"></div>
				<button class="x-stack__slider-nav x-stack__slider-nav_next x-nav img-contain js-x-nav-next">
					<svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
						<ellipse cx="11" cy="11" rx="10.5" ry="10.5" transform="rotate(180 11 11)"
							stroke="#20202C"/>
						<path d="M9.5 7.5L13.5 11.0004L9.5 14.5" stroke="#20202C"/>
					</svg>
				</button>
			</div>
		</div>
	</div>
</section>
