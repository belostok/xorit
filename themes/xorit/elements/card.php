<?php

use function xoritTheme\Helpers\trim_string;

$_title      = trim_string( $args['title'] ?? '' );
$description = trim_string( $args['description'] ?? '' );
$image       = (int) ( $args['image'] ?? 0 );
$classes     = trim_string( $args['classes'] ?? '' );

if ( ! $_title ) {
	return null;
}
?>
<div class="x-card <?php echo esc_attr( $classes ); ?>">
	<div class="x-card__inner flex fdc aic">
		<div class="x-card__image-container img-contain">
			<?php if ( $image ) : ?>
				<?php xorit_the_image( $image, 'x-card__image' ); ?>
			<?php endif; ?>
		</div>
		<div class="x-card__title-container">
			<h4 class="x-card__title h4">
				<?php echo wp_kses_post( $_title ); ?>
			</h4>
		</div>
		<?php if ( $description ) : ?>
			<div class="x-card__description-container">
				<p class="x-card__description body-1">
					<?php echo wp_kses_post( $description ); ?>
				</p>
			</div>
		<?php endif; ?>
	</div>
</div>
