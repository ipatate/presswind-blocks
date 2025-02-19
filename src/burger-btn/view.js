import { store, getElement } from "@wordpress/interactivity";

const { state } = store("presswind-blocks/navigation", {
	state: {},
	actions: {
		toggle: () => {
			state.isOpen = !state.isOpen;
			state.ariaLabel = state.isOpen ? state.dataClose : state.dataOpen;
		},
	},
});
