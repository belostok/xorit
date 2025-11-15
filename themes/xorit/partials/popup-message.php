<?php

use function xoritTheme\Helpers\trim_string;
use function xoritTheme\Helpers\get_array;

$group = get_array( $args['group'] ?? array() );
$_type = trim_string( $args['type'] ?? '' );

if ( empty( $group ) || ! $_type ) {
	return null;
}

$_title       = trim_string( $group['title'] ?? '' );
$description  = trim_string( $group['description'] ?? '' );
$phone        = trim_string( $args['phone'] ?? '' );
$email        = trim_string( $args['email'] ?? '' );
$button_title = trim_string( $group['button_title'] ?? '' );
$classes      = trim_string( $args['classes'] ?? '' );
?>
<div
	class="x-popup x-popup_message js-x-popup <?php esc_attr( $classes ); ?>"
	data-type="<?php echo esc_attr( $_type ); ?>"
>
	<div class="x-popup__inner flex jcc aic">
		<div class="x-popup__content relative">
			<?php if ( $_title ) : ?>
				<div class="x-popup__title-container">
					<h3 class="x-popup__title h3">
						<?php echo wp_kses_post( $_title ); ?>
					</h3>
				</div>
			<?php endif; ?>
			<?php if ( $description ) : ?>
				<div class="x-popup__description-container">
					<p class="x-popup__description">
						<?php echo wp_kses_post( $description ); ?>
					</p>
				</div>
			<?php endif; ?>
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
			<?php if ( $button_title ) : ?>
				<div class="x-popup__button-container flex jcc">
					<button class="x-popup__button-close x-button x-button_light js-x-popup-close">
						<?php echo esc_html( $button_title ); ?>
					</button>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>
