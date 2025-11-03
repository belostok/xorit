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
<section class="x-stack container <?php echo esc_attr( $classes ); ?>">
	<div class="x-stack__wrapper wrapper">
		<?php if ( $_title ) : ?>
			<div class="x-stack__title-container">
				<h2 class="x-stack__title h2">
					<?php echo wp_kses_post( $_title ); ?>
				</h2>
			</div>
		<?php endif; ?>
		<div class="x-stack__items flex fwrap jcc relative">
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
	</div>
</section>
