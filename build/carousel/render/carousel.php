<?php

namespace PresswindBlock;

require_once dirname(__FILE__) . '/parser.php';

add_filter(
	'render_block',
	function ($block_content, $block) {
		// filter block
		if ($block['blockName'] === 'core/query' && array_key_exists('namespace', $block['attrs']) && $block['attrs']['namespace'] === "presswind-blocks/carousel-post") {
			[$xpath, $document] = get_xpath($block_content);
			// main container
			$container = $xpath->query("//div[contains(@class, 'pw-carousel-post')]")->item(0);

			// list posts
			$ul = $xpath->query('//ul')->item(0);
			if (!$ul) {
        return $block_content;
      }
			$li = $xpath->query('//li');

			// create new wrapper
			$div = $container->ownerDocument->createElement('div');
			$div->setAttribute('class', 'pw-carousel-post__viewport');
			// set list in this new wrapper
			$div->appendChild($ul);

			// actions container
			$actions_container = $container->ownerDocument->createElement('div');
			$actions_container->setAttribute('class', 'pw-carousel-post__actions');

			// button container
			$button_container = $container->ownerDocument->createElement('div');
			$button_container->setAttribute('class', 'pw-carousel-post__buttons');

			// button next and previous
			$previous = $container->ownerDocument->createElement('button');
			$previous->setAttribute('class', 'pw-carousel-post__prev');
			$previous->setAttribute('type', 'button');
			$previous->setAttribute('title', __('previous', 'presswind-blocks'));

			$next = $container->ownerDocument->createElement('button');
			$next->setAttribute('class', 'pw-carousel-post__next');
			$next->setAttribute('type', 'button');
			$next->setAttribute('title', __('next', 'presswind-blocks'));

			// add button
			$button_container->appendChild($previous);
			$button_container->appendChild($next);

			// dots container
			$dot_container = $container->ownerDocument->createElement('div');
			$dot_container->setAttribute('class', 'pw-carousel-post__dots');

			$actions_container->appendChild($button_container);
			$actions_container->appendChild($dot_container);
			$div->appendChild($actions_container);

			// set new wrapper in main container
			$container->appendChild($div);


			return $document->saveHTML();
		}

		return $block_content;
	},
	1,
	2
);
