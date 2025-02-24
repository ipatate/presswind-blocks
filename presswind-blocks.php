<?php

/**
 * Plugin Name:       presswind-blocks
 * Description:       Block for starter theme Presswind/Goodmotion.
 * Version:           1.0.0
 * Requires at least: 6.7
 * Requires PHP:      8.0
 * Author:            The WordPress Contributors
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       presswind-blocks
 * GitHub Plugin URI: ipatate/presswind-blocks
 *
 * @package CreateBlock
 */

if (! defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}


require_once dirname(__FILE__) . '/src/carousel/render/carousel.php';
require_once dirname(__FILE__) . '/src/carousel/variation.php';


function create_block_presswindblocs_block_init()
{
	register_block_type(__DIR__ . '/build/burger-btn');
	register_block_type(__DIR__ . '/build/wrapper-navigation');
	register_block_type(__DIR__ . '/build/lang-switcher');
}
add_action('init', 'create_block_presswindblocs_block_init');
