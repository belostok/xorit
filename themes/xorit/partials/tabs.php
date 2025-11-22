<?php

use function xoritTheme\Helpers\get_tabs_html;
use function xoritTheme\Helpers\trim_string;
use function xoritTheme\Helpers\get_array;

$hide = (bool) ( $args['hide'] ?? false );

if ( $hide ) {
	return null;
}

$_title       = trim_string( $args['title'] ?? '' );
$title_mobile = trim_string( $args['title_mobile'] ?? '' );
$_tabs        = get_array( $args['items'] ?? array() );
$tabs_mobile  = get_array( $args['items_mobile'] ?? array() );
$tabs_mobile  = ! empty( $tabs_mobile ) ? $tabs_mobile : $_tabs;
$classes      = trim_string( $args['classes'] ?? '' );

if ( empty( $_tabs ) ) {
	return null;
}

$desktop_tabs = get_tabs_html( $_tabs );
$mobile_tabs  = $tabs_mobile ? get_tabs_html( $tabs_mobile, true ) : $desktop_tabs;

if ( empty( $desktop_tabs['tabs_html'] ) || empty( $desktop_tabs['content_html'] ) ) {
	return null;
}
?>
<section class="x-tabs container <?php echo esc_attr( $classes ); ?>">
	<div class="x-tabs__wrapper wrapper">
		<?php if ( $_title ) : ?>
			<div class="x-tabs__title-container">
				<h2 class="x-tabs__title h2 desktop">
					<?php echo wp_kses_post( $_title ); ?>
				</h2>
				<h2 class="x-tabs__title h2 mobile">
					<?php echo wp_kses_post( $title_mobile ); ?>
				</h2>
			</div>
		<?php endif; ?>
		<div class="x-tabs__tabs desktop js-x-tabs-container">
			<div class="x-tabs__buttons">
				<?php echo $desktop_tabs['tabs_html']; // phpcs:ignore ?>
			</div>
			<?php echo $desktop_tabs['content_html']; // phpcs:ignore ?>
		</div>
		<div class="x-tabs__tabs mobile js-x-tabs-container">
			<?php echo $mobile_tabs['tabs_html']; // phpcs:ignore ?>
		</div>
	</div>
</section>
