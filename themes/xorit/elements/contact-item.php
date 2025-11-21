<?php

use function xoritTheme\Helpers\trim_string;
use function xoritTheme\Helpers\get_tel;

$value   = trim_string( $args['value'] ?? '' );
$_type   = trim_string( $args['type'] ?? '' );
$classes = trim_string( $args['classes'] ?? '' );

if ( ! $value || ! $_type ) {
	return null;
}
?>
<div class="x-contact-item flex jcc aic <?php echo esc_attr( $classes ); ?>">
	<?php
	if ( $_type === 'phone' ) :
		$tel = get_tel( $value );
		?>
		<svg class="x-contact-item__svg x-contact-item__svg_<?php echo esc_attr( $_type ); ?>" width="48" height="42"
			viewBox="0 0 48 42" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path
				d="M41.8488 9C47.3836 15.3718 47.3836 25.7026 41.8488 32.0708M35.9229 13.1927C38.6902 17.2488 38.6902 23.822 35.9229 27.8781"
				stroke="#C32F33" stroke-width="3" stroke-linejoin="round"/>
			<path
				d="M12.9977 33.3085H15.9988M25.0023 1H4.00117C3.20582 0.999999 2.44299 1.3238 1.88026 1.90026C1.31753 2.47673 1.00093 3.25871 1 4.07443V37.9256C1 39.6228 2.34281 41 3.99766 41H24.9988C25.7942 41 26.557 40.6762 27.1197 40.0997C27.6825 39.5233 27.9991 38.7413 28 37.9256V4.07443C28 3.25871 27.6843 2.47635 27.1222 1.89921C26.5601 1.32207 25.7977 1.00095 25.0023 1Z"
				stroke="#20202C" stroke-width="2" stroke-linejoin="round"/>
		</svg>
		<a href="tel:<?php echo esc_attr( $tel ); ?>" class="x-contact-item__item h3 default-hover">
			<?php echo esc_html( $value ); ?>
		</a>
	<?php elseif ( $_type === 'email' ) : ?>
		<svg class="x-contact-item__svg x-contact-item__svg_<?php echo esc_attr( $_type ); ?>" width="49" height="32"
			viewBox="0 0 49 32" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M3.71429 17.7246H22.2857M7.42857 25.2246H26M13 10.2246H0" stroke="#C32F33"
				stroke-width="3" stroke-linejoin="round"/>
			<path
				d="M11 1.22461L27.9384 11.5505C28.8974 12.135 30.1026 12.135 31.0615 11.5505L48 1.22461M11 1.22461H48M11 1.22461V5.72461M48 1.22461V27.2246C48 28.8815 46.6569 30.2246 45 30.2246H11"
				stroke="#20202C" stroke-width="2" stroke-linejoin="round"/>
		</svg>
		<a href="mailto:<?php echo esc_attr( $value ); ?>" class="x-contact-item__item h3 default-hover">
			<?php echo esc_html( $value ); ?>
		</a>
	<?php endif; ?>
</div>
