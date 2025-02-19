import { __ } from "@wordpress/i18n";
import { useBlockProps } from "@wordpress/block-editor";
import ServerSideRender from "@wordpress/server-side-render";

export default function Edit(props) {
	const { attributes, setAttributes } = props;
	return (
		<div {...useBlockProps()}>
			<ServerSideRender
				block="presswind-blocks/lang-switcher"
				attributes={attributes}
			/>
		</div>
	);
}
