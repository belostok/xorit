<?php

use function xoritTheme\Helpers\trim_string;
use function xoritTheme\Helpers\get_array;
use function xoritTheme\Helpers\get_link_details;

$_title       = trim_string( $args['title'] ?? '' );
$_title       = $_title ? $_title : get_the_title();
$description  = trim_string( $args['description'] ?? '' );
$image        = (int) ( $args['image'] ?? 0 );
$image_mobile = (int) ( $args['image_mobile'] ?? 0 );
$image_mobile = $image_mobile ? $image_mobile : $image;
$cta          = get_link_details( get_array( $args['cta'] ?? array() ) );
$classes      = trim_string( $args['classes'] ?? '' );

xorit_inline_style( 'single-hero' );
?>
<section class="x-single-hero container <?php echo esc_attr( $classes ); ?>">
	<div class="x-single-hero__wrapper wrapper flex">
		<?php if ( $image ) : ?>
			<div class="x-single-hero__background-image-container img-contain absolute">
				<?php xorit_the_image( $image, 'x-single-hero__background-image' ); ?>
			</div>
		<?php endif; ?>
		<div class="x-single-hero__content-container relative">
			<?php if ( $_title ) : ?>
				<div class="x-single-hero__title-container">
					<h1 class="x-single-hero__title h1">
						<?php echo wp_kses_post( $_title ); ?>
					</h1>
				</div>
			<?php endif; ?>
			<?php if ( $description ) : ?>
				<div class="x-single-hero__description-container">
					<p class="x-single-hero__description h3">
						<?php echo wp_kses_post( $description ); ?>
					</p>
				</div>
			<?php endif; ?>
			<?php if ( ! empty( $cta ) ) : ?>
				<div class="x-single-hero__button-container">
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
