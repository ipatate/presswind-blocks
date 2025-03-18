<?php


function gm_carousel_loop($variations, $block_type)
{
	if ($block_type->name === 'core/query') {

		$variations[] = [
			'name' => 'presswind-blocks/carousel',
			'title' => __('Carousel Post', 'presswind-blocks'),
			'description' => __('Display a carousel of posts', 'presswind-blocks'),
			'category' => 'theme',
			'isActive' => [
				'query.postType',
				'namespace',
			],
			'icon' => 'slides',
			'scope' => ['inserter'],
			'attributes' => [
				'namespace' => 'presswind-blocks/carousel-post',
				'align' => 'full',
				'layout' => ['type' => 'constrained'],
				'className' => 'pw-carousel-post',
				'query' => [
					'postType' => 'post',
					'perPage' => 10,
					'pages' => 0,
					'offset' => 0,
					'order' => 'asc',
					'orderBy' => 'date',
					'author' => '',
					'search' => '',
					'exclude' => [],
					'sticky' => '',
					'inherit' => false,
				],
			],
			'innerBlocks' => [
				[
					'name' => 'core/post-template',
					'attributes' => [
						'className' => 'pw-carousel-post-container',
						'layout' => ['type' => 'grid'],
						'align' => 'full',
					],
					'innerBlocks' => [
						[
							'name' => 'core/group',
							'attributes' => [
								"style" => ["spacing" => ["blockGap" => "var:preset|spacing|small"]],
								"layout" => ["type" => "constrained"]
							],
							'innerBlocks' => [
								[
									'name' => 'core/post-featured-image',
									'attributes' => ["isLink" => false, "height" => "300px", "style" => ["border" => [], "radius" => "5px"]]
								],
								[
									'name' => 'core/post-title',
									'attributes' => [
										'level' => 3,
										'isLink' => true,
										"fontSize" => "medium"
									],
								],
								[
									'name' => 'core/post-date',
								],
								[
									'name' => 'core/post-excerpt',
									'attributes' => [
										'excerptLength' => 20,
										'moreText' => __('Read more', 'presswind-blocks'),
									],
								],
							],
						],
					],
				],
			],
		];
	}

	return $variations;
}

add_filter('get_block_type_variations', 'gm_carousel_loop', 10, 2);
