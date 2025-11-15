<?php

use xoritTheme\Constants\Constants;
use function xoritTheme\Helpers\trim_string;
use function xoritTheme\Helpers\get_array;
use function xoritTheme\Helpers\get_tel;
use function xoritTheme\Helpers\get_link_details;

$logo              = (int) get_field( Constants::ACF_FIELD_OPTIONS . '_footer_logo', 'option' );
$logo_text         = trim_string( get_field( Constants::ACF_FIELD_OPTIONS . '_logo_text', 'option' ) );
$address           = trim_string( get_field( Constants::ACF_FIELD_OPTIONS . '_footer_address', 'option' ) );
$address           = $address ? $address : trim_string( get_field( Constants::ACF_FIELD_OPTIONS . '_address', 'option' ) );
$phone             = trim_string( get_field( Constants::ACF_FIELD_OPTIONS . '_footer_phone', 'option' ) );
$options_phone     = trim_string( get_field( Constants::ACF_FIELD_OPTIONS . '_phone', 'option' ) );
$footer_phone      = $phone ? $phone : $options_phone;
$email             = trim_string( get_field( Constants::ACF_FIELD_OPTIONS . '_footer_email', 'option' ) );
$options_email     = trim_string( get_field( Constants::ACF_FIELD_OPTIONS . '_email', 'option' ) );
$footer_email      = $email ? $email : $options_email;
$privacy_policy    = (int) get_field( Constants::ACF_FIELD_OPTIONS . '_privacy_policy', 'option' );
$personal_data     = (int) get_field( Constants::ACF_FIELD_OPTIONS . '_personal_data', 'option' );
$footer_form_title = trim_string( get_field( Constants::ACF_FIELD_OPTIONS . '_footer_form_title', 'option' ) );
$form_id           = (int) get_field( Constants::ACF_FIELD_OPTIONS . '_footer_form', 'option' );
$cta               = get_link_details( get_array( get_field( Constants::ACF_FIELD_OPTIONS . '_footer_cta', 'option' ) ) );
$cookies           = trim_string( get_field( Constants::ACF_FIELD_OPTIONS . '_cookies', 'option' ) );
?>
</main><!-- /.main -->
</div><!-- /.site-content -->

<footer class="x-footer container">
	<div class="x-footer__wrapper wrapper">
		<div class="x-footer__grid">
			<div class="x-footer__left">
				<?php if ( $logo ) : ?>
					<a
						href="<?php echo esc_url( home_url() ); ?>"
						class="x-footer__logo-container default-hover flex fdc"
					>
						<?php xorit_the_image( $logo, 'x-footer__logo' ); ?>
						<?php if ( $logo_text ) : ?>
							<span class="x-footer__logo-text body-1">
								<?php echo esc_html( $logo_text ); ?>
							</span>
						<?php endif; ?>
					</a>
				<?php endif; ?>
				<div class="x-footer__inner-grid">
					<nav class="x-footer__nav">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'footer',
								'menu_class'     => 'flex fdc',
								'container'      => false,
							)
						);
						?>
					</nav>
					<?php if ( $address || $phone || $email ) : ?>
						<div class="x-footer__contacts flex fdc">
							<div class="x-footer__contacts-title-container desktop">
								<p class="x-footer__contacts-title body-1">
									<?php echo esc_html__( 'Контакты', 'xorit' ); ?>:
								</p>
							</div>
							<?php
							if ( $footer_phone ) :
								$tel = get_tel( $footer_phone );
								?>
								<div class="x-footer__contacts-item x-footer__contacts-item__phone">
									<a
										href="tel:<?php echo esc_attr( $tel ); ?>"
										class="x-footer__contacts-value h4 default-hover"
									>
										<?php echo esc_html( $footer_phone ); ?>
									</a>
								</div>
							<?php endif; ?>
							<?php if ( $footer_email ) : ?>
								<div class="x-footer__contacts-item x-footer__contacts-item__email">
									<a
										href="mailto:<?php echo esc_attr( $footer_email ); ?>"
										class="x-footer__contacts-value h4 default-hover"
									>
										<?php echo esc_html( $footer_email ); ?>
									</a>
								</div>
							<?php endif; ?>
							<?php if ( $address ) : ?>
								<div class="x-footer__contacts-item x-footer__contacts-item__address">
									<span class="x-footer__contacts-value body-1">
										<?php echo esc_html( $address ); ?>
									</span>
								</div>
							<?php endif; ?>
							<?php if ( ! empty( $cta ) ) : ?>
								<div class="x-footer__button-container mobile">
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
					<?php endif; ?>

				</div>
				<?php if ( $privacy_policy || $personal_data ) : ?>
					<div class="x-footer__terms desktop">
						<ul class="x-footer__terms-list flex fdc">
							<?php if ( $privacy_policy ) : ?>
								<li class="x-footer__terms-item">
									<a
										href="<?php echo esc_url( get_permalink( $privacy_policy ) ); ?>"
										class="x-footer__terms-link body-2 default-hover"
									>
										<?php echo esc_html( get_the_title( $privacy_policy ) ); ?>
									</a>
								</li>
							<?php endif; ?>
							<?php if ( $personal_data ) : ?>
								<li class="x-footer__terms-item">
									<a
										href="<?php echo esc_url( get_permalink( $personal_data ) ); ?>"
										class="x-footer__terms-link body-2 default-hover"
									>
										<?php echo esc_html( get_the_title( $personal_data ) ); ?>
									</a>
								</li>
							<?php endif; ?>
						</ul>
					</div>
				<?php endif; ?>
			</div>
			<?php if ( $form_id ) : ?>
				<div class="x-footer__right desktop">
					<?php if ( $footer_form_title ) : ?>
						<div class="x-footer__form-title-container">
							<h4 class="x-footer__form-title h4">
								<?php echo esc_html( $footer_form_title ); ?>
							</h4>
						</div>
					<?php endif; ?>
					<div class="x-footer__form-container">
						<?php echo do_shortcode( '[contact-form-7 id="' . $form_id . '"]' ); ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
</footer>

<?php
if ( $cookies ) :
	xorit_inline_style( 'cookies' );
	?>
	<div class="x-cookies js-x-cookies">
		<div class="x-cookies__description">
			<?php echo wp_kses_post( $cookies ); ?>
		</div>
		<div class="x-cookies__button-container">
			<button class="x-cookies__button x-button x-button_white js-x-cookies-button">
				<?php echo esc_html__( 'OK', 'xorit' ); ?>
			</button>
		</div>
	</div>
<?php endif; ?>

<div class="js-x-popups">
	<?php
	get_template_part(
		'partials/popup',
		'callback',
		array(
			'type'  => 'popup',
			'group' => get_array( get_field( Constants::ACF_FIELD_OPTIONS . '_popup_callback', 'option' ) ),
			'phone' => $options_phone,
			'email' => $options_email,
		)
	);

	get_template_part(
		'partials/popup',
		'message',
		array(
			'type'  => 'success',
			'group' => get_array( get_field( Constants::ACF_FIELD_OPTIONS . '_popup_success', 'option' ) ),
		)
	);

	get_template_part(
		'partials/popup',
		'message',
		array(
			'type'  => 'error',
			'group' => get_array( get_field( Constants::ACF_FIELD_OPTIONS . '_popup_error', 'option' ) ),
			'phone' => $options_phone,
			'email' => $options_email,
		)
	);
	?>
</div>

</div><!-- /.main-wrapper -->
<?php wp_footer(); ?>

</body>
</html>
