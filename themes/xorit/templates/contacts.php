<?php
/**
 * Page Template Name: Контакты
 */

use xoritTheme\Constants\Constants;

use function xoritTheme\Helpers\get_link_details;
use function xoritTheme\Helpers\trim_string;

get_header();

xorit_inline_style( 'contacts-hero' );

$_title      = trim_string( get_field( Constants::ACF_FIELD_CONTACTS . '_title' ) );
$_title      = $_title ? $_title : get_the_title();
$description = trim_string( get_field( Constants::ACF_FIELD_CONTACTS . '_description' ) );
$phone       = trim_string( get_field( Constants::ACF_FIELD_CONTACTS . '_phone' ) );
$phone       = $phone ? $phone : trim_string( get_field( Constants::ACF_FIELD_OPTIONS . '_phone', 'option' ) );
$email       = trim_string( get_field( Constants::ACF_FIELD_CONTACTS . '_email' ) );
$email       = $email ? $email : trim_string( get_field( Constants::ACF_FIELD_OPTIONS . '_email', 'option' ) );
$address     = trim_string( get_field( Constants::ACF_FIELD_CONTACTS . '_address' ) );
$address     = $address ? $address : trim_string( get_field( Constants::ACF_FIELD_OPTIONS . '_address', 'option' ) );
$cta         = get_link_details( get_field( Constants::ACF_FIELD_CONTACTS . '_cta' ) );
$_map        = trim_string( get_field( Constants::ACF_FIELD_CONTACTS . '_map' ) );
?>
<section class="x-contacts-hero container">
	<div class="x-contacts-hero__wrapper wrapper">
		<div class="x-contacts-hero__grid">
			<div class="x-contacts-hero__left-side flex fdc">
				<?php if ( $_title || $description ) : ?>
					<div class="x-contacts-hero__title-side flex fdc">
						<?php if ( $_title ) : ?>
							<div class="x-contacts-hero__title-container">
								<h1 class="x-contacts-hero__title h1">
									<?php echo wp_kses_post( $_title ); ?>
								</h1>
							</div>
						<?php endif; ?>
						<?php if ( $description ) : ?>
							<div class="x-contacts-hero__description-container">
								<p class="x-contacts-hero__description body-1">
									<?php echo wp_kses_post( $description ); ?>
								</p>
							</div>
						<?php endif; ?>
					</div>
				<?php endif; ?>
				<?php if ( $phone || $email || $address ) : ?>
					<div class="x-contacts-hero__contacts flex fdc">
						<?php
						get_template_part(
							'elements/contact-item',
							null,
							array(
								'value'   => $phone,
								'type'    => 'phone',
								'classes' => 'x-contact-item_white x-contacts-hero__contact-container',
							)
						);
						get_template_part(
							'elements/contact-item',
							null,
							array(
								'value'   => $email,
								'type'    => 'email',
								'classes' => 'x-contact-item_white x-contacts-hero__contact-container',
							)
						);
						?>
						<?php if ( $address ) : ?>
							<div class="x-contacts-hero__contact-container x-contacts-hero__contact-container_address">
								<p class="x-contacts-hero__contact h3">
									<?php echo esc_html( $address ); ?>
								</p>
							</div>
						<?php endif; ?>
					</div>
				<?php endif; ?>
				<?php if ( ! empty( $cta ) ) : ?>
					<div class="x-contacts-hero__button-container">
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
			<?php if ( $_map ) : ?>
				<div class="x-contacts-hero__map-container">
					<?php echo $_map; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
<?php
get_template_part(
	'partials/documents',
	null,
	array(
		'hide'  => get_field( Constants::ACF_FIELD_CONTACTS . '_documents_hide' ),
		'title' => get_field( Constants::ACF_FIELD_CONTACTS . '_documents_title' ),
		'items' => get_field( Constants::ACF_FIELD_CONTACTS . '_documents_items' ),
	)
);

get_template_part(
	'partials/three-cards',
	null,
	array(
		'hide'  => get_field( Constants::ACF_FIELD_CONTACTS . '_three_cards_hide' ),
		'items' => get_field( Constants::ACF_FIELD_CONTACTS . '_three_cards_items' ),
	)
);

get_footer();
