<?php

namespace xoritTheme\Helpers;

/**
 * Get version.
 * @return array|false|int|string
 */
function get_version(): false|array|int|string {
	if ( XORIT_WP_ENV === 'development' ) {
		// Help us develop without browser caching
		return time();
	} else {
		return wp_get_theme()->get( 'Version' );
	}
}

/**
 * Trim string or return second argument if string is empty
 *
 * @param $value
 * @param string $return_if_not_string
 *
 * @return string
 */
function trim_string( $value, string $return_if_not_string = '' ): string {
	if ( ! is_string( $value ) ) {
		return $return_if_not_string;
	}

	return trim( $value );
}

/**
 * Check if value is array and return it or return an empty array if value is not array
 *
 * @param $value
 *
 * @return array
 */
function get_array( $value ): array {
	if ( ! is_array( $value ) ) {
		return [];
	}

	return $value;
}

/**
 * Get details of the ACF Link field array
 *
 * @param $link
 *
 * @return array|string[]
 */
function get_link_details( $link ): array {
	$link = get_array( $link );

	if ( empty( $link ) ) {
		return [];
	}

	$url    = trim_string( $link['url'] ?? '' );
	$title  = trim_string( $link['title'] ?? '' );
	$target = trim_string( $link['target'] ?? '' );

	if ( ! $url || ! $title ) {
		return [];
	}

	return [
		'url'    => $url,
		'title'  => $title,
		'target' => $target ? $target : '_self',
	];
}

/**
 * @param $_tabs
 * @param bool $is_mobile
 *
 * @return array|string[]
 */
function get_tabs_html( $_tabs, bool $is_mobile = false ) {
	$_tabs = get_array( $_tabs );

	if ( empty( $_tabs ) ) {
		return $_tabs;
	}

	$tabs_html    = '';
	$content_html = '';
	$i            = 1;

	foreach ( $_tabs as $_tab ) {
		$tab_title = trim_string( $_tab['tab_title'] ?? '' );

		if ( ! $tab_title ) {
			continue;
		}

		$is_active       = $i === 1;
		$tab_description = trim_string( $_tab['description'] ?? '' );
		$tab_image       = (int) ( $_tab['image'] ?? 0 );
		$tab_cta         = get_link_details( $_tab['cta'] ?? array() );

		if ( ! $tab_description && ! $tab_image ) {
			continue;
		}

		ob_start();

		if ( $is_mobile ) :
			echo '<div class="x-tabs__mobile-wrapper">';
		endif;
		?>
		<button
			data-tab="<?php echo esc_attr( $i ); ?>"
			class="x-tabs__button <?php echo esc_attr( $is_mobile ? '' : 'default-hover js-x-tabs-button' ); ?> <?php echo esc_attr( ( ! $is_mobile && $is_active ) ? 'x-tabs__button_prepare x-tabs__button_active' : '' ); ?>"
		>
			<span class="x-tabs__button-title">
				<?php echo esc_html( $tab_title ); ?>
			</span>
		</button>
		<?php if ( $is_mobile ) : ?>
			<div
				data-tab="<?php echo esc_attr( $i ); ?>"
				class="x-tabs__content x-tabs__content_prepare x-tabs__content_active"
			>
				<?php if ( $tab_description ) : ?>
					<div class="x-tabs__left-side">
						<div class="x-tabs__text x-content">
							<?php echo wp_kses_post( $tab_description ); ?>
						</div>
						<?php if ( ! empty( $tab_cta ) ) : ?>
							<div class="x-tabs__button-container mobile">
								<?php
								get_template_part(
									'elements/button',
									null,
									array(
										'link'   => $tab_cta['url'] ?? '',
										'title'  => $tab_cta['title'] ?? '',
										'target' => $tab_cta['target'] ?? '',
									)
								);
								?>
							</div>
						<?php endif; ?>
					</div>
				<?php endif; ?>
				<?php if ( $tab_image || $tab_cta ) : ?>
					<div class="x-tabs__right-side">
						<?php if ( $tab_image ) : ?>
							<div class="x-tabs__image-container">
								<?php xorit_the_image( $tab_image, 'x-tabs__image' ); ?>
							</div>
						<?php endif; ?>
						<?php if ( ! empty( $tab_cta ) ) : ?>
							<div class="x-tabs__button-container desktop">
								<?php
								get_template_part(
									'elements/button',
									null,
									array(
										'link'    => $tab_cta['url'] ?? '',
										'title'   => $tab_cta['title'] ?? '',
										'target'  => $tab_cta['target'] ?? '',
										'classes' => 'x-button_white',
									)
								);
								?>
							</div>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</div>
		<?php endif; ?>
		<?php
		if ( $is_mobile ) :
			echo '</div>';
		endif;

		$tabs_html .= ob_get_clean();

		if ( ! $is_mobile ) :
			ob_start();
			?>
			<div
				data-tab="<?php echo esc_attr( $i ); ?>"
				class="x-tabs__content js-x-tabs-content <?php echo esc_attr( $is_active ? 'x-tabs__content_prepare x-tabs__content_active' : '' ); ?>"
			>
				<?php if ( $tab_description ) : ?>
					<div class="x-tabs__left-side">
						<div class="x-tabs__text x-content">
							<?php echo wp_kses_post( $tab_description ); ?>
						</div>
						<?php if ( ! empty( $tab_cta ) ) : ?>
							<div class="x-tabs__button-container mobile">
								<?php
								get_template_part(
									'elements/button',
									null,
									array(
										'link'   => $tab_cta['url'] ?? '',
										'title'  => $tab_cta['title'] ?? '',
										'target' => $tab_cta['target'] ?? '',
									)
								);
								?>
							</div>
						<?php endif; ?>
					</div>
				<?php endif; ?>
				<?php if ( $tab_image || $tab_cta ) : ?>
					<div class="x-tabs__right-side">
						<?php if ( $tab_image ) : ?>
							<div class="x-tabs__image-container">
								<?php xorit_the_image( $tab_image, 'x-tabs__image' ); ?>
							</div>
						<?php endif; ?>
						<?php if ( ! empty( $tab_cta ) ) : ?>
							<div class="x-tabs__button-container desktop">
								<?php
								get_template_part(
									'elements/button',
									null,
									array(
										'link'    => $tab_cta['url'] ?? '',
										'title'   => $tab_cta['title'] ?? '',
										'target'  => $tab_cta['target'] ?? '',
										'classes' => 'x-button_white',
									)
								);
								?>
							</div>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</div>
			<?php
			$content_html .= ob_get_clean();
		endif;
		$i ++;
	}

	return array(
		'tabs_html'    => $tabs_html,
		'content_html' => $content_html,
	);
}

/**
 * Strip phone number.
 * @param $phone
 *
 * @return array|string|null
 */
function get_tel( $phone ): array|string|null {
	$phone = trim_string( $phone );

	if ( ! $phone ) {
		return '';
	}

	return preg_replace( '/[^\d+]/', '', $phone );
}
