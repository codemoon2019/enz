/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 5);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/js/backend/datatable/app.js":
/*!******************************************************!*\
  !*** ./resources/assets/js/backend/datatable/app.js ***!
  \******************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _renderer__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./renderer */ "./resources/assets/js/backend/datatable/renderer.js");
/* harmony import */ var _renderer__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_renderer__WEBPACK_IMPORTED_MODULE_0__);


window.initDataTable = function (el, options, callbacks) {
  var table_options = {
    processing: false,
    serverSide: true,
    scrollY: "45vh",
    scrollCollapse: false,
    ajax: {},
    columns: [],
    searchDelay: 500,
    order: [[0, "desc"]]
  },
      table = null,
      table_callbacks = {
    processingCallback: function processingCallback() {},
    processedCallback: function processedCallback(response) {},
    initCallback: function initCallback(table) {}
  };
  $.extend(table_options, options);
  $.extend(table_callbacks, callbacks);

  var columns = function columns() {
    var columns = [];

    for (var i = 0; i < table_options.columns.length; i++) {
      var column = table_options.columns[i];

      switch (column.type) {
        case "actions":
          column.render = function (data) {
            return DataTableRenderer.renderActions(data);
          };

          break;

        case "image":
          column.render = function (data) {
            return DataTableRenderer.renderImage(data);
          };

          break;

        case "status_update":
          column.render = function (data) {
            return data.can ? DataTableRenderer.renderMark(data) : data.statuses[data.value];
          };

          break;
      }

      columns.push(column);
    }

    return columns;
  };

  table_options.columns = columns();

  table_options.ajax.beforeSend = function () {
    if (table_callbacks.processingCallback) {
      table_callbacks.processingCallback();
    }
  };

  table_options.ajax.dataSrc = function (response) {
    if (table_callbacks.processedCallback) {
      table_callbacks.processedCallback(response);
    }

    return response.data;
  };

  table_options.fnInitComplete = function () {
    if (table_callbacks.initCallback) {
      table_callbacks.initCallback(table);
    }
  };

  table = el.DataTable(table_options);
  table.columns.adjust();
  return table;
};

/***/ }),

/***/ "./resources/assets/js/backend/datatable/renderer.js":
/*!***********************************************************!*\
  !*** ./resources/assets/js/backend/datatable/renderer.js ***!
  \***********************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Render Options
 */
