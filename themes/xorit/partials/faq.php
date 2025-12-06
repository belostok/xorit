<?php

use xoritTheme\Constants\Constants;
use function xoritTheme\Helpers\trim_string;
use function xoritTheme\Helpers\get_array;

$hide = (bool) ( $args['hide'] ?? false );

if ( $hide ) {
	return null;
}

$no_override = (bool) ( $args['no_override'] ?? false );
$_title      = trim_string( $args['title'] ?? '' );
$_title      = $_title ? $_title : ( $no_override ? '' : trim_string( get_field( Constants::ACF_FIELD_OPTIONS . '_faq_title', 'option' ) ) );
$items       = get_array( $args['items'] ?? array() );
$items       = ! empty( $items ) ? $items : ( $no_override ? array() : get_array( get_field( Constants::ACF_FIELD_OPTIONS . '_faq_items', 'option' ) ) );
$is_columns  = (bool) ( $args['is_columns'] ?? false );
$image       = (int) ( $args['image'] ?? 0 );
$classes     = trim_string( $args['classes'] ?? '' );

if ( empty( $items ) ) {
	return null;
}

if ( $is_columns ) {
	$classes .= ' x-faq_columns';
}
?>
<section class="x-faq container <?php echo esc_attr( $classes ); ?>">
	<div class="x-faq__wrapper wrapper relative">
		<?php if ( $image ) : ?>
			<div class="x-faq__image-container img-contain absolute">
				<?php xorit_the_image( $image, 'x-faq__image' ); ?>
			</div>
		<?php endif; ?>
		<?php if ( $_title ) : ?>
			<div class="x-faq__title-container relative">
				<h2 class="x-faq__title h2">
					<?php echo wp_kses_post( $_title ); ?>
				</h2>
			</div>
		<?php endif; ?>
		<?php
		get_template_part(
			'elements/faq-items',
			null,
			array(
				'items'   => $items,
				'classes' => 'x-faq__items',
			)
		);
		?>
	</div>
</section>
