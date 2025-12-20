<?php

use function xoritTheme\Helpers\get_link_details;
use function xoritTheme\Helpers\trim_string;
use function xoritTheme\Helpers\get_array;

$hide = (bool) ( $args['hide'] ?? false );

if ( $hide ) {
	return null;
}

$_title       = trim_string( $args['title'] ?? '' );
$image        = (int) ( $args['image'] ?? 0 );
$image_mobile = (int) ( $args['image_mobile'] ?? 0 );
$items        = get_array( $args['items'] ?? array() );
$cta          = get_link_details( $args['cta'] ?? array() );
$classes      = trim_string( $args['classes'] ?? '' );

if ( empty( $items ) ) {
	return null;
}
?>
<section class="x-advantages container relative <?php echo esc_attr( $classes ); ?>">
	<?php if ( $image || $image_mobile ) : ?>
		<div class="x-advantages__image-container absolute js-x-fade-item">
			<?php
			if ( $image ) :
				xorit_the_image( $image, 'x-advantages__image desktop' );
			endif;
			if ( $image_mobile ) :
				xorit_the_image( $image_mobile, 'x-advantages__image mobile' );
			endif;
			?>
		</div>
	<?php endif; ?>
	<div class="x-advantages__wrapper wrapper">
		<?php if ( $_title ) : ?>
			<div class="x-advantages__title-container">
				<h2 class="x-advantages__title h2">
					<?php echo wp_kses_post( $_title ); ?>
				</h2>
			</div>
		<?php endif; ?>
		<div class="x-advantages__items">
			<?php
			foreach ( $items as $item ) :
				$item_title       = trim_string( $item['title'] ?? '' );
				$item_description = trim_string( $item['description'] ?? '' );

				if ( ! $item_title && ! $item_description ) {
					continue;
				}
				?>
					<div class="x-advantages__item flex fdc">
						<?php if ( $item_title ) : ?>
							<div class="x-advantages__item-title-container">
								<h4 class="x-advantages__item-title h4">
									<?php echo wp_kses_post( $item_title ); ?>
								</h4>
							</div>
						<?php endif; ?>
						<?php if ( $item_description ) : ?>
							<p class="x-advantages__item-description body-1">
								<?php echo wp_kses_post( $item_description ); ?>
							</p>
						<?php endif; ?>
					</div>
				<?php
			endforeach;
			?>
		</div>
		<?php if ( ! empty( $cta ) ) : ?>
			<div class="x-advantages__button-container flex jcc">
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
