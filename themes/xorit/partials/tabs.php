<?php

use function xoritTheme\Helpers\get_link_details;
use function xoritTheme\Helpers\trim_string;
use function xoritTheme\Helpers\get_array;

$hide = (bool) ( $args['hide'] ?? false );

if ( $hide ) {
	return null;
}

$_title  = trim_string( $args['title'] ?? '' );
$_tabs   = get_array( $args['items'] ?? array() );
$classes = trim_string( $args['classes'] ?? '' );

if ( empty( $_tabs ) ) {
	return null;
}

$tabs_html    = '';
$content_html = '';
$i            = 1;

foreach ( $_tabs as $_tab ) {
	$tab_title = trim_string( $_tab['tab_title'] ?? '' );

	if ( ! $tab_title ) {
		continue;
	}

	$is_active       = $i === 1;
	$tab_description = trim_string( $_tab['description'] ?? '' );
	$tab_image       = (int) ( $_tab['image'] ?? 0 );
	$tab_cta         = get_link_details( $_tab['cta'] ?? array() );

	if ( ! $tab_description && ! $tab_image ) {
		continue;
	}

	ob_start();
	?>
	<button
		data-tab="<?php echo esc_attr( $i ); ?>"
		class="x-tabs__button default-hover js-x-tabs-button <?php echo esc_attr( $is_active ? 'x-tabs__button_prepare x-tabs__button_active' : '' ); ?>"
	>
		<span class="x-tabs__button-title">
			<?php echo esc_html( $tab_title ); ?>
		</span>
	</button>
	<?php
	$tabs_html .= ob_get_clean();

	ob_start();
	?>
	<div
		data-tab="<?php echo esc_attr( $i ); ?>"
		class="x-tabs__content js-x-tabs-content <?php echo esc_attr( $is_active ? 'x-tabs__content_prepare x-tabs__content_active' : '' ); ?>"
	>
		<?php if ( $tab_description ) : ?>
			<div class="x-tabs__left-side">
				<div class="x-tabs__text x-content">
					<?php echo wp_kses_post( $tab_description ); ?>
				</div>
			</div>
		<?php endif; ?>
		<?php if ( $tab_image || $tab_cta ) : ?>
			<div class="x-tabs__right-side">
				<?php if ( $tab_image ) : ?>
					<div class="x-tabs__image-container">
						<?php xorit_the_image( $tab_image, 'x-tabs__image' ); ?>
					</div>
				<?php endif; ?>
				<?php if ( ! empty( $tab_cta ) ) : ?>
					<div class="x-tabs__button-container">
						<?php
						get_template_part(
							'elements/button',
							null,
							array(
								'link'    => $tab_cta['url'] ?? '',
								'title'   => $tab_cta['title'] ?? '',
								'target'  => $tab_cta['target'] ?? '',
								'classes' => 'x-button_white',
							)
						);
						?>
					</div>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	</div>
	<?php
	$content_html .= ob_get_clean();
	$i ++;
}
?>
<section class="x-tabs container <?php echo esc_attr( $classes ); ?>">
	<div class="x-tabs__wrapper wrapper">
		<?php if ( $_title ) : ?>
			<div class="x-tabs__title-container">
				<h2 class="x-tabs__title h2">
					<?php echo wp_kses_post( $_title ); ?>
				</h2>
			</div>
		<?php endif; ?>
		<div class="x-tabs__tabs js-x-tabs-container">
			<div class="x-tabs__buttons">
				<?php echo $tabs_html; // phpcs:ignore ?>
			</div>
			<?php echo $content_html; // phpcs:ignore ?>
		</div>
	</div>
</section>
