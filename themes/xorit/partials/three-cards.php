<?php

use function xoritTheme\Helpers\trim_string;
use function xoritTheme\Helpers\get_array;

$hide = (bool) ( $args['hide'] ?? false );

if ( $hide ) {
	return null;
}

$items   = get_array( $args['items'] ?? array() );
$classes = trim_string( $args['classes'] ?? '' );

if ( empty( $items ) ) {
	return null;
}
?>
<section class="x-three-cards container <?php echo esc_attr( $classes ); ?>">
	<div class="x-three-cards__wrapper wrapper">
		<div class="x-three-cards__items flex fwrap jcc">
			<?php
			foreach ( $items as $item ) :
				$item_title       = trim_string( $item['title'] ?? '' );
				$item_sub_title   = trim_string( $item['sub_title'] ?? '' );
				$item_description = trim_string( $item['description'] ?? '' );

				if ( ! $item_title && ! $item_sub_title && ! $item_description ) {
					continue;
				}
				?>
				<div class="x-three-cards__item">
					<div class="x-three-cards__item-inner">
						<?php if ( $item_title ) : ?>
							<div class="x-three-cards__item-title-container">
								<h2 class="x-three-cards__item-title h2">
									<?php echo esc_html( $item_title ); ?>
								</h2>
							</div>
						<?php endif; ?>
						<?php if ( $item_sub_title ) : ?>
							<div class="x-three-cards__item-sub-title-container">
								<h4 class="x-three-cards__item-sub-title h4">
									<?php echo wp_kses_post( $item_sub_title ); ?>
								</h4>
							</div>
						<?php endif; ?>
						<?php if ( $item_description ) : ?>
							<div class="x-three-cards__item-description-container">
								<p class="x-three-cards__item-description body-1">
									<?php echo wp_kses_post( $item_description ); ?>
								</p>
							</div>
						<?php endif; ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
