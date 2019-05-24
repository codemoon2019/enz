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
/******/ 	return __webpack_require__(__webpack_require__.s = 6);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/js/backend/menu/app.js":
/*!*************************************************!*\
  !*** ./resources/assets/js/backend/menu/app.js ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! ./jquery-sortable.min.js */ "./resources/assets/js/backend/menu/jquery-sortable.min.js");

__webpack_require__(/*! ./nested.js */ "./resources/assets/js/backend/menu/nested.js");

/***/ }),

/***/ "./resources/assets/js/backend/menu/jquery-sortable.min.js":
/*!*****************************************************************!*\
  !*** ./resources/assets/js/backend/menu/jquery-sortable.min.js ***!
  \*****************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _typeof(obj) { if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

!function (d, B, m, f) {
  function v(a, b) {
    var c = Math.max(0, a[0] - b[0], b[0] - a[1]),
        e = Math.max(0, a[2] - b[1], b[1] - a[3]);
    return c + e;
  }

  function w(a, b, c, e) {
    var k = a.length;
    e = e ? "offset" : "position";

    for (c = c || 0; k--;) {
      var g = a[k].el ? a[k].el : d(a[k]),
          l = g[e]();
      l.left += parseInt(g.css("margin-left"), 10);
      l.top += parseInt(g.css("margin-top"), 10);
      b[k] = [l.left - c, l.left + g.outerWidth() + c, l.top - c, l.top + g.outerHeight() + c];
    }
  }

  function p(a, b) {
    var c = b.offset();
    return {
      left: a.left - c.left,
      top: a.top - c.top
    };
  }

  function x(a, b, c) {
    b = [b.left, b.top];
    c = c && [c.left, c.top];

    for (var e, k = a.length, d = []; k--;) {
      e = a[k], d[k] = [k, v(e, b), c && v(e, c)];
    }

    return d = d.sort(function (a, b) {
      return b[1] - a[1] || b[2] - a[2] || b[0] - a[0];
    });
  }

  function q(a) {
    this.options = d.extend({}, n, a);
    this.containers = [];
    this.options.rootGroup || (this.scrollProxy = d.proxy(this.scroll, this), this.dragProxy = d.proxy(this.drag, this), this.dropProxy = d.proxy(this.drop, this), this.placeholder = d(this.options.placeholder), a.isValidTarget || (this.options.isValidTarget = f));
  }

  function t(a, b) {
    this.el = a;
    this.options = d.extend({}, z, b);
    this.group = q.get(this.options);
    this.rootGroup = this.options.rootGroup || this.group;
    this.handle = this.rootGroup.options.handle || this.rootGroup.options.itemSelector;
    var c = this.rootGroup.options.itemPath;
    this.target = c ? this.el.find(c) : this.el;
    this.target.on(r.start, this.handle, d.proxy(this.dragInit, this));
    this.options.drop && this.group.containers.push(this);
  }

  var r,
      z = {
    drag: !0,
    drop: !0,
    exclude: "",
    nested: !0,
    vertical: !0
  },
      n = {
    afterMove: function afterMove(a, b, c) {},
    containerPath: "",
    containerSelector: "ol, ul",
    distance: 0,
    delay: 0,
    handle: "",
    itemPath: "",
    itemSelector: "li",
    bodyClass: "dragging",
    draggedClass: "dragged",
    isValidTarget: function isValidTarget(a, b) {
      return !0;
    },
    onCancel: function onCancel(a, b, c, e) {},
    onDrag: function onDrag(a, b, c, e) {
      a.css(b);
    },
    onDragStart: function onDragStart(a, b, c, e) {
      a.css({
        height: a.outerHeight(),
        width: a.outerWidth()
      });
      a.addClass(b.group.options.draggedClass);
      d("body").addClass(b.group.options.bodyClass);
    },
    onDrop: function onDrop(a, b, c, e) {
      a.removeClass(b.group.options.draggedClass).removeAttr("style");
      d("body").removeClass(b.group.options.bodyClass);
    },
    onMousedown: function onMousedown(a, b, c) {
      if (!c.target.nodeName.match(/^(input|select|textarea)$/i)) return c.preventDefault(), !0;
    },
    placeholderClass: "placeholder",
    placeholder: '<li class="placeholder"></li>',
    pullPlaceholder: !0,
    serialize: function serialize(a, b, c) {
      a = d.extend({}, a.data());
      if (c) return [b];
      b[0] && (a.children = b);
      delete a.subContainers;
      delete a.sortable;
      return a;
    },
    tolerance: 0
  },
      s = {},
      y = 0,
      A = {
    left: 0,
    top: 0,
    bottom: 0,
    right: 0
  };
  r = {
    start: "touchstart.sortable mousedown.sortable",
    drop: "touchend.sortable touchcancel.sortable mouseup.sortable",
    drag: "touchmove.sortable mousemove.sortable",
    scroll: "scroll.sortable"
  };

  q.get = function (a) {
    s[a.group] || (a.group === f && (a.group = y++), s[a.group] = new q(a));
    return s[a.group];
  };

  q.prototype = {
    dragInit: function dragInit(a, b) {
      this.$document = d(b.el[0].ownerDocument);
      var c = d(a.target).closest(this.options.itemSelector);
      c.length && (this.item = c, this.itemContainer = b, !this.item.is(this.options.exclude) && this.options.onMousedown(this.item, n.onMousedown, a) && (this.setPointer(a), this.toggleListeners("on"), this.setupDelayTimer(), this.dragInitDone = !0));
    },
    drag: function drag(a) {
      if (!this.dragging) {
        if (!this.distanceMet(a) || !this.delayMet) return;
        this.options.onDragStart(this.item, this.itemContainer, n.onDragStart, a);
        this.item.before(this.placeholder);
        this.dragging = !0;
      }

      this.setPointer(a);
      this.options.onDrag(this.item, p(this.pointer, this.item.offsetParent()), n.onDrag, a);
      a = this.getPointer(a);
      var b = this.sameResultBox,
          c = this.options.tolerance;
      (!b || b.top - c > a.top || b.bottom + c < a.top || b.left - c > a.left || b.right + c < a.left) && !this.searchValidTarget() && (this.placeholder.detach(), this.lastAppendedItem = f);
    },
    drop: function drop(a) {
      this.toggleListeners("off");
      this.dragInitDone = !1;

      if (this.dragging) {
        if (this.placeholder.closest("html")[0]) this.placeholder.before(this.item).detach();else this.options.onCancel(this.item, this.itemContainer, n.onCancel, a);
        this.options.onDrop(this.item, this.getContainer(this.item), n.onDrop, a);
        this.clearDimensions();
        this.clearOffsetParent();
        this.lastAppendedItem = this.sameResultBox = f;
        this.dragging = !1;
      }
    },
    searchValidTarget: function searchValidTarget(a, b) {
      a || (a = this.relativePointer || this.pointer, b = this.lastRelativePointer || this.lastPointer);

      for (var c = x(this.getContainerDimensions(), a, b), e = c.length; e--;) {
        var d = c[e][0];
        if (!c[e][1] || this.options.pullPlaceholder) if (d = this.containers[d], !d.disabled) {
          if (!this.$getOffsetParent()) {
            var g = d.getItemOffsetParent();
            a = p(a, g);
            b = p(b, g);
          }

          if (d.searchValidTarget(a, b)) return !0;
        }
      }

      this.sameResultBox && (this.sameResultBox = f);
    },
    movePlaceholder: function movePlaceholder(a, b, c, e) {
      var d = this.lastAppendedItem;
      if (e || !d || d[0] !== b[0]) b[c](this.placeholder), this.lastAppendedItem = b, this.sameResultBox = e, this.options.afterMove(this.placeholder, a, b);
    },
    getContainerDimensions: function getContainerDimensions() {
      this.containerDimensions || w(this.containers, this.containerDimensions = [], this.options.tolerance, !this.$getOffsetParent());
      return this.containerDimensions;
    },
    getContainer: function getContainer(a) {
      return a.closest(this.options.containerSelector).data(m);
    },
    $getOffsetParent: function $getOffsetParent() {
      if (this.offsetParent === f) {
        var a = this.containers.length - 1,
            b = this.containers[a].getItemOffsetParent();
        if (!this.options.rootGroup) for (; a--;) {
          if (b[0] != this.containers[a].getItemOffsetParent()[0]) {
            b = !1;
            break;
          }
        }
        this.offsetParent = b;
      }

      return this.offsetParent;
    },
    setPointer: function setPointer(a) {
      a = this.getPointer(a);

      if (this.$getOffsetParent()) {
        var b = p(a, this.$getOffsetParent());
        this.lastRelativePointer = this.relativePointer;
        this.relativePointer = b;
      }

      this.lastPointer = this.pointer;
      this.pointer = a;
    },
    distanceMet: function distanceMet(a) {
      a = this.getPointer(a);
      return Math.max(Math.abs(this.pointer.left - a.left), Math.abs(this.pointer.top - a.top)) >= this.options.distance;
    },
    getPointer: function getPointer(a) {
      var b = a.originalEvent || a.originalEvent.touches && a.originalEvent.touches[0];
      return {
        left: a.pageX || b.pageX,
        top: a.pageY || b.pageY
      };
    },
    setupDelayTimer: function setupDelayTimer() {
      var a = this;
      this.delayMet = !this.options.delay;
      this.delayMet || (clearTimeout(this._mouseDelayTimer), this._mouseDelayTimer = setTimeout(function () {
        a.delayMet = !0;
      }, this.options.delay));
    },
    scroll: function scroll(a) {
      this.clearDimensions();
      this.clearOffsetParent();
    },
    toggleListeners: function toggleListeners(a) {
      var b = this;
      d.each(["drag", "drop", "scroll"], function (c, e) {
        b.$document[a](r[e], b[e + "Proxy"]);
      });
    },
    clearOffsetParent: function clearOffsetParent() {
      this.offsetParent = f;
    },
    clearDimensions: function clearDimensions() {
      this.traverse(function (a) {
        a._clearDimensions();
      });
    },
    traverse: function traverse(a) {
      a(this);

      for (var b = this.containers.length; b--;) {
        this.containers[b].traverse(a);
      }
    },
    _clearDimensions: function _clearDimensions() {
      this.containerDimensions = f;
    },
    _destroy: function _destroy() {
      s[this.options.group] = f;
    }
  };
  t.prototype = {
    dragInit: function dragInit(a) {
      var b = this.rootGroup;
      !this.disabled && !b.dragInitDone && this.options.drag && this.isValidDrag(a) && b.dragInit(a, this);
    },
    isValidDrag: function isValidDrag(a) {
      return 1 == a.which || "touchstart" == a.type && 1 == a.originalEvent.touches.length;
    },
    searchValidTarget: function searchValidTarget(a, b) {
      var c = x(this.getItemDimensions(), a, b),
          e = c.length,
          d = this.rootGroup,
          g = !d.options.isValidTarget || d.options.isValidTarget(d.item, this);
      if (!e && g) return d.movePlaceholder(this, this.target, "append"), !0;

      for (; e--;) {
        if (d = c[e][0], !c[e][1] && this.hasChildGroup(d)) {
          if (this.getContainerGroup(d).searchValidTarget(a, b)) return !0;
        } else if (g) return this.movePlaceholder(d, a), !0;
      }
    },
    movePlaceholder: function movePlaceholder(a, b) {
      var c = d(this.items[a]),
          e = this.itemDimensions[a],
          k = "after",
          g = c.outerWidth(),
          f = c.outerHeight(),
          h = c.offset(),
          h = {
        left: h.left,
        right: h.left + g,
        top: h.top,
        bottom: h.top + f
      };
      this.options.vertical ? b.top <= (e[2] + e[3]) / 2 ? (k = "before", h.bottom -= f / 2) : h.top += f / 2 : b.left <= (e[0] + e[1]) / 2 ? (k = "before", h.right -= g / 2) : h.left += g / 2;
      this.hasChildGroup(a) && (h = A);
      this.rootGroup.movePlaceholder(this, c, k, h);
    },
    getItemDimensions: function getItemDimensions() {
      this.itemDimensions || (this.items = this.$getChildren(this.el, "item").filter(":not(." + this.group.options.placeholderClass + ", ." + this.group.options.draggedClass + ")").get(), w(this.items, this.itemDimensions = [], this.options.tolerance));
      return this.itemDimensions;
    },
    getItemOffsetParent: function getItemOffsetParent() {
      var a = this.el;
      return "relative" === a.css("position") || "absolute" === a.css("position") || "fixed" === a.css("position") ? a : a.offsetParent();
    },
    hasChildGroup: function hasChildGroup(a) {
      return this.options.nested && this.getContainerGroup(a);
    },
    getContainerGroup: function getContainerGroup(a) {
      var b = d.data(this.items[a], "subContainers");

      if (b === f) {
        var c = this.$getChildren(this.items[a], "container"),
            b = !1;
        c[0] && (b = d.extend({}, this.options, {
          rootGroup: this.rootGroup,
          group: y++
        }), b = c[m](b).data(m).group);
        d.data(this.items[a], "subContainers", b);
      }

      return b;
    },
    $getChildren: function $getChildren(a, b) {
      var c = this.rootGroup.options,
          e = c[b + "Path"],
          c = c[b + "Selector"];
      a = d(a);
      e && (a = a.find(e));
      return a.children(c);
    },
    _serialize: function _serialize(a, b) {
      var c = this,
          e = this.$getChildren(a, b ? "item" : "container").not(this.options.exclude).map(function () {
        return c._serialize(d(this), !b);
      }).get();
      return this.rootGroup.options.serialize(a, e, b);
    },
    traverse: function traverse(a) {
      d.each(this.items || [], function (b) {
        (b = d.data(this, "subContainers")) && b.traverse(a);
      });
      a(this);
    },
    _clearDimensions: function _clearDimensions() {
      this.itemDimensions = f;
    },
    _destroy: function _destroy() {
      var a = this;
      this.target.off(r.start, this.handle);
      this.el.removeData(m);
      this.options.drop && (this.group.containers = d.grep(this.group.containers, function (b) {
        return b != a;
      }));
      d.each(this.items || [], function () {
        d.removeData(this, "subContainers");
      });
    }
  };
  var u = {
    enable: function enable() {
      this.traverse(function (a) {
        a.disabled = !1;
      });
    },
    disable: function disable() {
      this.traverse(function (a) {
        a.disabled = !0;
      });
    },
    serialize: function serialize() {
      return this._serialize(this.el, !0);
    },
    refresh: function refresh() {
      this.traverse(function (a) {
        a._clearDimensions();
      });
    },
    destroy: function destroy() {
      this.traverse(function (a) {
        a._destroy();
      });
    }
  };
  d.extend(t.prototype, u);

  d.fn[m] = function (a) {
    var b = Array.prototype.slice.call(arguments, 1);
    return this.map(function () {
      var c = d(this),
          e = c.data(m);
      if (e && u[a]) return u[a].apply(e, b) || this;
      e || a !== f && "object" !== _typeof(a) || c.data(m, new t(c, a));
      return this;
    });
  };
}(jQuery, window, "sortable");

/***/ }),

