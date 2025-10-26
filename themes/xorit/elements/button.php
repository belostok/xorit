<?php

use function xoritTheme\Helpers\trim_string;

$_link   = trim_string( $args['link'] ?? '' );
$_title  = trim_string( $args['title'] ?? '' );
$target  = trim_string( $args['target'] ?? '' );
$classes = trim_string( $args['classes'] ?? '' );
?>
<a
	href="<?php echo esc_url( $_link ); ?>"
	class="x-button <?php echo esc_attr( $classes ); ?>"
	target="<?php esc_attr( $target ); ?>"
>
	<?php echo esc_html( $_title ); ?>
</a>
