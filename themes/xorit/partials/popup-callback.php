<?php

use function xoritTheme\Helpers\trim_string;
use function xoritTheme\Helpers\get_array;

$group = get_array( $args['group'] ?? array() );
$_type = trim_string( $args['type'] ?? '' );

if ( empty( $group ) || ! $_type ) {
	return null;
}

$form_id = (int) ( $group['form'] ?? 0 );

if ( ! $form_id ) {
	return null;
}

$_title       = trim_string( $group['title'] ?? '' );
$title_mobile = trim_string( $group['title_mobile'] ?? '' );
$title_mobile = $title_mobile ? $title_mobile : $_title;
$phone        = trim_string( $args['phone'] ?? '' );
$email        = trim_string( $args['email'] ?? '' );
$classes      = trim_string( $args['classes'] ?? '' );
?>
<div
	class="x-popup js-x-popup <?php esc_attr( $classes ); ?>"
	data-type="<?php echo esc_attr( $_type ); ?>"
>
	<div class="x-popup__inner flex jcc aic">
		<div class="x-popup__content relative">
			<button class="x-popup__close absolute img-contain default-hover js-x-popup-close">
				<svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M31.4785 10.5L10.5 31.5M31.5 31.5L10.5215 10.5" stroke="#EAEBED"/>
					<ellipse cx="21" cy="21" rx="20.5" ry="20.5" transform="rotate(180 21 21)" stroke="#EAEBED"/>
				</svg>
			</button>
			<?php if ( $_title ) : ?>
				<div class="x-popup__title-container">
					<h3 class="x-popup__title h3 desktop">
						<?php echo wp_kses_post( $_title ); ?>
					</h3>
					<h3 class="x-popup__title h3 mobile">
						<?php echo wp_kses_post( $title_mobile ); ?>
					</h3>
				</div>
			<?php endif; ?>
			<div class="x-popup__form-container">
				<?php echo do_shortcode( '[contact-form-7 id="' . $form_id . '"]' ); ?>
			</div>
			<?php if ( $phone || $email ) : ?>
				<div class="x-popup__contacts flex fdc aic">
					<?php
					get_template_part(
						'elements/contact-item',
						null,
						array(
							'value'   => $phone,
							'type'    => 'phone',
							'classes' => 'x-popup__contact-item',
						)
					);
					get_template_part(
						'elements/contact-item',
						null,
						array(
							'value'   => $email,
							'type'    => 'email',
							'classes' => 'x-popup__contact-item',
						)
					);
					?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>
