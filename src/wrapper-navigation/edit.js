import { __ } from "@wordpress/i18n";
import { useBlockProps, InnerBlocks } from "@wordpress/block-editor";

export default function Edit(props) {
	const { attributes, setAttributes } = props;
	return (
		<div {...useBlockProps()}>
			<InnerBlocks />
		</div>
	);
}
