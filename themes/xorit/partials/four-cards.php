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

// Calculate animation duration based on items count (5s per item for consistent speed).
$items_count        = count( $items );
$animation_duration = $items_count * 5;
?>
<section class="x-four-cards container <?php echo esc_attr( $classes ); ?>">
	<div class="x-four-cards__wrapper wrapper">
		<?php if ( $_title ) : ?>
			<div class="x-four-cards__title-container">
				<h2 class="x-four-cards__title h2">
					<?php echo wp_kses_post( $_title ); ?>
				</h2>
			</div>
		<?php endif; ?>
		<div class="x-four-cards__items desktop" style="--animation-duration: <?php echo esc_attr( $animation_duration ); ?>s;">
			<?php
			$i = 0;
			while ( $i < 2 ) :
				echo '<div class="x-four-cards__items-group x-four-cards__items-group_g' . esc_html( $i ) . '">';
				foreach ( $items as $item ) :
					$item_title       = trim_string( $item['title'] ?? '' );
					$item_description = trim_string( $item['description'] ?? '' );
					$item_image       = (int) ( $item['image'] ?? 0 );

					if ( ! $item_title ) {
						continue;
					}

					get_template_part(
						'elements/card',
						null,
						array(
							'title'       => $item_title,
							'description' => $item_description,
							'image'       => $item_image,
							'classes'     => 'x-four-cards__item',
						)
					);
				endforeach;
				echo '</div>';
				$i++;
			endwhile;
			?>
		</div>
		<div class="x-four-cards__items mobile">
			<?php
			foreach ( $items as $item ) :
				$item_title       = trim_string( $item['title'] ?? '' );
				$item_description = trim_string( $item['description'] ?? '' );
				$item_image       = (int) ( $item['image'] ?? 0 );

				if ( ! $item_title ) {
					continue;
				}

				get_template_part(
					'elements/card',
					null,
					array(
						'title'       => $item_title,
						'description' => $item_description,
						'image'       => $item_image,
						'classes'     => 'x-four-cards__item',
					)
				);
			endforeach;
			?>
		</div>
	</div>
</section>
