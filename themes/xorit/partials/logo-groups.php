<?php

use function xoritTheme\Helpers\trim_string;
use function xoritTheme\Helpers\get_array;

$hide = (bool) ( $args['hide'] ?? false );

if ( $hide ) {
	return null;
}

$groups  = get_array( $args['groups'] ?? array() );
$classes = trim_string( $args['classes'] ?? '' );

if ( empty( $groups ) ) {
	return null;
}
?>
<section class="x-logo-groups container <?php echo esc_attr( $classes ); ?>">
	<div class="x-logo-groups__wrapper wrapper">
		<div class="x-logo-groups__groups flex fdc">
			<?php
			foreach ( $groups as $group ) :
				$group_title = trim_string( $group['title'] ?? '' );
				$group_items = get_array( $group['items'] ?? array() );

				if ( empty( $group_items ) ) {
					continue;
				}
				?>
				<div class="x-logo-groups__group flex">
					<?php if ( $group_title ) : ?>
						<div class="x-logo-groups__title-container">
							<h3 class="x-logo-groups__title h3">
								<?php echo wp_kses_post( $group_title ); ?>
							</h3>
						</div>
					<?php endif; ?>
					<div class="x-logo-groups__logos flex fwrap aic">
						<?php
						foreach ( $group_items as $item ) :
							$logo = (int) ( $item['image'] ?? 0 );

							if ( ! $logo ) {
								continue;
							}
							?>
							<div class="x-logo-groups__logo-container">
								<?php xorit_the_image( $logo, 'x-logo-groups__logo' ); ?>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
