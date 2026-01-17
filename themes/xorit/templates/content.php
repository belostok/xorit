<?php
/**
 * Page Template Name: Контент
 */

$_title = get_the_title();

get_header();

xorit_inline_style( 'content' );
?>
<section class="x-content-page container">
	<div class="x-content-page__wrapper wrapper">
		<?php if ( $_title ) : ?>
			<div class="x-content-page__title-container">
				<h1 class="x-content-page__title h1">
					<?php echo esc_html( $_title ); ?>
				</h1>
			</div>
		<?php endif; ?>
		<div class="x-content-page__content">
			<?php the_content(); ?>
		</div>
	</div>
</section>
<?php

get_footer();
