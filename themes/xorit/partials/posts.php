<?php

use function xoritTheme\Helpers\trim_string;
use function xoritTheme\Helpers\get_array;

$_title  = trim_string( $args['title'] ?? '' );
$items   = get_array( $args['items'] ?? array() );
$classes = trim_string( $args['classes'] ?? '' );

if ( empty( $items ) ) {
	return null;
}
?>
<section class="x-posts container <?php echo esc_attr( $classes ); ?>">
	<div class="x-posts__wrapper wrapper">
		<?php if ( $_title ) : ?>
			<div class="x-posts__title-container">
				<h2 class="x-posts__title h2">
					<?php echo wp_kses_post( $_title ); ?>
				</h2>
			</div>
		<?php endif; ?>
		<div class="x-posts__items">
			<?php
			foreach ( $items as $_post ) {
				$_post_id     = $_post->ID;
				$post_title   = trim_string( $_post->post_title ?? '' );
				$post_excerpt = trim_string( $_post->post_excerpt ?? '' );
				$post_excerpt = $post_excerpt ? $post_excerpt : wp_trim_words( $_post->post_content );
				$post_image   = get_post_thumbnail_id( $_post_id );
				$post_link    = get_permalink( $_post_id );

				get_template_part(
					'elements/post-item',
					null,
					array(
						'link'        => $post_link,
						'title'       => $post_title,
						'description' => $post_excerpt,
						'image'       => $post_image,
					)
				);
			}
			wp_reset_postdata();
			?>
		</div>
	</div>
</section>
