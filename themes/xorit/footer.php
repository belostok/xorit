<?php

use xoritTheme\Constants\Constants;
use function xoritTheme\Helpers\trim_string;
use function xoritTheme\Helpers\get_tel;

$logo              = (int) get_field( Constants::ACF_FIELD_OPTIONS . '_footer_logo', 'option' );
$logo_text         = trim_string( get_field( Constants::ACF_FIELD_OPTIONS . '_logo_text', 'option' ) );
$address           = trim_string( get_field( Constants::ACF_FIELD_OPTIONS . '_footer_address', 'option' ) );
$address           = $address ? $address : trim_string( get_field( Constants::ACF_FIELD_OPTIONS . '_address', 'option' ) );
$phone             = trim_string( get_field( Constants::ACF_FIELD_OPTIONS . '_footer_phone', 'option' ) );
$phone             = $phone ? $phone : trim_string( get_field( Constants::ACF_FIELD_OPTIONS . '_phone', 'option' ) );
$email             = trim_string( get_field( Constants::ACF_FIELD_OPTIONS . '_footer_email', 'option' ) );
$email             = $email ? $email : trim_string( get_field( Constants::ACF_FIELD_OPTIONS . '_email', 'option' ) );
$privacy_policy    = (int) get_field( Constants::ACF_FIELD_OPTIONS . '_privacy_policy', 'option' );
$personal_data     = (int) get_field( Constants::ACF_FIELD_OPTIONS . '_personal_data', 'option' );
$footer_form_title = trim_string( get_field( Constants::ACF_FIELD_OPTIONS . '_footer_form_title', 'option' ) );
$form_id           = (int) get_field( Constants::ACF_FIELD_OPTIONS . '_footer_form', 'option' );
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
							<div class="x-footer__contacts-title-container">
								<p class="x-footer__contacts-title body-1">
									<?php echo esc_html__( 'Контакты', 'xorit' ); ?>:
								</p>
							</div>
							<?php
							if ( $phone ) :
								$tel = get_tel( $phone );
								?>
								<div class="x-footer__contacts-item x-footer__contacts-item__phone">
									<a
										href="tel:<?php echo esc_attr( $tel ); ?>"
										class="x-footer__contacts-value h4 default-hover"
									>
										<?php echo esc_html( $phone ); ?>
									</a>
								</div>
							<?php endif; ?>
							<?php if ( $email ) : ?>
								<div class="x-footer__contacts-item x-footer__contacts-item__email">
									<a
										href="mailto:<?php echo esc_attr( $email ); ?>"
										class="x-footer__contacts-value h4 default-hover"
									>
										<?php echo esc_html( $email ); ?>
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
						</div>
					<?php endif; ?>
				</div>
				<?php if ( $privacy_policy || $personal_data ) : ?>
					<div class="x-footer__terms">
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
						<?php echo do_shortcode( '[contact-form-7 id="' . $form_id . '" title="Footer form"]' ); ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
</footer>

</div><!-- /.main-wrapper -->
<?php wp_footer(); ?>

</body>
</html>
