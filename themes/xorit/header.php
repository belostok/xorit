<?php

use xoritTheme\Constants\Constants;
use function xoritTheme\Helpers\trim_string;

$logo_text = trim_string( get_field( Constants::ACF_FIELD_OPTIONS . '_logo_text', 'option' ) );
$email     = trim_string( get_field( Constants::ACF_FIELD_OPTIONS . '_email', 'option' ) );
$address   = trim_string( get_field( Constants::ACF_FIELD_OPTIONS . '_address', 'option' ) );
$phone     = trim_string( get_field( Constants::ACF_FIELD_OPTIONS . '_phone', 'option' ) );
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class( 'flex' ); ?>>
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
						<div class="x-header__logo-note-container">
							<h2 class="x-header__logo-note">
								<?php echo esc_html( $logo_text ); ?>
							</h2>
						</div>
					<?php endif; ?>
				</div>
				<div class="x-header__menu-container flex aife">
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
						<div class="x-header__email-container">
							<a href="mailto:<?php echo esc_attr( $email ); ?>" class="x-header__email default-hover">
								<?php echo esc_html( $email ); ?>
							</a>
						</div>
					<?php endif; ?>
				</div>
			</div>
			<?php if ( $address || $phone ) : ?>
				<div class="x-header__lower-side flex fwrap jcspb">
					<?php if ( $address ) : ?>
						<div class="x-header__address-container">
							<p class="x-header__address">
								<?php echo esc_html( $address ); ?>
							</p>
						</div>
					<?php endif; ?>
					<?php
					if ( $phone ) :
						$tel = preg_replace( '/[^\d+]/', '', $phone );
						?>
						<div class="x-header__phone-container">
							<a href="tel:<?php echo esc_attr( $tel ); ?>" class="x-header__phone default-hover">
								<?php echo esc_html( $phone ); ?>
							</a>
						</div>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>
	</header>

	<div class="site-content flex">
		<main class="main">
