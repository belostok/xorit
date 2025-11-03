<?php

use function xoritTheme\Helpers\trim_string;
use function xoritTheme\Helpers\get_array;

$hide = (bool) ( $args['hide'] ?? false );

if ( $hide ) {
	return null;
}

$_title       = trim_string( $args['title'] ?? '' );
$title_mobile = trim_string( $args['title_mobile'] ?? '' );
$title_mobile = $title_mobile ? $title_mobile : $_title;
$items        = get_array( $args['items'] ?? array() );
$classes      = trim_string( $args['classes'] ?? '' );

if ( empty( $items ) ) {
	return null;
}
?>
<section class="x-companies container <?php echo esc_attr( $classes ); ?>">
	<div class="x-companies__wrapper wrapper">
		<?php if ( $_title ) : ?>
			<div class="x-companies__title-container">
				<h2 class="x-companies__title h2 desktop">
					<?php echo wp_kses_post( $_title ); ?>
				</h2>
				<h2 class="x-companies__title h2 mobile">
					<?php echo wp_kses_post( $title_mobile ); ?>
				</h2>
			</div>
		<?php endif; ?>
		<div class="x-companies__items flex fwrap jcc">
			<?php
			foreach ( $items as $item ) :
				$item_image = (int) ( $item['image'] ?? 0 );

				if ( ! $item_image ) {
					continue;
				}
				?>
				<div class="x-companies__item flex jcc aic">
					<?php xorit_the_image( $item_image, 'x-companies__item-image' ); ?>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
