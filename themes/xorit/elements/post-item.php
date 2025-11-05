<?php

use function xoritTheme\Helpers\trim_string;

$_link       = trim_string( $args['link'] ?? '' );
$_title      = trim_string( $args['title'] ?? '' );
$description = trim_string( $args['description'] ?? '' );
$image       = (int) ( $args['image'] ?? 0 );
$classes     = trim_string( $args['classes'] ?? '' );
?>
<a href="<?php echo esc_url( $_link ); ?>" class="x-post default-hover <?php echo esc_attr( $classes ); ?>">
	<div class="x-post__inner flex fdc">
		<?php if ( $image ) : ?>
			<div class="x-post__image-container img-cover">
				<?php xorit_the_image( $image, 'x-post__image' ); ?>
			</div>
		<?php endif; ?>
		<div class="x-post__content flex fdc">
			<?php if ( $_title ) : ?>
				<div class="x-post__title-container">
					<h4 class="x-post__title h4">
						<?php echo esc_html( $_title ); ?>
					</h4>
				</div>
			<?php endif; ?>
			<?php if ( $description ) : ?>
				<div class="x-post__description-container">
					<p class="x-post__description body-1">
						<?php echo esc_html( $description ); ?>
					</p>
				</div>
			<?php endif; ?>
		</div>
	</div>
</a>
