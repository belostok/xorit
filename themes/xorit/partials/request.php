<?php

use xoritTheme\Constants\Constants;
use function xoritTheme\Helpers\get_link_details;
use function xoritTheme\Helpers\trim_string;
use function xoritTheme\Helpers\get_array;

$hide = (bool) ( $args['hide'] ?? false );

if ( $hide ) {
	return null;
}

$_title      = trim_string( $args['title'] ?? '' );
$_title      = $_title ? $_title : trim_string( get_field( Constants::ACF_FIELD_OPTIONS . '_request_title', 'option' ) );
$threats     = get_array( $args['threats'] ?? array() );
$threats     = ! empty( $threats ) ? $threats : get_array( get_field( Constants::ACF_FIELD_OPTIONS . '_request_threats', 'option' ) );
$description = trim_string( $args['description'] ?? '' );
$description = $description ? $description : trim_string( get_field( Constants::ACF_FIELD_OPTIONS . '_request_description', 'option' ) );
$phone       = trim_string( $args['phone'] ?? '' );
$phone       = $phone ? $phone : trim_string( get_field( Constants::ACF_FIELD_OPTIONS . '_phone', 'option' ) );
$email       = trim_string( $args['email'] ?? '' );
$email       = $email ? $email : trim_string( get_field( Constants::ACF_FIELD_OPTIONS . '_email', 'option' ) );
$cta         = get_link_details( $args['cta'] ?? array() );
$cta         = ! empty( $cta ) ? $cta : get_array( get_field( Constants::ACF_FIELD_OPTIONS . '_request_cta', 'option' ) );
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
	<?php if ( ! empty( $threats ) ) : ?>
		<div class="x-request__threats-container relative">
			<div class="x-request__threats-inner flex absolute">
				<?php
				$i = 0;
				while ( $i < 2 ) :
					echo '<div class="x-request__threats-group x-request__threats-group_g' . esc_html( $i ) . '">';
					foreach ( $threats as $threat ) :
						$threat = trim_string( $threat['threat'] ?? '' );

						if ( ! $threat ) {
							continue;
						}
						?>
						<p class="x-request__threat relative">
							<?php echo esc_html( $threat ); ?>
						</p>
						<?php
					endforeach;
					echo '</div>';
					$i++;
				endwhile;
				?>
			</div>
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
