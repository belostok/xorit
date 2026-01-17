<?php
/**
 * The 404 template file
 */

use xoritTheme\Constants\Constants;

use function xoritTheme\Helpers\trim_string;

$_title      = trim_string( get_field( Constants::ACF_FIELD_OPTIONS . '_404_title', 'option' ) );
$description = trim_string( get_field( Constants::ACF_FIELD_OPTIONS . '_404_description', 'option' ) );
$phone       = trim_string( get_field( Constants::ACF_FIELD_OPTIONS . '_phone', 'option' ) );
$email       = trim_string( get_field( Constants::ACF_FIELD_OPTIONS . '_email', 'option' ) );

get_header();

xorit_inline_style( 'page-404' );
?>
<section class="x-404 container">
	<div class="x-404__wrapper wrapper flex fdc aic">
		<?php if ( $_title ) : ?>
			<div class="x-404__title-container relative">
				<h1 class="x-404__title h1">
					<?php echo wp_kses_post( $_title ); ?>
				</h1>
			</div>
		<?php endif; ?>
		<?php if ( $description ) : ?>
			<div class="x-404__description-container relative">
				<p class="x-404__description h3">
					<?php echo wp_kses_post( $description ); ?>
				</p>
			</div>
		<?php endif; ?>
		<div class="x-404__button-container relative flex jcc">
			<?php
			get_template_part(
				'elements/button',
				null,
				array(
					'link'  => home_url( '/' ),
					'title' => esc_html__( 'На Главную', 'xorit' ),
				)
			);
			?>
		</div>
		<?php if ( $phone || $email ) : ?>
			<div class="x-404__contacts relative flex fwrap jcc">
				<?php
				get_template_part(
					'elements/contact-item',
					null,
					array(
						'value'   => $phone,
						'type'    => 'phone',
						'classes' => 'x-contact-item_white x-404__contact',
					)
				);
				get_template_part(
					'elements/contact-item',
					null,
					array(
						'value'   => $email,
						'type'    => 'email',
						'classes' => 'x-contact-item_white x-404__contact',
					)
				);
				?>
			</div>
		<?php endif; ?>
	</div>
</section>
<?php
get_footer();