/***/ "./resources/assets/js/backend/menu/nested.js":
/*!****************************************************!*\
  !*** ./resources/assets/js/backend/menu/nested.js ***!
  \****************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/*!
 * Nestable jQuery Plugin - Copyright (c) 2012 David Bushell - http://dbushell.com/
 * Dual-licensed under the BSD or MIT licenses
 */
;

(function ($, window, document, undefined) {
  var hasTouch = 'ontouchstart' in document;
  /**
   * Detect CSS pointer-events property
   * events are normally disabled on the dragging element to avoid conflicts
   * https://github.com/ausi/Feature-detection-technique-for-pointer-events/blob/master/modernizr-pointerevents.js
   */

  var hasPointerEvents = function () {
    var el = document.createElement('div'),
        docEl = document.documentElement;

    if (!('pointerEvents' in el.style)) {
      return false;
    }

    el.style.pointerEvents = 'auto';
    el.style.pointerEvents = 'x';
    docEl.appendChild(el);
    var supports = window.getComputedStyle && window.getComputedStyle(el, '').pointerEvents === 'auto';
    docEl.removeChild(el);
    return !!supports;
  }();

  var defaults = {
    listNodeName: 'ol',
    itemNodeName: 'li',
    rootClass: 'dd',
    listClass: 'dd-list',
    itemClass: 'dd-item',
    dragClass: 'dd-dragel',
    handleClass: 'dd-handle',
    collapsedClass: 'dd-collapsed',
    placeClass: 'dd-placeholder',
    noDragClass: 'dd-nodrag',
    emptyClass: 'dd-empty',
    containerClass: null,
    expandBtnHTML: '<button data-action="expand" type="button">Expand</button>',
    collapseBtnHTML: '<button data-action="collapse" type="button">Collapse</button>',
    group: 0,
    maxDepth: 5,
    threshold: 20
  };

  function Plugin(element, options) {
    this.w = $(document);
    this.el = $(element);
    this.options = $.extend({}, defaults, options);
    this.init();
  }

  Plugin.prototype = {
    init: function init() {
      var list = this;
      list.reset();
      list.el.data('nestable-group', this.options.group);
      list.placeEl = $('<div class="' + list.options.placeClass + '"/>');
      $.each(this.el.find(list.options.itemNodeName), function (k, el) {
        list.setParent($(el));
      });
      list.el.on('click', 'button', function (e) {
        if (list.dragEl) {
          return;
        }

        var target = $(e.currentTarget),
            action = target.data('action'),
            item = target.parent(list.options.itemNodeName);

        if (action === 'collapse') {
          list.collapseItem(item);
        }

        if (action === 'expand') {
          list.expandItem(item);
        }
      });

      var onStartEvent = function onStartEvent(e) {
        var handle = $(e.target);

        if (!handle.hasClass(list.options.handleClass)) {
          if (handle.closest('.' + list.options.noDragClass).length) {
            return;
          }

          handle = handle.closest('.' + list.options.handleClass);
        }

        if (!handle.length || list.dragEl) {
          return;
        }

        list.isTouch = /^touch/.test(e.type);

        if (list.isTouch && e.touches.length !== 1) {
          return;
        }

        e.preventDefault();
        list.dragStart(e.touches ? e.touches[0] : e);
      };

      var onMoveEvent = function onMoveEvent(e) {
        if (list.dragEl) {
          e.preventDefault();
          list.dragMove(e.touches ? e.touches[0] : e);
        }
      };

      var onEndEvent = function onEndEvent(e) {
        if (list.dragEl) {
          e.preventDefault();
          list.dragStop(e.touches ? e.touches[0] : e);
        }
      };

      if (hasTouch) {
        list.el[0].addEventListener('touchstart', onStartEvent, false);
        window.addEventListener('touchmove', onMoveEvent, false);
        window.addEventListener('touchend', onEndEvent, false);
        window.addEventListener('touchcancel', onEndEvent, false);
      }

      list.el.on('mousedown', onStartEvent);
      list.w.on('mousemove', onMoveEvent);
      list.w.on('mouseup', onEndEvent);
    },
    serialize: function serialize() {
      var data,
          depth = 0,
          list = this;

      step = function (_step) {
        function step(_x, _x2) {
          return _step.apply(this, arguments);
        }

        step.toString = function () {
          return _step.toString();
        };

        return step;
      }(function (level, depth) {
        var array = [],
            items = level.children(list.options.itemNodeName);
        items.each(function () {
          var li = $(this),
              item = $.extend({}, li.data()),
              sub = li.children(list.options.listNodeName);

          if (sub.length) {
            item.children = step(sub, depth + 1);
          }

          array.push(item);
        });
        return array;
      });

      data = step(list.el.find(list.options.listNodeName).first(), depth);
      return data;
    },
    serialise: function serialise() {
      return this.serialize();
    },
    reset: function reset() {
      this.mouse = {
        offsetX: 0,
        offsetY: 0,
        startX: 0,
        startY: 0,
        lastX: 0,
        lastY: 0,
        nowX: 0,
        nowY: 0,
        distX: 0,
        distY: 0,
        dirAx: 0,
        dirX: 0,
        dirY: 0,
        lastDirX: 0,
        lastDirY: 0,
        distAxX: 0,
        distAxY: 0
      };
      this.isTouch = false;
      this.moving = false;
      this.dragEl = null;
      this.dragRootEl = null;
      this.dragDepth = 0;
      this.hasNewRoot = false;
      this.pointEl = null;
    },
    expandItem: function expandItem(li) {
      li.removeClass(this.options.collapsedClass);
      li.children('[data-action="expand"]').hide();
      li.children('[data-action="collapse"]').show();
      li.children(this.options.listNodeName).show();
    },
    collapseItem: function collapseItem(li) {
      var lists = li.children(this.options.listNodeName);

      if (lists.length) {
        li.addClass(this.options.collapsedClass);
        li.children('[data-action="collapse"]').hide();
        li.children('[data-action="expand"]').show();
        li.children(this.options.listNodeName).hide();
      }
    },
    expandAll: function expandAll() {
      var list = this;
      list.el.find(list.options.itemNodeName).each(function () {
        list.expandItem($(this));
      });
    },
    collapseAll: function collapseAll() {
      var list = this;
      list.el.find(list.options.itemNodeName).each(function () {
        list.collapseItem($(this));
      });
    },
    setParent: function setParent(li) {
      if (li.children(this.options.listNodeName).length) {
        li.prepend($(this.options.expandBtnHTML));
        li.prepend($(this.options.collapseBtnHTML));
      }

      li.children('[data-action="expand"]').hide();
    },
    unsetParent: function unsetParent(li) {
      li.removeClass(this.options.collapsedClass);
      li.children('[data-action]').remove();
      li.children(this.options.listNodeName).remove();
    },
    dragStart: function dragStart(e) {
      var mouse = this.mouse,
          target = $(e.target),
          dragItem = target.closest(this.options.itemNodeName);
      this.placeEl.css('height', dragItem.height());
      mouse.offsetX = e.offsetX !== undefined ? e.offsetX : e.pageX - target.offset().left;
      mouse.offsetY = e.offsetY !== undefined ? e.offsetY : e.pageY - target.offset().top;
      mouse.startX = mouse.lastX = e.pageX;
      mouse.startY = mouse.lastY = e.pageY;
      this.dragRootEl = this.el;
      this.dragEl = $(document.createElement(this.options.listNodeName)).addClass(this.options.listClass + ' ' + this.options.dragClass);
      this.dragEl.css('width', dragItem.width());
      dragItem.after(this.placeEl);
      dragItem[0].parentNode.removeChild(dragItem[0]);
      dragItem.appendTo(this.dragEl);
      $(document.body).append(this.dragEl);
      this.dragEl.css({
        'left': e.pageX - mouse.offsetX,
        'top': e.pageY - mouse.offsetY
      }); // total depth of dragging item

      var i,
          depth,
          items = this.dragEl.find(this.options.itemNodeName);

      for (i = 0; i < items.length; i++) {
        depth = $(items[i]).parents(this.options.listNodeName).length;

        if (depth > this.dragDepth) {
          this.dragDepth = depth;
        }
      }
    },
    dragStop: function dragStop(e) {
      var el = this.dragEl.children(this.options.itemNodeName).first();
      el[0].parentNode.removeChild(el[0]);
      this.placeEl.replaceWith(el);
      this.dragEl.remove();
      this.el.trigger('change');

      if (this.hasNewRoot) {
        this.dragRootEl.trigger('change');
      }

      this.reset();
    },
    dragMove: function dragMove(e) {
      var list,
          parent,
          prev,
          next,
          depth,
          opt = this.options,
          allow = true,
          mouse = this.mouse;
      this.dragEl.css({
        'left': e.pageX - mouse.offsetX,
        'top': e.pageY - mouse.offsetY
      }); // mouse position last events

      mouse.lastX = mouse.nowX;
      mouse.lastY = mouse.nowY; // mouse position this events

      mouse.nowX = e.pageX;
      mouse.nowY = e.pageY; // distance mouse moved between events

      mouse.distX = mouse.nowX - mouse.lastX;
      mouse.distY = mouse.nowY - mouse.lastY; // direction mouse was moving

      mouse.lastDirX = mouse.dirX;
      mouse.lastDirY = mouse.dirY; // direction mouse is now moving (on both axis)

      mouse.dirX = mouse.distX === 0 ? 0 : mouse.distX > 0 ? 1 : -1;
      mouse.dirY = mouse.distY === 0 ? 0 : mouse.distY > 0 ? 1 : -1; // axis mouse is now moving on

      var newAx = Math.abs(mouse.distX) > Math.abs(mouse.distY) ? 1 : 0; // do nothing on first move

      if (!mouse.moving) {
        mouse.dirAx = newAx;
        mouse.moving = true;
        return;
      } // calc distance moved on this axis (and direction)


      if (mouse.dirAx !== newAx) {
        mouse.distAxX = 0;
        mouse.distAxY = 0;
      } else {
        mouse.distAxX += Math.abs(mouse.distX);

        if (mouse.dirX !== 0 && mouse.dirX !== mouse.lastDirX) {
          mouse.distAxX = 0;
        }

        mouse.distAxY += Math.abs(mouse.distY);

        if (mouse.dirY !== 0 && mouse.dirY !== mouse.lastDirY) {
          mouse.distAxY = 0;
        }
      }

      mouse.dirAx = newAx;
      /**
       * move horizontal
       */

      if (mouse.dirAx && mouse.distAxX >= opt.threshold) {
        // reset move distance on x-axis for new phase
        mouse.distAxX = 0;
        prev = this.placeEl.prev(opt.itemNodeName); // increase horizontal level if previous sibling exists and is not collapsed

        if (mouse.distX > 0 && prev.length && !prev.hasClass(opt.collapsedClass)) {
          // cannot increase level when item above is collapsed
          list = prev.find(opt.listNodeName).last(); // check if depth limit has reached

          depth = this.placeEl.parents(opt.listNodeName).length;

          if (depth + this.dragDepth <= opt.maxDepth) {
            if (opt.containerClass != null && !prev.hasClass(opt.containerClass)) {
              allow = false;
            }

            if (allow) {
              // create new sub-level if one doesn't exist
              if (!list.length) {
                list = $('<' + opt.listNodeName + '/>').addClass(opt.listClass);
                list.append(this.placeEl);
                prev.append(list);
                this.setParent(prev);
              } else {
                // else append to next level up
                list = prev.children(opt.listNodeName).last();
                list.append(this.placeEl);
              }
            }
          }
        } // decrease horizontal level


        if (mouse.distX < 0) {
          // we can't decrease a level if an item preceeds the current one
          next = this.placeEl.next(opt.itemNodeName);

          if (!next.length) {
            parent = this.placeEl.parent();
            this.placeEl.closest(opt.itemNodeName).after(this.placeEl);

            if (!parent.children().length) {
              this.unsetParent(parent.parent());
            }
          }
        }
      }

      var isEmpty = false; // find list item under cursor

      if (!hasPointerEvents) {
        this.dragEl[0].style.visibility = 'hidden';
      }

      this.pointEl = $(document.elementFromPoint(e.pageX - document.body.scrollLeft, e.pageY - (window.pageYOffset || document.documentElement.scrollTop)));

      if (!hasPointerEvents) {
        this.dragEl[0].style.visibility = 'visible';
      }

      if (this.pointEl.hasClass(opt.handleClass)) {
        this.pointEl = this.pointEl.parent(opt.itemNodeName);
      }

      if (this.pointEl.hasClass(opt.emptyClass)) {
        isEmpty = true;
      } else if (!this.pointEl.length || !this.pointEl.hasClass(opt.itemClass)) {
        return;
      } // find parent list of item under cursor


      var pointElRoot = this.pointEl.closest('.' + opt.rootClass),
          isNewRoot = this.dragRootEl.data('nestable-id') !== pointElRoot.data('nestable-id');
      /**
       * move vertical
       */

      if (!mouse.dirAx || isNewRoot || isEmpty) {
        // check if groups match if dragging over new root
        if (isNewRoot && opt.group !== pointElRoot.data('nestable-group')) {
          return;
        } // check depth limit


        depth = this.dragDepth - 1 + this.pointEl.parents(opt.listNodeName).length;

        if (depth > opt.maxDepth) {
          return;
        }

        var before = e.pageY < this.pointEl.offset().top + this.pointEl.height() / 2;
        parent = this.placeEl.parent(); // if empty create new list to replace empty placeholder

        if (isEmpty) {
          list = $(document.createElement(opt.listNodeName)).addClass(opt.listClass);
          list.append(this.placeEl);
          this.pointEl.replaceWith(list);
        } else if (before) {
          this.pointEl.before(this.placeEl);
        } else {
          this.pointEl.after(this.placeEl);
        }

        if (!parent.children().length) {
          this.unsetParent(parent.parent());
        }

        if (!this.dragRootEl.find(opt.itemNodeName).length && !this.dragRootEl.find(opt.emptyClass).length) {
          this.dragRootEl.append('<div class="' + opt.emptyClass + '"/>');
        } // parent root list has changed


        if (isNewRoot) {
          this.dragRootEl = pointElRoot;
          this.hasNewRoot = this.el[0] !== this.dragRootEl[0];
        }
      }
    }
  };

  $.fn.nestable = function (params) {
    var lists = this,
        retval = this;
    lists.each(function () {
      var plugin = $(this).data("nestable");

      if (!plugin) {
        $(this).data("nestable", new Plugin(this, params));
        $(this).data("nestable-id", new Date().getTime());
      } else {
        if (typeof params === 'string' && typeof plugin[params] === 'function') {
          retval = plugin[params]();
        }
      }
    });
    return retval || lists;
  };
})(window.jQuery || window.Zepto, window, document);

/***/ }),

/***/ 6:
/*!*******************************************************!*\
  !*** multi ./resources/assets/js/backend/menu/app.js ***!
  \*******************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/janno/Documents/homestead/enzeducation/resources/assets/js/backend/menu/app.js */"./resources/assets/js/backend/menu/app.js");


/***/ })

/******/ });