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
<section class="x-simple-three-cards container <?php echo esc_attr( $classes ); ?>">
	<div class="x-simple-three-cards__wrapper wrapper">
		<?php if ( $_title ) : ?>
			<div class="x-simple-three-cards__title-container">
				<h2 class="x-simple-three-cards__title h2">
					<?php echo wp_kses_post( $_title ); ?>
				</h2>
			</div>
		<?php endif; ?>
		<div class="x-simple-three-cards__items flex fwrap jcc">
			<?php
			foreach ( $items as $item ) :
				$item_title = trim_string( $item['title'] ?? '' );

				if ( ! $item_title ) {
					continue;
				}
				?>
				<div class="x-simple-three-cards__item">
					<div class="x-simple-three-cards__item-inner flex jcc aic">
						<div class="x-simple-three-cards__item-title-container">
							<h4 class="x-simple-three-cards__item-title h4">
								<?php echo wp_kses_post( $item_title ); ?>
							</h4>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
