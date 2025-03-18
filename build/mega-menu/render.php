<?php
$label     = esc_html( $attributes['label'] ?? '' );
$menu_slug = esc_attr( $attributes['menuSlug'] ?? '' );
$link = esc_attr( $attributes['link'] ?? '#' );
$close_icon  = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" aria-hidden="true" focusable="false"><path d="M13 11.8l6.1-6.3-1-1-6.1 6.2-6.1-6.2-1 1 6.1 6.3-6.5 6.7 1 1 6.5-6.6 6.5 6.6 1-1z"></path></svg>';
$arrow_icon = '<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none" aria-hidden="true" style="pointer-events: none;" focusable="false"><path d="M1.50002 4L6.00002 8L10.5 4" stroke-width="1.5"></path></svg>';
$plus_icon = '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="currentColor" d="M11 21v-8H3v-2h8V3h2v8h8v2h-8v8z"/></svg>';

// Don't display the mega menu link if there is no label or no menu slug.
if ( ! $label || ! $menu_slug ) {
	return null;
}
?>
<li
<?php echo get_block_wrapper_attributes(["class" =>"wp-block-navigation-item presswind-has-child wp-block-navigation-submenu"]); ?>
	<?php echo wp_interactivity_data_wp_context([
		"init" => false,
		"isMenuOpen" => false,
		"labelOpen" => __( 'Open menu', 'presswind-blocks' ) . ' ' . $label,
		"labelClose" => __( 'Close menu', 'presswind-blocks' ) . ' ' . $label,
	]); ?>
	data-wp-interactive="presswind-blocks/nav"
	data-wp-bind--data-open="context.isMenuOpen"
	data-wp-on--focusout="actions.handleMenuFocusout" data-wp-on--mouseenter="actions.openMenuOnHover" data-wp-on--mouseleave="actions.closeMenuOnHover"
  data-wp-on--keydown="actions.handleKeyDown"
  data-wp-on--click="actions.openMenuOnClick"
  data-wp-watch="actions.watchOpen"
	data-wp-init="actions.mounted"
	>
	<a href="<?php echo $link; ?>" class="wp-block-navigation-item__content" >
		<?php echo $label; ?>
	</a>
	<button
	data-wp-bind--aria-expanded="context.isMenuOpen" data-wp-on--click="actions.openMenuOnClick" aria-label="<?php echo __( 'Open menu', 'presswind-blocks' ) . ' ' . $label; ?>" class="wp-block-navigation__submenu-icon wp-block-navigation-submenu__toggle presswind-open-nav" aria-expanded="false"
	type="button"
	>
	<?php echo $arrow_icon; ?>
	<?php echo $plus_icon; ?>
</button>
<div data-wp-on-async--focusin="actions.handleMenuFocusin" class="wp-block-navigation__submenu-container wp-block-navigation-submenu wp-block-presswind-mega-menu__menu-container">
	<?php echo block_template_part( $menu_slug ); ?>
</div>
<button
	class="menu-container__close-button"
	aria-label="<?php echo __( 'Close menu', 'presswind-blocks' ) . ' ' . $label; ?>"
	data-wp-on--click="actions.closeMenuOnClick"
	type="button"
>
	<?php echo $close_icon; ?>
</button>
</li>

