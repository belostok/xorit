<?php

const XORIT_WP_ENV         = 'development';
const XORIT_PATH           = __DIR__ . DIRECTORY_SEPARATOR;
const XORIT_THEME_INCLUDES = XORIT_PATH . 'includes' . DIRECTORY_SEPARATOR;
const XORIT_THEME_BLOCKS   = XORIT_PATH . 'build/blocks/';

define( 'XORIT_TEMPLATE_URL', get_template_directory_uri() . '/' );
define( 'XORIT_STYLESHEET_URL', get_stylesheet_uri() );
define( 'XORIT_THEME_PATH', get_template_directory() . DIRECTORY_SEPARATOR );
define( 'XORIT_STATIC_MEDIA_URL', get_template_directory_uri() . '/static_media/' );
define( 'XORIT_IS_MOB', wp_is_mobile() );

global $xorit_used_inline_styles;
$xorit_used_inline_styles = [];

require_once XORIT_THEME_INCLUDES . 'classes/class-constants.php';
require_once XORIT_THEME_INCLUDES . 'acf.php';
require_once XORIT_THEME_INCLUDES . 'blocks.php';
require_once XORIT_THEME_INCLUDES . 'cf7.php';
require_once XORIT_THEME_INCLUDES . 'cleaner.php';
require_once XORIT_THEME_INCLUDES . 'content.php';
require_once XORIT_THEME_INCLUDES . 'content-parts.php';
require_once XORIT_THEME_INCLUDES . 'core.php';
require_once XORIT_THEME_INCLUDES . 'cpt.php';
require_once XORIT_THEME_INCLUDES . 'customizer.php';
require_once XORIT_THEME_INCLUDES . 'enqueue.php';
require_once XORIT_THEME_INCLUDES . 'helpers.php';
require_once XORIT_THEME_INCLUDES . 'hooks.php';
require_once XORIT_THEME_INCLUDES . 'media.php';
require_once XORIT_THEME_INCLUDES . 'media-svg.php';
require_once XORIT_THEME_INCLUDES . 'shortcodes.php';
require_once XORIT_THEME_INCLUDES . 'taxonomies.php';

xoritTheme\ACF\start();
xoritTheme\Blocks\start();
xoritTheme\CF7\start();
xoritTheme\Cleaner\start();
xoritTheme\Content\start();
xoritTheme\Core\start();
xoritTheme\Customizer\start();
xoritTheme\Enqueue\start();
xoritTheme\Media\start();
xoritTheme\MediaSVG\start();
xoritTheme\Shortcodes\start();

// Require Composer autoloader if it exists
if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	require_once __DIR__ . '/vendor/autoload.php';
}
