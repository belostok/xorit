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
<section class="x-documents container <?php echo esc_attr( $classes ); ?>">
	<div class="x-documents__wrapper wrapper">
		<?php if ( $_title ) : ?>
			<div class="x-documents__title-container">
				<h2 class="x-documents__title h2">
					<?php echo wp_kses_post( $_title ); ?>
				</h2>
			</div>
		<?php endif; ?>
		<div class="x-documents__items flex fwrap jcc">
			<?php
			foreach ( $items as $item ) :
				$item_title = trim_string( $item['title'] ?? '' );
				$item_link  = trim_string( $item['file'] ?? '' );

				if ( ! $item_title ) {
					continue;
				}
				?>
				<?php if ( $item_link ) : ?>
					<a href="<?php echo esc_url( $item_link ); ?>" class="x-documents__item default-hover" download>
				<?php else : ?>
					<div class="x-documents__item">
				<?php endif; ?>
					<div class="x-documents__item-inner flex jcc aic">
						<div class="x-documents__item-title-container">
							<h4 class="x-documents__item-title h4">
								<?php echo wp_kses_post( $item_title ); ?>
							</h4>
						</div>
					</div>
				</<?php echo esc_attr( $item_link ? 'a' : 'div' ); ?>>
			<?php endforeach; ?>
		</div>
	</div>
</section>
