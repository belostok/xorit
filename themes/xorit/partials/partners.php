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
<section class="x-partners container <?php echo esc_attr( $classes ); ?>">
	<div class="x-partners__wrapper wrapper">
		<?php if ( $_title ) : ?>
			<div class="x-partners__title-container">
				<h2 class="x-partners__title h2">
					<?php echo wp_kses_post( $_title ); ?>
				</h2>
			</div>
		<?php endif; ?>
		<div class="x-partners__items">
			<?php
			$i = 0;
			while ( $i < 2 ) :
				echo '<div class="x-partners__items-group x-partners__items-group_g' . esc_html( $i ) . '">';
				foreach ( $items as $item ) :
					$item_image = (int) ( $item['image'] ?? 0 );

					if ( ! $item_image ) {
						continue;
					}
					?>
					<div class="x-partners__item">
						<div class="x-partners__item-image-container">
							<?php xorit_the_image( $item_image, 'x-partners__item-image' ); ?>
						</div>
					</div>
					<?php
				endforeach;
				echo '</div>';
				$i++;
			endwhile;
			?>
		</div>
	</div>
</section>
