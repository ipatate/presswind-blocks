<?php
if (function_exists('pll_the_languages')):

	$translations = array_values(pll_the_languages(array('raw' => 1)));
	$context = wp_interactivity_data_wp_context(
		[
			'translations' => $translations,
			'has_translation' => count($translations) > 1,
			'current_lang' => pll_current_language(),
		]
	);

?>
	<div class="pw-lang-switcher" <?php echo $context; ?>>
		<button class="pw-lang-switcher-current" type="button" aria-label="<?php _e('change the language', 'presswind-blocks'); ?>" data-wp-class--only-one-i18n="!context.has_translation">
			<span data-wp-text="context.current_lang"></span>
			<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
				<path d="M16.59 8.29492L12 12.8749L7.41 8.29492L6 9.70492L12 15.7049L18 9.70492L16.59 8.29492Z" fill="currentColor" />
			</svg>
			<ul data-wp-bind--hidden="!context.has_translation">
				<template data-wp-each=" context.translations" data-wp-each-key="context.translations.id">
					<li data-wp-class--current-lang="context.item.current_lang">
						<a data-wp-bind--href="context.item.url" data-wp-text="context.item.slug"></a>
					</li>
				</template>
			</ul>
		</button>
	</div>
<?php endif; ?>
