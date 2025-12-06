<?php

use function xoritTheme\Helpers\trim_string;
use function xoritTheme\Helpers\get_array;

$hide = (bool) ( $args['hide'] ?? false );

if ( $hide ) {
	return null;
}

$image      = (int) ( $args['image'] ?? 0 );
$_title     = trim_string( $args['title'] ?? '' );
$hide_upper = (bool) ( $args['hide_upper'] ?? false );
$you_do     = get_array( $args['you_do'] ?? array() );
$we_do      = get_array( $args['we_do'] ?? array() );
$cards      = get_array( $args['cards'] ?? array() );
$classes    = trim_string( $args['classes'] ?? '' );
?>
<section class="x-infographics container <?php echo esc_attr( $classes ); ?>">
	<div class="x-infographics__wrapper wrapper">
		<?php if ( $_title ) : ?>
			<div class="x-infographics__title-container">
				<h2 class="x-infographics__title h2">
					<?php echo wp_kses_post( $_title ); ?>
				</h2>
			</div>
		<?php endif; ?>
		<?php if ( ! $hide_upper && ( ! empty( $you_do ) || ! empty( $we_do ) ) ) : ?>
			<div class="x-infographics__graph relative">
				<?php if ( $image ) : ?>
					<div class="x-infographics__image-container absolute">
						<?php xorit_the_image( $image, 'x-infographics__image' ); ?>
					</div>
				<?php endif; ?>
				<div class="x-infographics__graph-inner flex fdc relative">
					<?php
					if ( ! empty( $you_do ) ) :
						$graph_title       = trim_string( $you_do['title'] ?? '' );
						$graph_description = trim_string( $you_do['description'] ?? '' );

						if ( $graph_title || $graph_description ) :
							?>
							<div class="x-infographics__graph-group x-infographics__graph-group_you relative">
								<div class="x-infographics__graph-group-inner flex fdc">
									<?php if ( $graph_title ) : ?>
										<div class="x-infographics__graph-title-container relative">
											<span class="x-infographics__graph-title-icon absolute"></span>
											<h3 class="x-infographics__graph-title h3">
												<?php echo esc_html( $graph_title ); ?>
											</h3>
										</div>
									<?php endif; ?>
									<?php if ( $graph_description ) : ?>
										<div class="x-infographics__graph-description-container">
											<p class="x-infographics__graph-description body-1">
												<?php echo wp_kses_post( $graph_description ); ?>
											</p>
										</div>
									<?php endif; ?>
								</div>
							</div>
							<?php
						endif;
					endif;
					?>
					<?php
					if ( ! empty( $we_do ) ) :
						$graph_title  = trim_string( $we_do['title'] ?? '' );
						$graph_points = get_array( $we_do['points'] ?? array() );

						if ( $graph_title || ! empty( $graph_points ) ) :
							?>
							<div class="x-infographics__graph-group x-infographics__graph-group_we relative">
								<div class="x-infographics__graph-group-inner flex fdc">
									<?php if ( $graph_title ) : ?>
										<div class="x-infographics__graph-title-container relative">
											<span class="x-infographics__graph-title-icon absolute"></span>
											<h3 class="x-infographics__graph-title h3">
												<?php echo esc_html( $graph_title ); ?>
											</h3>
										</div>
									<?php endif; ?>
									<?php
									if ( ! empty( $graph_points ) ) :
										foreach ( $graph_points as $graph_point ) :
											$graph_description = trim_string( $graph_point['point'] ?? '' );

											if ( ! $graph_description ) {
												continue;
											}
											?>
											<div class="x-infographics__graph-description-container">
												<p class="x-infographics__graph-description body-1">
													<?php echo wp_kses_post( $graph_description ); ?>
												</p>
											</div>
											<?php
										endforeach;
									endif;
									?>
								</div>
							</div>
							<?php
						endif;
					endif;
					?>
				</div>
			</div>
		<?php endif; ?>
		<?php if ( ! empty( $cards ) ) : ?>
			<div class="x-infographics__cards">
				<?php
				foreach ( $cards as $card ) :
					$background_color = trim_string( $card['background'] ?? '' );
					$text_color       = trim_string( $card['color'] ?? '' );
					$card_title       = trim_string( $card['title'] ?? '' );
					$points           = get_array( $card['points'] ?? array() );

					if ( empty( $points ) ) {
						continue;
					}

					$card_styles = '';
					if ( $background_color ) {
						$card_styles .= 'background-color: ' . esc_attr( $background_color ) . ';';
					}
					if ( $text_color ) {
						$card_styles .= 'color: ' . esc_attr( $text_color ) . ';';
					}
					if ( $card_styles ) {
						$card_styles = 'style="' . esc_attr( $card_styles ) . '"';
					}
					?>
					<div
						class="x-infographics__card flex fdc"
						<?php echo $card_styles; // phpcs:ignore ?>
					>
						<?php if ( $card_title ) : ?>
							<div class="x-infographics__card-title-container">
								<h2 class="x-infographics__card-title h2">
									<?php echo esc_html( $card_title ); ?>
								</h2>
							</div>
						<?php endif; ?>
						<div class="x-infographics__card-points flex fdc">
							<?php
							foreach ( $points as $point ) :
								$yes         = (bool) ( $point['yes_no'] ?? false );
								$point_title = trim_string( $point['point'] ?? '' );

								if ( ! $point_title ) {
									continue;
								}
								?>
								<div class="x-infographics__card-point flex aic">
									<div class="x-infographics__card-point-icon img-contain <?php echo esc_attr( $yes ? 'x-infographics__card-point-icon_yes' : '' ); ?>">
										<?php if ( $yes ) : ?>
											<svg width="30" height="30" viewBox="0 0 30 30" fill="none"
												xmlns="http://www.w3.org/2000/svg">
												<path d="M0 15L30 15" stroke="#597DA6" stroke-width="2"/>
												<path d="M15 0L15 30" stroke="#597DA6" stroke-width="2"/>
											</svg>
										<?php else : ?>
											<svg width="43" height="43" viewBox="0 0 43 43" fill="none"
												xmlns="http://www.w3.org/2000/svg">
												<path d="M10.6058 10.6074L31.819 31.8206" stroke="#C32F33"
													stroke-width="2"/>
												<path d="M31.8206 10.6074L10.6074 31.8206" stroke="#C32F33"
													stroke-width="2"/>
											</svg>
										<?php endif; ?>
									</div>
									<div class="x-infographics__card-point-title-container">
										<p class="x-infographics__card-point-title body-1">
											<?php echo wp_kses_post( $point_title ); ?>
										</p>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
