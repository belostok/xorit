<?php

use xoritTheme\Constants\Constants;
use function xoritTheme\Helpers\get_link_details;
use function xoritTheme\Helpers\trim_string;

$hide = (bool) ( $args['hide'] ?? false );

if ( $hide ) {
	return null;
}

$_title      = trim_string( $args['title'] ?? '' );
$description = trim_string( $args['description'] ?? '' );
$phone       = trim_string( $args['phone'] ?? '' );
$phone       = $phone ? $phone : trim_string( get_field( Constants::ACF_FIELD_OPTIONS . '_phone', 'option' ) );
$email       = trim_string( $args['email'] ?? '' );
$email       = $email ? $email : trim_string( get_field( Constants::ACF_FIELD_OPTIONS . '_email', 'option' ) );
$cta         = get_link_details( $args['cta'] ?? array() );
$classes     = trim_string( $args['classes'] ?? '' );
?>
<section class="x-request container <?php echo esc_attr( $classes ); ?>">
	<div class="x-request__wrapper wrapper relative">
		<?php if ( $_title ) : ?>
			<div class="x-request__title-container js-x-fade-item">
				<h2 class="x-request__title h2">
					<?php echo wp_kses_post( $_title ); ?>
				</h2>
			</div>
		<?php endif; ?>
		<?php if ( $description ) : ?>
			<div class="x-request__description-container">
				<p class="x-request__description body-1">
					<?php echo wp_kses_post( $description ); ?>
				</p>
			</div>
		<?php endif; ?>
		<?php
		get_template_part(
			'elements/contact-item',
			null,
			array(
				'value'   => $phone,
				'type'    => 'phone',
				'classes' => 'x-request__item-container',
			)
		);
		get_template_part(
			'elements/contact-item',
			null,
			array(
				'value'   => $email,
				'type'    => 'email',
				'classes' => 'x-request__item-container',
			)
		);
		?>
		<?php if ( ! empty( $cta ) ) : ?>
			<div class="x-request__button-container">
				<?php
				get_template_part(
					'elements/button',
					null,
					array(
						'link'   => $cta['url'] ?? '',
						'title'  => $cta['title'] ?? '',
						'target' => $cta['target'] ?? '',
					)
				);
				?>
			</div>
		<?php endif; ?>
	</div>
</section>
