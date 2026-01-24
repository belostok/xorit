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
				<div class="x-post">
					<div class="x-post__wrapper">
						<div class="x-post__title-container container">
							<div class="x-post__title-wrapper wrapper">
								<h1 class="x-post__title h1">
									<?php the_title(); ?>
								</h1>
							</div>
						</div>
						<div class="x-post__content-container container">
							<div class="x-post__content-wrapper wrapper">
								<?php the_content(); ?>
							</div>
						</div>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</section>

<?php
get_footer();
