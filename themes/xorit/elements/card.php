<?php

use function xoritTheme\Helpers\trim_string;

$_title  = trim_string( $args['title'] ?? '' );
$image   = (int) ( $args['image'] ?? 0 );
$classes = trim_string( $args['classes'] ?? '' );

if ( ! $image ) {
	$classes .= ' x-card_no-image';
}

if ( ! $_title ) {
	return null;
}
?>
<div class="x-card <?php echo esc_attr( $classes ); ?>">
	<div class="x-card__inner flex fdc aic">
		<?php if ( $image ) : ?>
			<div class="x-card__image-container img-contain">
				<?php xorit_the_image( $image, 'x-card__image' ); ?>
			</div>
		<?php endif; ?>
		<div class="x-card__title-container">
			<h4 class="x-card__title h4">
				<?php echo wp_kses_post( $_title ); ?>
			</h4>
		</div>
	</div>
</div>
