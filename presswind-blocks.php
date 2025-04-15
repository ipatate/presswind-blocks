<?php
/**
 * Plugin Name:       Presswind Blocks
 * Description:       blocks for use with starter theme Goodmotion
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Version:          1.0.3
 * Author:           Patrick Faramaz
 * License:          GPL-2.0-or-later
 * License URI:      https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:      presswind-blocks
 * GitHub Plugin URI: ipatate/presswind-blocks
 *
 * @package Presswind
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
	register_block_type(__DIR__ . '/build/mega-menu');
}
add_action('init', 'create_block_presswindblocs_block_init');


/**
 * Adds a custom template part area for mega menus to the list of template part areas.
 *
 * @param array $areas Existing array of template part areas.
 * @return array Modified array of template part areas including the new "Menu" area.
 */
function presswind_mega_menu_template_part_areas( array $areas ) {
	$areas[] = array(
		'area'        => 'menu',
		'area_tag'    => 'div',
		'description' => __( 'Menu templates are used to create sections of a mega menu.', 'presswind-blocks' ),
		'icon'        => 'menu',
		'label'       => __( 'Menu', 'presswind-blocks' ),
	);

  return $areas;
}

add_filter( 'default_wp_template_part_areas', 'presswind_mega_menu_template_part_areas' );
