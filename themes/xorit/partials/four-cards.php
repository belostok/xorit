<?php

use function xoritTheme\Helpers\trim_string;
use function xoritTheme\Helpers\get_array;

$hide = (bool) ( $args['hide'] ?? false );

if ( $hide ) {
	return null;
}

$items   = get_array( $args['items'] ?? array() );
$classes = trim_string( $args['classes'] ?? '' );

if ( empty( $items ) ) {
	return null;
}
?>
<section class="x-four-cards container <?php echo esc_attr( $classes ); ?>">
	<div class="x-four-cards__wrapper wrapper">
		<div class="x-four-cards__items flex fwrap jcc">
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
