<?php

use function xoritTheme\Helpers\trim_string;
use function xoritTheme\Helpers\get_array;

$hide = (bool) ( $args['hide'] ?? false );

if ( $hide ) {
	return null;
}

$_title  = trim_string( $args['title'] ?? '' );
$items   = get_array( $args['items'] ?? array() );
$image   = (int) ( $args['image'] ?? 0 );
$classes = trim_string( $args['classes'] ?? '' );

if ( empty( $items ) ) {
	return null;
}
?>
<section class="x-steps container <?php echo esc_attr( $classes ); ?>">
	<div class="x-steps__wrapper wrapper">
		<?php if ( $_title ) : ?>
			<div class="x-steps__title-container">
				<h2 class="x-steps__title h2">
					<?php echo wp_kses_post( $_title ); ?>
				</h2>
			</div>
		<?php endif; ?>
		<div class="x-steps__grid">
			<div class="x-steps__text">
				<div class="x-steps__items flex fdc">
					<?php
					foreach ( $items as $item ) :
						$item_title       = trim_string( $item['title'] ?? '' );
						$item_description = trim_string( $item['description'] ?? '' );

						if ( ! $item_title && ! $item_description ) {
							continue;
						}
						?>
						<div class="x-steps__item flex fdc">
							<?php if ( $item_title ) : ?>
								<div class="x-steps__item-title-container">
									<h4 class="x-steps__item-title h4">
										<?php echo wp_kses_post( $item_title ); ?>
									</h4>
								</div>
							<?php endif; ?>
							<?php if ( $item_description ) : ?>
								<div class="x-steps__item-description-container">
									<p class="x-steps__item-description body-1">
										<?php echo wp_kses_post( $item_description ); ?>
									</p>
								</div>
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
			<?php if ( $image ) : ?>
				<div class="x-steps__image-container">
					<?php xorit_the_image( $image, 'x-steps__image' ); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
