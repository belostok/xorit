<?php

use xoritTheme\Constants\Constants;
use function xoritTheme\Helpers\get_tel;
use function xoritTheme\Helpers\trim_string;

$logo_text   = trim_string( get_field( Constants::ACF_FIELD_OPTIONS . '_logo_text', 'option' ) );
$email       = trim_string( get_field( Constants::ACF_FIELD_OPTIONS . '_email', 'option' ) );
$address     = trim_string( get_field( Constants::ACF_FIELD_OPTIONS . '_address', 'option' ) );
$phone       = trim_string( get_field( Constants::ACF_FIELD_OPTIONS . '_phone', 'option' ) );
$background  = trim_string( get_field( Constants::ACF_FIELD_PAGE . '_background' ) );
$body_class  = 'flex';
$post_parent = wp_get_post_parent_id( get_the_ID() );

if ( is_singular( 'services' ) && $post_parent ) {
	$body_class .= ' child-service';
}

$body_style = $background ? 'style="background:' . esc_url( $background ) . ';"' : '';
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body
	<?php body_class( $body_class ); ?>
	<?php echo $body_style; // phpcs:ignore ?>
>
<?php wp_body_open(); ?>

<div class="main-wrapper flex fdc relative">
	<?php xorit_inline_style( 'header' ); ?>
	<header class="x-header container js-x-header">
		<div class="x-header__wrapper wrapper">
			<div class="x-header__upper-side flex fwrap aife jcspb">
				<div class="x-header__left-side flex fwrap aife">
					<div class="x-header__logo-container">
						<?php xorit_the_logo(); ?>
					</div>
					<?php if ( $logo_text ) : ?>
						<div class="x-header__logo-note-container desktop">
							<h2 class="x-header__logo-note">
								<?php echo esc_html( $logo_text ); ?>
							</h2>
						</div>
					<?php endif; ?>
				</div>
				<div class="x-header__menu-container">
					<div class="x-header__menu-inner flex aife">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'header',
								'menu_class'     => 'flex fwrap',
								'container'      => false,
							)
						);
						?>
						<?php if ( $email ) : ?>
							<div class="x-header__email-container desktop">
								<a href="mailto:<?php echo esc_attr( $email ); ?>" class="x-header__email default-hover">
									<?php echo esc_html( $email ); ?>
								</a>
							</div>
						<?php endif; ?>
						<?php if ( $phone || $email ) : ?>
							<div class="x-header__mobile-contacts flex fdc mobile">
								<?php
								get_template_part(
									'elements/contact-item',
									null,
									array(
										'value'   => $phone,
										'type'    => 'phone',
										'classes' => 'x-contact-item_white x-header__mobile-contacts-item',
									)
								);
								get_template_part(
									'elements/contact-item',
									null,
									array(
										'value'   => $email,
										'type'    => 'email',
										'classes' => 'x-contact-item_white x-header__mobile-contacts-item',
									)
								);
								?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<?php if ( $address || $phone ) : ?>
				<div class="x-header__lower-side flex fwrap jcspb">
					<?php if ( $address ) : ?>
						<div class="x-header__address-container desktop">
							<p class="x-header__address">
								<?php echo esc_html( $address ); ?>
							</p>
						</div>
					<?php endif; ?>
					<?php
					if ( $phone ) :
						$tel = get_tel( $phone );
						?>
						<div class="x-header__phone-container">
							<a href="tel:<?php echo esc_attr( $tel ); ?>" class="x-header__phone default-hover">
								<?php echo esc_html( $phone ); ?>
							</a>
						</div>
					<?php endif; ?>
					<button class="x-header__mobile-menu-button relative mobile js-x-mobile-menu-button">
						<svg class="absolute" width="40" height="15" viewBox="0 0 40 15" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M0 0.500004L40 0.499999" stroke="#EAEBED"/>
							<path d="M0 7.5L40 7.5" stroke="#EAEBED"/>
							<path d="M0 14.5L40 14.5" stroke="#EAEBED"/>
						</svg>
						<svg class="absolute" width="29" height="30" viewBox="0 0 29 30" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M0.353516 0.637939L28.6378 28.9222" stroke="#EAEBED"/>
							<path d="M0.353516 28.6379L28.6378 0.353669" stroke="#EAEBED"/>
						</svg>
					</button>
				</div>
			<?php endif; ?>
		</div>
	</header>

	<div class="site-content flex">
		<main class="main">
