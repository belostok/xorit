<?php

use function xoritTheme\Helpers\trim_string;
use function xoritTheme\Helpers\get_array;

$hide = (bool) ( $args['hide'] ?? false );

if ( $hide ) {
	return null;
}

$_title  = trim_string( $args['title'] ?? '' );
$items   = get_array( $args['items'] ?? array() );
$classes = trim_string( $args['classes'] ?? '' );

if ( empty( $items ) ) {
	return null;
}
?>
<section class="x-faq container <?php echo esc_attr( $classes ); ?>">
	<div class="x-faq__wrapper wrapper">
		<?php if ( $_title ) : ?>
			<div class="x-faq__title-container">
				<h2 class="x-faq__title h2 desktop">
					<?php echo wp_kses_post( $_title ); ?>
				</h2>
			</div>
		<?php endif; ?>
		<div class="x-faq__items flex fdc js-x-faq-container">
			<?php
			$i = 0;
			foreach ( $items as $item ) :
				$item_id  = 'x-faq-item-' . $i;
				$opened   = (bool) ( $item['opened'] ?? false );
				$question = trim_string( $item['question'] ?? '' );
				$answer   = trim_string( $item['answer'] ?? '' );

				if ( ! $question || ! $answer ) {
					continue;
				}
				?>
				<div class="x-faq__item">
					<input
						type="checkbox"
						id="<?php echo esc_attr( $item_id ); ?>"
						class="x-faq__input js-x-faq-item"
						<?php echo esc_attr( $opened ? 'checked' : '' ); ?>
					>
					<label for="<?php echo esc_attr( $item_id ); ?>" class="x-faq__question flex aic jcspb">
						<span class="x-faq__question-title h3"><?php echo wp_kses_post( $question ); ?></span>
						<span class="x-faq__question-icon img-contain">
						<svg width="31" height="31" viewBox="0 0 31 31" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M0.171997 14.999L30.17 15.3428" stroke="#20202C"/>
						<path d="M15.3429 0.171875L14.9991 30.1699" stroke="#20202C"/>
						</svg>
					</span>
					</label>
					<div class="x-faq__answer">
						<div class="x-faq__answer-inner body-1">
							<?php echo wp_kses_post( $answer ); ?>
						</div>
					</div>
				</div>
				<?php
				$i ++;
			endforeach;
			?>
		</div>
	</div>
</section>
