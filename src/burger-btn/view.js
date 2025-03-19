import { store, getElement } from "@wordpress/interactivity";

const { state } = store("presswind-blocks/navigation", {
	state: {},
	actions: {
		toggle: () => {
			state.isOpen = !state.isOpen;
			state.ariaLabel = state.isOpen ? state.dataClose : state.dataOpen;
      if(state.isOpen) {
        document.body.classList.add("pw-nav-open");
      } else {
        document.body.classList.remove("pw-nav-open");
      }
		},
	},
});
