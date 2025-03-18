import { useState, useEffect } from "react";
import { __ } from "@wordpress/i18n";
import {
	InspectorControls,
	RichText,
	useBlockProps,
} from "@wordpress/block-editor";
import { ComboboxControl, PanelBody, TextControl } from "@wordpress/components";
import { useEntityRecords } from "@wordpress/core-data";

export default function Edit({ attributes, setAttributes }) {
	const { label, menuSlug, link } = attributes;

	const [menuOptions, setMenuOptions] = useState([]);

	// Fetch all template parts.
	const { hasResolved, records } = useEntityRecords(
		"postType",
		"wp_template_part",
		{ per_page: -1 },
	);

	// Filter the template parts for those in the 'menu' area.
	useEffect(() => {
		if (hasResolved) {
			setMenuOptions(
				records
					.filter((item) => item.area === "menu")
					.map((item) => ({
						label: item.title.rendered, // Title of the template part.
						value: item.slug, // Template part slug.
					})),
			);
		}
	}, [records, hasResolved]);

	return (
		<>
			<InspectorControls>
				<PanelBody title={__("Settings", "presswind-blocks")} initialOpen={true}>
					<TextControl
						label={__("Text", "presswind-blocks")}
						type="text"
						value={label}
						onChange={(value) => setAttributes({ label: value })}
						autoComplete="off"
					/>
					<TextControl
						label={__("Link", "presswind-blocks")}
						type="url"
						value={link}
						onChange={(value) => setAttributes({ link: value })}
						autoComplete="off"
					/>
					<ComboboxControl
						label={__("Mega Menu Template", "presswind-blocks")}
						value={menuSlug}
						options={menuOptions}
						onChange={(slugValue) => setAttributes({ menuSlug: slugValue })}
					/>
				</PanelBody>
			</InspectorControls>
			<div {...useBlockProps()}>
				<a className="wp-block-navigation-item__content">
					<RichText
						identifier="label"
						className="wp-block-navigation-item__label"
						value={label}
						onChange={(labelValue) =>
							setAttributes({
								label: labelValue,
							})
						}
						aria-label={__("Mega menu link text", "presswind-blocks")}
						placeholder={__("Add label…", "presswind-blocks")}
						allowedFormats={[
							"core/bold",
							"core/italic",
							"core/image",
							"core/strikethrough",
						]}
					/>
				</a>
			</div>
		</>
	);
}
