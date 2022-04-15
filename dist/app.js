/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/ts/select.ts":
/*!********************************!*\
  !*** ./resources/ts/select.ts ***!
  \********************************/
/***/ ((__unused_webpack_module, exports) => {



function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _unsupportedIterableToArray(arr) || _nonIterableSpread(); }

function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _iterableToArray(iter) { if (typeof Symbol !== "undefined" && iter[Symbol.iterator] != null || iter["@@iterator"] != null) return Array.from(iter); }

function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) return _arrayLikeToArray(arr); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

Object.defineProperty(exports, "__esModule", ({
  value: true
}));

exports["default"] = function (options) {
  return {
    model: options.model,
    searchable: options.searchable,
    multiselect: options.multiselect,
    readonly: options.readonly,
    disabled: options.disabled,
    placeholder: options.placeholder,
    optionValue: options.optionValue,
    optionLabel: options.optionLabel,
    popover: false,
    search: "",
    selectedOptions: [],
    init: function init() {
      var _this = this;

      this.initMultiSelect();
      this.$watch("popover", function (status) {
        if (status) {
          _this.$nextTick(function () {
            var _a;

            return (_a = _this.$refs.search) === null || _a === void 0 ? void 0 : _a.focus();
          });
        }
      });
      this.$watch("model", function (selected) {
        return _this.syncSelected(selected);
      });
      this.$watch("search", function (search) {
        return _this.filterOptions(search === null || search === void 0 ? void 0 : search.toLowerCase());
      });
    },
    togglePopover: function togglePopover() {
      if (this.readonly || this.disabled) return;
      this.popover = !this.popover;
      this.$refs.select.dispatchEvent(new Event(this.popover ? "open" : "close"));
    },
    closePopover: function closePopover() {
      this.popover = false;
      this.$refs.select.dispatchEvent(new Event("close"));
    },
    isSelected: function isSelected(value) {
      var _a;

      if (this.multiselect) {
        return !!Object.values((_a = this.model) !== null && _a !== void 0 ? _a : []).find(function (option) {
          return option == value;
        });
      }

      return value == this.model;
    },
    unSelect: function unSelect(value) {
      if (this.disabled || this.readonly) return;
      var index = this.selectedOptions.findIndex(function (option) {
        return option.value == value;
      });
      this.selectedOptions.splice(index, 1);
      index = this.model.findIndex(function (selected) {
        return selected == value;
      });
      this.model.splice(index, 1);
      this.$refs.select.dispatchEvent(new Event("select"));
    },
    select: function select(value) {
      if (this.disabled || this.readonly) return;
      this.search = "";

      if (this.multiselect) {
        this.model = Object.assign([], this.model);
        var index = this.model.findIndex(function (selected) {
          return selected == value;
        });
        if (~index) return this.unSelect(value);

        var _this$getOptionElemen = this.getOptionElement(value),
            option = _this$getOptionElemen.dataset;

        this.$refs.select.dispatchEvent(new Event("select"));
        this.selectedOptions.push(option);
        return this.model.push(value);
      }

      if (value === this.model) {
        value = null;
      }

      this.model = value;
      this.$refs.select.dispatchEvent(new Event("select"));
      this.closePopover();
    },
    clearModel: function clearModel() {
      var value = this.multiselect ? [] : null;
      this.model = value;
      this.selectedOptions = [];
      this.$refs.select.dispatchEvent(new Event("clear"));
    },
    isEmptyModel: function isEmptyModel() {
      var _a;

      if (this.multiselect) {
        return ((_a = this.model) === null || _a === void 0 ? void 0 : _a.length) === 0;
      }

      return this.model == null;
    },
    getOptionElement: function getOptionElement(value) {
      return this.$refs.optionsContainer.querySelector("[data-value='".concat(value, "']"));
    },
    getPlaceholderText: function getPlaceholderText() {
      var _a;

      if ((_a = this.model) === null || _a === void 0 ? void 0 : _a.toString().length) return null;
      return this.placeholder;
    },
    getValueText: function getValueText() {
      var _a;

      if (this.multiselect || !((_a = this.model) === null || _a === void 0 ? void 0 : _a.toString().length)) return null;
      return this.decodeSpecialChars(this.getOptionElement(this.model).dataset.label);
    },
    isAvailableInList: function isAvailableInList(search, option) {
      var label = this.decodeSpecialChars(option.dataset.label);
      var value = this.decodeSpecialChars(option.dataset.value);
      return label.toLowerCase().includes(search) || value.toLowerCase().includes(search);
    },
    filterOptions: function filterOptions(search) {
      var _this2 = this;

      var options = _toConsumableArray(this.$refs.optionsContainer.children);

      options.map(function (option) {
        if (_this2.isAvailableInList(search.toLowerCase(), option)) {
          option.classList.remove("hidden");
        } else {
          option.classList.add("hidden");
        }
      });
    },
    initMultiSelect: function initMultiSelect() {
      var _this3 = this;

      var _a;

      if (!this.multiselect) return;

      if (typeof this.model === "string") {
        this.model = [];
      }

      (_a = this.model) === null || _a === void 0 ? void 0 : _a.map(function (selected) {
        var _this3$getOptionEleme = _this3.getOptionElement(selected),
            option = _this3$getOptionEleme.dataset;

        _this3.selectedOptions.push(option);
      });
    },
    modelWasChanged: function modelWasChanged() {
      var _a;

      return ((_a = this.model) === null || _a === void 0 ? void 0 : _a.toString()) !== this.selectedOptions.map(function (option) {
        return option.value;
      }).toString();
    },
    syncSelected: function syncSelected() {
      var _this4 = this;

      var _a, _b;

      if (!this.multiselect || !this.modelWasChanged()) return;
      this.selectedOptions = (_b = (_a = this.model) === null || _a === void 0 ? void 0 : _a.map(function (option) {
        return _this4.getOptionElement(option).dataset;
      })) !== null && _b !== void 0 ? _b : [];
    },
    decodeSpecialChars: function decodeSpecialChars(text) {
      var textarea = document.createElement("textarea");
      textarea.innerHTML = text;
      return textarea.value;
    },
    getFocusables: function getFocusables() {
      var _a, _b, _c;

      var focusables = (_b = (_a = this.$el) === null || _a === void 0 ? void 0 : _a.querySelectorAll("li, input")) !== null && _b !== void 0 ? _b : [];
      return focusables.length > 0 ? _toConsumableArray(focusables) : _toConsumableArray((_c = this.$root) === null || _c === void 0 ? void 0 : _c.querySelectorAll("li, input"));
    },
    getFirstFocusable: function getFirstFocusable() {
      return this.getFocusables().shift();
    },
    getLastFocusable: function getLastFocusable() {
      return this.getFocusables().pop();
    },
    getNextFocusable: function getNextFocusable() {
      return this.getFocusables()[this.getNextFocusableIndex()] || this.getFirstFocusable();
    },
    getPrevFocusable: function getPrevFocusable() {
      return this.getFocusables()[this.getPrevFocusableIndex()] || this.getLastFocusable();
    },
    getNextFocusableIndex: function getNextFocusableIndex() {
      return (this.getFocusables().indexOf(document.activeElement) + 1) % (this.getFocusables().length + 1);
    },
    getPrevFocusableIndex: function getPrevFocusableIndex() {
      return Math.max(0, this.getFocusables().indexOf(document.activeElement)) - 1;
    }
  };
};

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
(() => {
var exports = __webpack_exports__;
/*!*******************************!*\
  !*** ./resources/ts/index.ts ***!
  \*******************************/


Object.defineProperty(exports, "__esModule", ({
  value: true
}));

var select_1 = __webpack_require__(/*! ./select */ "./resources/ts/select.ts");

document.addEventListener("alpine:init", function () {
  console.log("init");
  window.Alpine.data("select", select_1["default"]);
});
})();

/******/ })()
;