<?php

use function xoritTheme\Helpers\trim_string;
use function xoritTheme\Helpers\get_array;
use function xoritTheme\Helpers\get_link_details;

$hide      = (bool) ( $args['hide'] ?? false );
$_title    = trim_string( $args['title'] ?? '' );
$tasks     = get_array( $args['items'] ?? array() );
$cta_red   = get_link_details( $args['cta_red'] ?? array() );
$cta_white = get_link_details( $args['cta_white'] ?? array() );
$classes   = trim_string( $args['classes'] ?? '' );

if ( $hide || empty( $tasks ) ) {
	return null;
}

if ( count( $tasks ) % 2 === 0 ) {
	$classes .= ' x-tasks_even';
}
?>
<section class="x-tasks container <?php echo esc_attr( $classes ); ?>">
	<div class="x-tasks__wrapper wrapper relative">
		<?php if ( $_title ) : ?>
			<div class="x-tasks__title-container">
				<h2 class="x-tasks__title h2">
					<?php echo wp_kses_post( $_title ); ?>
				</h2>
			</div>
		<?php endif; ?>
		<div class="x-tasks__items">
			<?php
			$i = 0;
			$d = 0;
			foreach ( $tasks as $task ) :
				$task_icon        = (int) ( $task['icon'] ?? 0 );
				$task_title       = trim_string( $task['title'] ?? '' );
				$task_description = trim_string( $task['description'] ?? '' );

				if ( ! $task_title && ! $task_description ) {
					continue;
				}
				?>
				<div
					class="x-tasks__item flex fdc js-x-fade-up-item"
					data-delay="<?php echo esc_attr( $d ); ?>"
				>
					<?php if ( $task_icon ) : ?>
						<div class="x-tasks__item-icon-container img-contain">
							<?php xorit_the_image( $task_icon, 'x-tasks__item-icon' ); ?>
						</div>
						<?php
					endif;
					?>
					<?php if ( $task_title ) : ?>
						<div class="x-tasks__item-title-container">
							<h3 class="x-tasks__item-title h3">
								<?php echo wp_kses_post( $task_title ); ?>
							</h3>
						</div>
					<?php endif; ?>
					<?php if ( $task_description ) : ?>
						<div class="x-tasks__item-description-container">
							<p class="x-tasks__item-description body-1">
								<?php echo wp_kses_post( $task_description ); ?>
							</p>
						</div>
					<?php endif; ?>
				</div>
				<?php
				$d = $i % 2 === 0 ? $d + 0.3 : 0;
				$i ++;
			endforeach;
			?>
		</div>
		<?php if ( ! empty( $cta_red ) || ! empty( $cta_white ) ) : ?>
			<div class="x-tasks__button-container desktop flex fwrap">
				<?php
				get_template_part(
					'elements/button',
					null,
					array(
						'link'   => $cta_red['url'] ?? '',
						'title'  => $cta_red['title'] ?? '',
						'target' => $cta_red['target'] ?? '',
					)
				);
				?>
				<?php
				get_template_part(
					'elements/button',
					null,
					array(
						'link'    => $cta_white['url'] ?? '',
						'title'   => $cta_white['title'] ?? '',
						'target'  => $cta_white['target'] ?? '',
						'classes' => 'x-button_white',
					)
				);
				?>
			</div>
		<?php endif; ?>
	</div>
</section>
