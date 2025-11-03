<?php

use xoritTheme\Constants\Constants;
use function xoritTheme\Helpers\trim_string;
use function xoritTheme\Helpers\get_array;
use function xoritTheme\Helpers\get_link_details;

$_title      = trim_string( get_field( Constants::ACF_FIELD_HOME . '_hero_title' ) );
$description = trim_string( get_field( Constants::ACF_FIELD_HOME . '_hero_description' ) );
$cta         = get_link_details( get_field( Constants::ACF_FIELD_HOME . '_hero_cta' ) );
$advantages  = get_array( get_field( Constants::ACF_FIELD_HOME . '_hero_advantages' ) );

xorit_inline_style( 'main-hero' );
?>
<section class="x-main-hero container">
	<div class="x-main-hero__wrapper wrapper flex">
		<div class="x-main-hero__content-container">
			<?php if ( $_title ) : ?>
				<div class="x-main-hero__title-container">
					<h1 class="x-main-hero__title">
						<?php echo wp_kses_post( $_title ); ?>
					</h1>
				</div>
			<?php endif; ?>
			<?php if ( $description ) : ?>
				<div class="x-main-hero__description-container">
					<p class="x-main-hero__description">
						<?php echo wp_kses_post( $description ); ?>
					</p>
				</div>
			<?php endif; ?>
			<?php if ( ! empty( $cta ) ) : ?>
				<div class="x-main-hero__button-container">
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
		<?php if ( ! empty( $advantages ) ) : ?>
			<div class="x-main-hero__items-container flex fdc">
				<?php
				foreach ( $advantages as $advantage ) :
					$text = trim_string( $advantage['advantage'] ?? '' );
					?>
					<div class="x-main-hero__items-row">
						<div class="x-main-hero__item-wrapper">
							<div class="x-main-hero__item"><?php echo wp_kses_post( $text ); ?></div>
						</div>
					</div>
					<?php
				endforeach;
				?>
			</div>
		<?php endif; ?>
</section>
