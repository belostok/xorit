<?php
/**
 * The main template file
 */

get_header();
?>

	<section class="page-content">
		<div class="entry-content">
			<?php if ( is_singular( 'post' ) ) : ?>
				<?php xorit_inline_style( 'post' ); ?>
				<div class="x-post-page container">
					<div class="x-post-page__wrapper wrapper">
						<div class="x-post-page__title-container">
							<h1 class="x-post-page__title h1">
								<?php the_title(); ?>
							</h1>
						</div>
						<div class="x-post-page__content">
							<?php the_content(); ?>
						</div>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</section>

<?php
get_footer();