window.DataTableRenderer = {
  renderImage: function renderImage(src) {
    return "<a href=\"".concat(src, "\" alt=\"no image\" class=\"fancy-box\"><img class=\"img-rounded img-preview img-preview-xs img-size-50-50\" src=\"").concat(src, "\"/></a>");
  },
  renderActions: function renderActions(data) {
    if (data.length < 1) {
      return '<div class="badge badge-secondary">No Actions</div>';
    }

    var buttons = "",
        more_buttons = "",
        more_links = 0;

    if (Array.isArray(data)) {
      data = data.reduce(function (acc, cur, i) {
        acc[i] = cur;
        return acc;
      }, {});
    }

    for (var key in data) {
      var link = data[key],
          button = "";

      switch (link.type) {
        case "show":
          if (link.group == "more") {
            button = "<a class=\"text-info\" name=\"btn_show\" href=\"".concat(link.url || "#", "\" data-redirect=\"").concat(link.redirect, "\"><i class=\"fa fa-search text-info\"></i> View</a>");
          } else {
            button = "<a href=\"".concat(link.url || "#", "\" class=\"btn btn-sm btn-info\"><i class=\"fa fa-search\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"View\"></i></a>");
          }

          break;

        case "edit":
          if (link.group == "more") {
            button = "<a class=\"text-primary\" name=\"btn_edit\" href=\"".concat(link.url || "#", "\" ").concat(link.redirect ? "data-redirect='" + link.redirect + "'" : "", "><i class=\"fa fa-pencil text-primary\"></i> Edit</a>");
          } else {
            button = "<a href=\"".concat(link.url || "#", "\" name=\"btn_edit\" ").concat(link.redirect ? "data-redirect='" + link.redirect + "'" : "", " class=\"btn btn-sm btn-primary\"><i class=\"fa fa-pencil\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Edit\"></i></a>");
          }

          break;

        case "update":
          if (link.group == "more") {
            button = "<a class=\"text-primary\" name=\"btn_update\" href=\"".concat(link.url || "#", "\" ").concat(link.redirect ? "data-redirect='" + link.redirect + "'" : "", "><i class=\"fa fa-pencil text-primary\"></i> Update</a>");
          } else {
            button = "<a href=\"".concat(link.url || "#", "\" name=\"btn_update\" ").concat(link.redirect ? "data-redirect='" + link.redirect + "'" : "", " class=\"btn btn-sm btn-primary\"><i class=\"fa fa-pencil\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Update\"></i></a>");
          }

          break;

        case "destroy":
          if (link.group == "more") {
            button = "<a class=\"text-danger\" name=\"btn_destroy\" href=\"".concat(link.url || "#", "\" ").concat(link.redirect ? "data-redirect='" + link.redirect + "'" : "", "><i class=\"fa fa-trash text-danger\"></i> Delete</a>");
          } else {
            button = "<a href=\"".concat(link.url || "#", "\" name=\"btn_destroy\" ").concat(link.redirect ? "data-redirect='" + link.redirect + "'" : "", " class=\"btn btn-sm btn-danger\"><i class=\"fa fa-trash\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Delete\"></i></a>");
          }

          break;

        case "purge":
          if (link.group == "more") {
            button = "<a class=\"text-danger\" name=\"btn_purge\" href=\"".concat(link.url || "#", "\" ").concat(link.redirect ? "data-redirect='" + link.redirect + "'" : "", "><i class=\"fa fa-trash text-danger\"></i> Delete</a>");
          } else {
            button = "<a href=\"".concat(link.url || "#", "\" name=\"btn_purge\" ").concat(link.redirect ? "data-redirect='" + link.redirect + "'" : "", " class=\"btn btn-sm btn-danger\"><i class=\"fa fa-trash\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Delete\"></i></a>");
          }

          break;

        case "restore":
          if (link.group == "more") {
            button = "<a class=\"text-info\" name=\"btn_restore\" href=\"".concat(link.url || "#", "\" ").concat(link.redirect ? "data-redirect='" + link.redirect + "'" : "", "><i class=\"fa fa-refresh text-info\"></i> Restore</a>");
          } else {
            button = "<a href=\"".concat(link.url || "#", "\" name=\"btn_restore\" ").concat(link.redirect ? "data-redirect='" + link.redirect + "'" : "", " class=\"btn btn-sm btn-info\"><i class=\"fa fa-refresh\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Restore\"></i></a>");
          }

          break;

        default:
          if (link.group == "more") {
<<<<<<< HEAD
            button = "<a class=\"".concat(link["class"] || "", "\" name=\"").concat(link.name || "", "\" href=\"").concat(link.url || "#", "\" ").concat(link.redirect ? "data-redirect='" + link.redirect + "'" : "", "><i class=\"").concat(link.icon || "", "\"></i> ").concat(link.label || "", "</a>");
          } else {
            button = "<a href=\"".concat(link.url || "#", "\" name=\"").concat(link.name || "", "\" ").concat(link.redirect ? "data-redirect='" + link.redirect + "'" : "", " class=\"").concat(link["class"] || "", "\"><i class=\"").concat(link.icon || "", "\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"").concat(link.label || "", "\"></i></a>");
=======
            button = "<a class=\"".concat(link.class || "", "\" name=\"").concat(link.name || "", "\" href=\"").concat(link.url || "#", "\" ").concat(link.redirect ? "data-redirect='" + link.redirect + "'" : "", "><i class=\"").concat(link.icon || "", "\"></i> ").concat(link.label || "", "</a>");
          } else {
            button = "<a href=\"".concat(link.url || "#", "\" name=\"").concat(link.name || "", "\" ").concat(link.redirect ? "data-redirect='" + link.redirect + "'" : "", " class=\"").concat(link.class || "", "\"><i class=\"").concat(link.icon || "", "\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"").concat(link.label || "", "\"></i></a>");
>>>>>>> c17c9721efee7c16246d82a0188cb07d0419ea91
          }

          break;
      }

      if (link.group == "more") {
        more_links++;
        more_buttons += "<li  class=\"dropdown-item\">".concat(button, "</li>");
      } else {
        buttons += button;
      }
    }

    more_buttons = " <div class=\"btn-group\" role=\"group\">\n                        <button id=\"userActions\" type=\"button\" class=\"btn btn-secondary btn-sm dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\"> More </button>\n                        <div class=\"dropdown-menu\" aria-labelledby=\"userActions\"> ".concat(more_buttons, " </div>\n                    </div>");
    return "<div class=\"btn-group btn-group-sm\" role=\"group\" aria-label=\"Actions\">\n                    ".concat(buttons, "\n                   ").concat(more_links > 0 ? more_buttons : "", "\n                </div>");
  },
  renderMark: function renderMark(data) {
    var options = "";

    for (var k in data.statuses) {
      var status = data.statuses[k].label || data.statuses[k];
      isActive = k == data.value;
      options += "<option value=\"".concat(k, "\" ").concat(isActive ? 'selected="true"' : "", " >").concat(status.capitalize(), "</option>");
    }

    if (!data.can) {
      return (data.statuses[data.value] || "").capitalize();
    }

    return "\n            <select name=\"status_update\" class=\"form-control\" data-link=\"".concat(data.link, "\">\n                ").concat(options, "\n            </select>\n        ");
  }
};

/***/ }),

/***/ 5:
/*!************************************************************!*\
  !*** multi ./resources/assets/js/backend/datatable/app.js ***!
  \************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

<<<<<<< HEAD
module.exports = __webpack_require__(/*! /home/janno/Documents/homestead/enzeducation/resources/assets/js/backend/datatable/app.js */"./resources/assets/js/backend/datatable/app.js");
=======
module.exports = __webpack_require__(/*! /home/nico/Code/enzeducation/resources/assets/js/backend/datatable/app.js */"./resources/assets/js/backend/datatable/app.js");
>>>>>>> c17c9721efee7c16246d82a0188cb07d0419ea91


/***/ })

/******/ });