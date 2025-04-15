import * as __WEBPACK_EXTERNAL_MODULE__wordpress_interactivity_8e89b257__ from "@wordpress/interactivity";
/******/ var __webpack_modules__ = ({

/***/ "@wordpress/interactivity":
/*!*******************************************!*\
  !*** external "@wordpress/interactivity" ***!
  \*******************************************/
/***/ ((module) => {

module.exports = __WEBPACK_EXTERNAL_MODULE__wordpress_interactivity_8e89b257__;

/***/ })

/******/ });
/************************************************************************/
/******/ // The module cache
/******/ var __webpack_module_cache__ = {};
/******/ 
/******/ // The require function
/******/ function __webpack_require__(moduleId) {
/******/ 	// Check if module is in cache
/******/ 	var cachedModule = __webpack_module_cache__[moduleId];
/******/ 	if (cachedModule !== undefined) {
/******/ 		return cachedModule.exports;
/******/ 	}
/******/ 	// Create a new module (and put it into the cache)
/******/ 	var module = __webpack_module_cache__[moduleId] = {
/******/ 		// no module.id needed
/******/ 		// no module.loaded needed
/******/ 		exports: {}
/******/ 	};
/******/ 
/******/ 	// Execute the module function
/******/ 	__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 
/******/ 	// Return the exports of the module
/******/ 	return module.exports;
/******/ }
/******/ 
/************************************************************************/
/******/ /* webpack/runtime/make namespace object */
/******/ (() => {
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = (exports) => {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/ })();
/******/ 
/************************************************************************/
var __webpack_exports__ = {};
// This entry needs to be wrapped in an IIFE because it needs to be isolated against other modules in the chunk.
(() => {
/*!*******************************!*\
  !*** ./src/mega-menu/view.js ***!
  \*******************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_interactivity__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/interactivity */ "@wordpress/interactivity");

const {
  actions
} = (0,_wordpress_interactivity__WEBPACK_IMPORTED_MODULE_0__.store)("presswind-blocks/nav", {
  state: {
    get ariaLabel() {
      const context = (0,_wordpress_interactivity__WEBPACK_IMPORTED_MODULE_0__.getContext)();
      return !context.menuIsOpen ? context.labelClose : context.labelOpen;
    }
  },
  actions: {
    watchOpen() {
      const context = (0,_wordpress_interactivity__WEBPACK_IMPORTED_MODULE_0__.getContext)();
      if (context.isMenuOpen) {
        document.body.classList.add("pw-subnav-open");
      } else {
        document.body.classList.remove("pw-subnav-open");
      }
    },
    mounted: () => {
      const {
        ref
      } = (0,_wordpress_interactivity__WEBPACK_IMPORTED_MODULE_0__.getElement)();
      const context = (0,_wordpress_interactivity__WEBPACK_IMPORTED_MODULE_0__.getContext)();
      // Close menu when clicking outside
      document.addEventListener("click", e => {
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
      const context = (0,_wordpress_interactivity__WEBPACK_IMPORTED_MODULE_0__.getContext)();
      context.isMenuOpen = true;
    },
    closeMenuOnHover(e) {
      const widthWindow = window.innerWidth;
      if (widthWindow < 1024) return;
      e.preventDefault();
      const context = (0,_wordpress_interactivity__WEBPACK_IMPORTED_MODULE_0__.getContext)();
      context.isMenuOpen = false;
    },
    handleMenuFocusout(event) {
      const context = (0,_wordpress_interactivity__WEBPACK_IMPORTED_MODULE_0__.getContext)();
      const target = event.target;
      context.isMenuOpen = false;
    },
    handleMenuFocusin(event) {
      const context = (0,_wordpress_interactivity__WEBPACK_IMPORTED_MODULE_0__.getContext)();
      const target = event.currentTarget;
      context.isMenuOpen = true;
    },
    toggleMenuOnClick(event) {
      const context = (0,_wordpress_interactivity__WEBPACK_IMPORTED_MODULE_0__.getContext)();
      const target = event.currentTarget;
      event.stopPropagation();
      context.isMenuOpen = !context.isMenuOpen;
    },
    openMenuOnClick(event) {
      const target = event.target;
      // only li and button after <a>
      if (!target.classList.contains("wp-block-presswind-blocks-mega-menu") && !target.classList.contains("wp-block-navigation-submenu__toggle")) return;
      const context = (0,_wordpress_interactivity__WEBPACK_IMPORTED_MODULE_0__.getContext)();
      context.isMenuOpen = true;
    },
    // for close button
    closeMenuOnClick() {
      const context = (0,_wordpress_interactivity__WEBPACK_IMPORTED_MODULE_0__.getContext)();
      context.isMenuOpen = false;
    },
    handleKeyDown(event) {
      const key = event.key;
      const context = (0,_wordpress_interactivity__WEBPACK_IMPORTED_MODULE_0__.getContext)();
      if (key === "Enter" && window.document.activeElement.classList.contains("presswind-open-nav") && context.isMenuOpen) {
        event.stopPropagation();
        // nextTick
        setTimeout(() => {
          context.isMenuOpen = false;
        }, 150);
      }
    }
  }
});
})();


//# sourceMappingURL=view.js.map