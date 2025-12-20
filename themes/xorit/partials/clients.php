<?php

use xoritTheme\Constants\Constants;
use function xoritTheme\Helpers\get_link_details;
use function xoritTheme\Helpers\trim_string;
use function xoritTheme\Helpers\get_array;

$hide = (bool) ( $args['hide'] ?? false );

if ( $hide ) {
	return null;
}

$_title        = trim_string( $args['title'] ?? '' );
$description   = trim_string( $args['description'] ?? '' );
$items         = get_array( $args['items'] ?? array() );
$cta           = get_link_details( $args['cta'] ?? array() );
$is_categories = (bool) ( $args['is_categories'] ?? false );
$classes       = trim_string( $args['classes'] ?? '' );

if ( empty( $items ) ) {
	return null;
}

if ( $is_categories ) {
	$classes .= ' x-clients_categories';
}
?>
<section class="x-clients container <?php echo esc_attr( $classes ); ?>">
	<div class="x-clients__wrapper wrapper relative">
		<div class="js-x-clients-stop"></div>
		<?php if ( $is_categories ) : ?>
			<div class="x-clients__dec x-clients__dec_blue fit-contain absolute">
				<img
					width="592"
					height="592"
					class="x-clients__dec-image"
					src="<?php echo esc_url( XORIT_STATIC_MEDIA_URL . 'target.svg' ); ?>"
					alt="<?php echo esc_attr__( 'цель', 'xorit' ); ?>"
				>
			</div>
			<div class="x-clients__dec x-clients__dec_red fit-contain absolute">
				<img
					width="592"
					height="592"
					class="x-clients__dec-image"
					src="<?php echo esc_url( XORIT_STATIC_MEDIA_URL . 'target.svg' ); ?>"
					alt="<?php echo esc_attr__( 'цель', 'xorit' ); ?>"
				>
			</div>
		<?php else : ?>
			<div class="x-clients__dec x-clients__dec_blue fit-contain absolute">
				<img
					width="798"
					height="798"
					class="x-clients__dec-image"
					src="<?php echo esc_url( XORIT_STATIC_MEDIA_URL . 'blue-sphere.svg' ); ?>"
					alt="<?php echo esc_attr__( 'cиняя сфера', 'xorit' ); ?>"
				>
			</div>
			<div class="x-clients__dec x-clients__dec_red fit-contain absolute">
				<img
					width="650"
					height="650"
					class="x-clients__dec-image"
					src="<?php echo esc_url( XORIT_STATIC_MEDIA_URL . 'red-sphere.svg' ); ?>"
					alt="<?php echo esc_attr__( 'красная сфера', 'xorit' ); ?>"
				>
			</div>
		<?php endif; ?>
		<div class="x-clients__grid">
			<?php if ( $_title || $description ) : ?>
				<div class="x-clients__title-wrapper js-x-clients-title">
					<?php if ( $_title ) : ?>
						<div class="x-clients__title-container">
							<h2 class="x-clients__title h2">
								<?php echo wp_kses_post( $_title ); ?>
							</h2>
						</div>
					<?php endif; ?>
					<?php if ( $description ) : ?>
						<div class="x-clients__description-container">
							<p class="x-clients__description body-1">
								<?php echo wp_kses_post( $description ); ?>
							</p>
						</div>
					<?php endif; ?>
				</div>
			<?php endif; ?>
			<div class="x-clients__right-side">
				<div class="x-clients__items flex fdc">
					<?php
					foreach ( $items as $item ) :
						$item_title       = trim_string( $item['title'] ?? '' );
						$item_description = trim_string( $item['description'] ?? '' );
						$item_quote       = '';
						$item_link        = '';

						if ( is_numeric( $item ) ) {
							$item_title       = trim_string( get_field( Constants::ACF_FIELD_SERVICES . '_child_title', $item ) );
							$item_title       = $item_title ? $item_title : get_the_title( $item );
							$item_description = trim_string( get_field( Constants::ACF_FIELD_SERVICES . '_child_description', $item ) );
							$item_quote       = trim_string( get_field( Constants::ACF_FIELD_SERVICES . '_child_quote', $item ) );
							$item_link        = get_permalink( $item );
						}

						if ( ! $item_title && ! $item_description ) {
							continue;
						}
						?>
						<div class="x-clients__item">
							<?php if ( $item_title ) : ?>
								<div class="x-clients__item-title-container">
									<h3 class="x-clients__item-title h3">
										<?php echo wp_kses_post( $item_title ); ?>
									</h3>
								</div>
							<?php endif; ?>
							<?php if ( $item_description ) : ?>
								<div class="x-clients__item-description-container">
									<?php echo wp_kses_post( $item_description ); ?>
								</div>
							<?php endif; ?>
							<?php if ( $item_quote ) : ?>
								<div class="x-clients__item-quote-container">
									<p class="x-clients__item-quote">
										<?php echo esc_html( $item_quote ); ?>
									</p>
								</div>
							<?php endif; ?>
							<?php if ( $item_link ) : ?>
								<div class="x-clients__item-link-container">
									<a href="<?php echo esc_url( $item_link ); ?>" class="x-clients__item-link x-button x-button_light">
										<?php echo esc_html__( 'Узнать больше об услуге', 'xorit' ); ?>
									</a>
								</div>
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				</div>
				<?php if ( ! empty( $cta ) ) : ?>
					<div class="x-clients__button-container">
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
		</div>
		<div class="js-x-clients-start"></div>
	</div>
</section>
