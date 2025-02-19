<?php
wp_interactivity_state(
	'presswind-blocks/navigation',
	[
		'isOpen' => false,
		'ariaLabel' =>  __('open the navigation', 'presswind-blocks'),
		'dataOpen' => __('open the navigation', 'presswind-blocks'),
		'dataClose' =>  __('close the navigation', 'presswind-blocks')
	]
);
?>

<button data-wp-interactive="presswind-blocks/navigation" data-wp-class--pw-is-open="state.isOpen" class="pw-burger-btn" type="button" data-wp-bind--aria-label="state.ariaLabel" data-wp-on-async--click="actions.toggle">
	<span class="pw-burger"></span>
	<span class="pw-burger"></span>
	<span class="pw-burger"></span>
</button>
