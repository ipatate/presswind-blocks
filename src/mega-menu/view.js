import { store, getContext, getElement } from "@wordpress/interactivity";

const { actions } = store("presswind-blocks/nav", {
	state: {
		get ariaLabel() {
			const context = getContext();
			return !context.menuIsOpen ? context.labelClose : context.labelOpen;
		},
	},
	actions: {
		watchOpen() {
			const context = getContext();
			if (context.isMenuOpen) {
				document.body.classList.add("pw-subnav-open");
			} else {
				document.body.classList.remove("pw-subnav-open");
			}
		},
		mounted: () => {
			const { ref } = getElement();
			const context = getContext();
      // Close menu when clicking outside
			document.addEventListener("click", (e) => {
				const target = e.target;
				if (!target || !context.isMenuOpen) return;
				if (target.closest(".wp-block-presswind-blocks-mega-menu")) return;
				context.isMenuOpen = false;
			});
		},
		openMenuOnHover(e) {
			const widthWindow = window.innerWidth;
			if (widthWindow < 1024) return;
			e.preventDefault();
			const context = getContext();
			context.isMenuOpen = true;
		},
		closeMenuOnHover(e) {
			const widthWindow = window.innerWidth;
			if (widthWindow < 1024) return;
			e.preventDefault();
			const context = getContext();
			context.isMenuOpen = false;
		},
		handleMenuFocusout(event) {
			const context = getContext();
			const target = event.target;
			context.isMenuOpen = false;
		},
    handleMenuFocusin(event) {
      const context = getContext();
      const target = event.currentTarget;
      context.isMenuOpen = true;
    },
		toggleMenuOnClick(event) {
			const context = getContext();
      const target = event.currentTarget;
			event.stopPropagation();
			context.isMenuOpen = !context.isMenuOpen;
		},
		openMenuOnClick(event) {
      const target = event.target;
      // only li and button after <a>
      if(!target.classList.contains("wp-block-presswind-blocks-mega-menu") && !target.classList.contains("wp-block-navigation-submenu__toggle")) return;

      const context = getContext();
			context.isMenuOpen = true;
		},
    // for close button
		closeMenuOnClick() {
			const context = getContext();
			context.isMenuOpen = false;
		},
    handleKeyDown(event) {
      const key = event.key;
      const context = getContext();
      if(key === "Enter" && window.document.activeElement.classList.contains("presswind-open-nav") && context.isMenuOpen) {
        event.stopPropagation();
        // nextTick
        setTimeout(() => {context.isMenuOpen = false;}, 150);
      }
    }
	},
});
