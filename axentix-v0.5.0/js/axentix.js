"use strict";

function isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Date.prototype.toString.call(Reflect.construct(Date, [], function () {})); return true; } catch (e) { return false; } }

function _construct(Parent, args, Class) { if (isNativeReflectConstruct()) { _construct = Reflect.construct; } else { _construct = function _construct(Parent, args, Class) { var a = [null]; a.push.apply(a, args); var Constructor = Function.bind.apply(Parent, a); var instance = new Constructor(); if (Class) _setPrototypeOf(instance, Class.prototype); return instance; }; } return _construct.apply(null, arguments); }

function _typeof(obj) { if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _nonIterableSpread(); }

function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance"); }

function _iterableToArray(iter) { if (Symbol.iterator in Object(iter) || Object.prototype.toString.call(iter) === "[object Arguments]") return Array.from(iter); }

function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) { for (var i = 0, arr2 = new Array(arr.length); i < arr.length; i++) { arr2[i] = arr[i]; } return arr2; } }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } return _assertThisInitialized(self); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

/**
 * Class AxentixComponent
 * @class
 */
var AxentixComponent =
/*#__PURE__*/
function () {
  function AxentixComponent() {
    _classCallCheck(this, AxentixComponent);
  }

  _createClass(AxentixComponent, [{
    key: "sync",

    /**
     * Sync all listeners
     */
    value: function sync() {
      Axentix.createEvent(this.el, 'component.sync');

      this._removeListeners();

      this._setupListeners();
    }
    /**
     * Reset component
     */

  }, {
    key: "reset",
    value: function reset() {
      Axentix.createEvent(this.el, 'component.reset');

      this._removeListeners();

      this._setup();
    }
  }]);

  return AxentixComponent;
}();
/**
 * Class Caroulix
 * @class
 */


var Caroulix =
/*#__PURE__*/
function (_AxentixComponent) {
  _inherits(Caroulix, _AxentixComponent);

  /**
   * Construct Caroulix instance
   * @constructor
   * @param {String} element
   * @param {Object} options
   */
  function Caroulix(element, options) {
    var _this;

    _classCallCheck(this, Caroulix);

    _this = _possibleConstructorReturn(this, _getPrototypeOf(Caroulix).call(this));
    _this.defaultOptions = {
      fixedHeight: true,
      height: '',
      animationDelay: 500,
      animationType: 'slide',
      indicators: {
        enabled: false,
        isFlat: false,
        customClasses: ''
      },
      autoplay: {
        enabled: true,
        interval: 5000,
        side: 'right'
      }
    };
    _this.el = document.querySelector(element);
    _this.options = Axentix.extend(_this.defaultOptions, options);

    _this._setup();

    return _this;
  }

  _createClass(Caroulix, [{
    key: "_setup",
    value: function _setup() {
      Axentix.createEvent(this.el, 'caroulix.setup');
      var animationList = ['slide'];
      animationList.includes(this.options.animationType) ? '' : this.options.animationType = 'slide';
      var autoplaySides = ['right', 'left'];
      autoplaySides.includes(this.options.autoplay.side) ? '' : this.options.autoplay.side = 'right';
      this.currentItemIndex = 0;
      this.isAnimated = false;

      this._getChildrens();

      this.options.indicators.enabled ? this._enableIndicators() : '';

      this._getActiveElementIndex();

      this._setupListeners();

      this.el.classList.add('anim-' + this.options.animationType);
    }
    /**
     * Setup listeners
     */

  }, {
    key: "_setupListeners",
    value: function _setupListeners() {
      this.windowResizeRef = this._setMaxHeight.bind(this);
      window.addEventListener('resize', this.windowResizeRef);

      if (this.arrowPrev && this.arrowNext) {
        this.arrowPrevRef = this.prev.bind(this, 1);
        this.arrowNextRef = this.next.bind(this, 1);
        this.arrowPrev.addEventListener('click', this.arrowPrevRef);
        this.arrowNext.addEventListener('click', this.arrowNextRef);
      }
    }
    /**
     * Remove listeners
     */

  }, {
    key: "_removeListeners",
    value: function _removeListeners() {
      window.removeEventListener('resize', this.windowResizeRef);
      this.windowResizeRef = undefined;

      if (this.arrowPrev && this.arrowNext) {
        this.arrowPrev.removeEventListener('click', this.arrowPrevRef);
        this.arrowNext.removeEventListener('click', this.arrowNextRef);
        this.arrowPrevRef = undefined;
        this.arrowNextRef = undefined;
      }
    }
    /**
     * Get caroulix childrens
     */

  }, {
    key: "_getChildrens",
    value: function _getChildrens() {
      var _this2 = this;

      this.childrens = Array.from(this.el.children).reduce(function (acc, child) {
        child.classList.contains('caroulix-item') ? acc.push(child) : '';
        child.classList.contains('caroulix-prev') ? _this2.arrowPrev = child : '';
        child.classList.contains('caroulix-next') ? _this2.arrowNext = child : '';
        return acc;
      }, []);
    }
  }, {
    key: "_getActiveElementIndex",
    value: function _getActiveElementIndex() {
      var _this3 = this;

      this.childrens.map(function (child, i) {
        if (child.classList.contains('active')) {
          _this3.currentItemIndex = i;
        }
      });
      var item = this.childrens[this.currentItemIndex];
      item.classList.contains('active') ? '' : item.classList.add('active');
      this.options.indicators.enabled ? this.indicators.children[this.currentItemIndex].classList.add('active') : '';

      this._waitUntilLoad(item);
    }
  }, {
    key: "_waitUntilLoad",
    value: function _waitUntilLoad(item) {
      var _this4 = this;

      var isImage = false;

      if (this.options.fixedHeight) {
        this.totalLoadChild = 0;
        this.totalLoadedChild = 0;
        this.childrens.map(function (child) {
          var waitItem = child.querySelector('img') || child.querySelector('video');

          if (waitItem) {
            isImage = true;
            _this4.totalLoadChild++;

            if (waitItem.complete) {
              _this4._initWhenLoaded(waitItem, true);
            } else {
              waitItem.loadRef = _this4._initWhenLoaded.bind(_this4, waitItem);
              waitItem.addEventListener('load', waitItem.loadRef);
            }
          }
        });
      } else {
        var childItem = item.querySelector('img') || item.querySelector('video');

        if (childItem) {
          isImage = true;
          childItem.loadRef = this._initWhenLoaded.bind(this, childItem);
          childItem.addEventListener('load', childItem.loadRef);
        }
      }

      if (!isImage) {
        this.updateHeight();
        this.options.autoplay.enabled ? this.play() : '';
      }
    }
    /**
     * Update height & remove listener when active element is loaded
     * @param {Element} item
     * @param {Boolean} alreadyLoad
     */

  }, {
    key: "_initWhenLoaded",
    value: function _initWhenLoaded(item, alreadyLoad) {
      if (this.options.fixedHeight) {
        if (!alreadyLoad) {
          item.removeEventListener('load', item.loadRef);
          item.loadRef = undefined;
        }

        this.totalLoadedChild++;

        if (this.totalLoadedChild === this.totalLoadChild) {
          this.updateHeight('', true);
          this.totalLoadedChild = undefined;
          this.totalLoadChild = undefined;
          this.options.autoplay.enabled ? this.play() : '';
        }
      } else {
        this.updateHeight('', true);
        item.removeEventListener('load', item.loadRef);
        item.loadRef = undefined;
        this.options.autoplay.enabled ? this.play() : '';
      }
    }
  }, {
    key: "_setMaxHeight",
    value: function _setMaxHeight() {
      if (this.options.height) {
        this.el.style.height = this.options.height;
        return;
      }

      var childrensHeight = this.childrens.map(function (child) {
        return child.offsetHeight;
      });
      this.maxHeight = Math.max.apply(Math, _toConsumableArray(childrensHeight));
      this.el.style.height = this.maxHeight + 'px';
    }
    /**
     * Dynamic height option
     * @param {string} side
     */

  }, {
    key: "_setDynamicHeight",
    value: function _setDynamicHeight(side, init) {
      var index;
      init ? index = this.currentItemIndex : side === 'right' ? index = this._getNextItemIndex(1) : index = this._getPreviousItemIndex(1);
      var height = this.childrens[index].offsetHeight;
      this.el.style.height = height + 'px';
    }
    /**
     * Enable indicators
     */

  }, {
    key: "_enableIndicators",
    value: function _enableIndicators() {
      this.indicators = document.createElement('ul');
      this.indicators.classList.add('caroulix-indicators');
      this.options.indicators.isFlat ? this.indicators.classList.add('caroulix-flat') : '';
      this.options.indicators.customClasses ? this.indicators.className = this.indicators.className + ' ' + this.options.indicators.customClasses : '';

      for (var i = 0; i < this.childrens.length; i++) {
        var li = document.createElement('li');
        li.triggerRef = this._handleIndicatorClick.bind(this, i);
        li.addEventListener('click', li.triggerRef);
        this.indicators.appendChild(li);
      }

      this.el.appendChild(this.indicators);
    }
    /***** Animation Section *****/

    /**
     * Slide animation
     * @param {number} number
     * @param {string} side
     */

  }, {
    key: "_animationSlide",
    value: function _animationSlide(number, side) {
      var _this5 = this;

      var nextItem = this.childrens[number];
      var currentItem = this.childrens[this.currentItemIndex];
      var nextItemPercentage = '',
          currentItemPercentage = '';

      if (side === 'right') {
        nextItemPercentage = '100%';
        currentItemPercentage = '-100%';
      } else {
        nextItemPercentage = '-100%';
        currentItemPercentage = '100%';
      }

      nextItem.style.transform = "translateX(".concat(nextItemPercentage, ")");
      nextItem.classList.add('active');
      setTimeout(function () {
        nextItem.style.transitionDuration = _this5.options.animationDelay + 'ms';
        nextItem.style.transform = '';
        currentItem.style.transitionDuration = _this5.options.animationDelay + 'ms';
        currentItem.style.transform = "translateX(".concat(currentItemPercentage, ")");
      }, 50);
      setTimeout(function () {
        nextItem.removeAttribute('style');
        currentItem.classList.remove('active');
        currentItem.removeAttribute('style');
        _this5.currentItemIndex = number;
        _this5.isAnimated = false;
        _this5.options.autoplay.enabled ? _this5.play() : '';
      }, this.options.animationDelay + 50);
    }
    /***** [END] Animation Section [END] *****/

    /**
     * Handle indicator click
     * @param {number} i
     * @param {Event} e
     */

  }, {
    key: "_handleIndicatorClick",
    value: function _handleIndicatorClick(i, e) {
      e.preventDefault();

      if (i === this.currentItemIndex) {
        return;
      }

      this.goTo(i);
    }
  }, {
    key: "_getPreviousItemIndex",
    value: function _getPreviousItemIndex(step) {
      var previousItemIndex = 0;
      var index = this.currentItemIndex;

      for (var i = 0; i < step; i++) {
        if (index > 0) {
          previousItemIndex = index - 1;
          index--;
        } else {
          index = this.childrens.length - 1;
          previousItemIndex = index;
        }
      }

      return previousItemIndex;
    }
  }, {
    key: "_getNextItemIndex",
    value: function _getNextItemIndex(step) {
      var nextItemIndex = 0;
      var index = this.currentItemIndex;

      for (var i = 0; i < step; i++) {
        if (index < this.childrens.length - 1) {
          nextItemIndex = index + 1;
          index++;
        } else {
          index = 0;
          nextItemIndex = index;
        }
      }

      return nextItemIndex;
    }
    /**
     * Update height of caroulix container
     */

  }, {
    key: "updateHeight",
    value: function updateHeight(side, init) {
      if (this.options.fixedHeight) {
        this._setMaxHeight();

        return;
      }

      this._setDynamicHeight(side, init);
    }
    /**
     * Go to {n} item
     * @param {number} number
     * @param {string} side
     */

  }, {
    key: "goTo",
    value: function goTo(number, side) {
      if (this.isAnimated || number === this.currentItemIndex) {
        return;
      }

      side ? '' : number > this.currentItemIndex ? side = 'right' : side = 'left';
      this.options.autoplay.enabled && this.autoTimeout ? this.stop() : '';
      Axentix.createEvent(this.el, 'caroulix.slide', {
        side: side,
        nextElement: this.childrens[number],
        currentElement: this.childrens[this.currentItemIndex]
      });
      this.isAnimated = true;
      var animFunction = '_animation' + this.options.animationType.charAt(0).toUpperCase() + this.options.animationType.substring(1);

      if (this.options.indicators.enabled) {
        Array.from(this.indicators.children).map(function (li) {
          li.removeAttribute('class');
        });
        this.indicators.children[number].classList.add('active');
      }

      this.options.fixedHeight ? '' : this.updateHeight(side);
      this[animFunction](number, side);
    }
  }, {
    key: "prev",
    value: function prev() {
      var step = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 1;

      if (this.isAnimated) {
        return;
      }

      Axentix.createEvent(this.el, 'caroulix.prev', {
        step: step
      });

      var previousItemIndex = this._getPreviousItemIndex(step);

      this.goTo(previousItemIndex, 'left');
    }
  }, {
    key: "next",
    value: function next() {
      var step = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 1;

      if (this.isAnimated) {
        return;
      }

      Axentix.createEvent(this.el, 'caroulix.next', {
        step: step
      });

      var nextItemIndex = this._getNextItemIndex(step);

      this.goTo(nextItemIndex, 'right');
    }
  }, {
    key: "play",
    value: function play() {
      var _this6 = this;

      this.autoTimeout = setTimeout(function () {
        _this6.options.autoplay.side === 'right' ? _this6.next() : _this6.prev();
      }, this.options.autoplay.interval);
    }
  }, {
    key: "stop",
    value: function stop() {
      clearTimeout(this.autoTimeout);
      this.autoTimeout = false;
    }
  }]);

  return Caroulix;
}(AxentixComponent);
/**
 * Class Collapsible
 * @class
 */


var Collapsible =
/*#__PURE__*/
function (_AxentixComponent2) {
  _inherits(Collapsible, _AxentixComponent2);

  /**
   * Construct Collapsible instance
   * @constructor
   * @param {String} element
   * @param {Object} options
   */
  function Collapsible(element, options) {
    var _this7;

    _classCallCheck(this, Collapsible);

    _this7 = _possibleConstructorReturn(this, _getPrototypeOf(Collapsible).call(this));
    _this7.defaultOptions = {
      animationDelay: 300,
      sidenav: {
        activeClass: true,
        activeWhenOpen: true,
        autoCloseOtherCollapsible: true
      }
    };
    _this7.el = document.querySelector(element);
    _this7.options = Axentix.extend(_this7.defaultOptions, options);

    _this7._setup();

    return _this7;
  }
  /**
   * Setup component
   */


  _createClass(Collapsible, [{
    key: "_setup",
    value: function _setup() {
      Axentix.createEvent(this.el, 'collapsible.setup');
      this.el.Collapsible = this;
      this.collapsibleTriggers = document.querySelectorAll('.collapsible-trigger');
      this.isInitialStart = true;
      this.isActive = this.el.classList.contains('active') ? true : false;
      this.isAnimated = false;
      this.isInSidenav = false;
      this.childIsActive = false;

      this._setupListeners();

      this.el.style.transitionDuration = this.options.animationDelay + 'ms';

      this._detectSidenav();

      this._detectChild();

      this.options.sidenav.activeClass ? this._addActiveInSidenav() : '';
      this.isActive ? this.open() : '';
      this.isInitialStart = false;
    }
    /**
     * Setup listeners
     */

  }, {
    key: "_setupListeners",
    value: function _setupListeners() {
      var _this8 = this;

      this.listenerRef = this._onClickTrigger.bind(this);
      this.collapsibleTriggers.forEach(function (trigger) {
        if (trigger.dataset.target === _this8.el.id) {
          trigger.addEventListener('click', _this8.listenerRef);
        }
      });
    }
    /**
     * Remove listeners
     */

  }, {
    key: "_removeListeners",
    value: function _removeListeners() {
      var _this9 = this;

      this.collapsibleTriggers.forEach(function (trigger) {
        if (trigger.dataset.target === _this9.el.id) {
          trigger.removeEventListener('click', _this9.listenerRef);
        }
      });
      this.listenerRef = undefined;
    }
    /**
     * Check if collapsible is in sidenav
     */

  }, {
    key: "_detectSidenav",
    value: function _detectSidenav() {
      var sidenavElem = this.el.closest('.sidenav');

      if (sidenavElem) {
        this.isInSidenav = true;
        this.sidenavId = sidenavElem.id;
      }

      this.sidenavCollapsibles = document.querySelectorAll('#' + this.sidenavId + ' .collapsible');
    }
    /**
     * Check if collapsible have active childs
     */

  }, {
    key: "_detectChild",
    value: function _detectChild() {
      var _iteratorNormalCompletion = true;
      var _didIteratorError = false;
      var _iteratorError = undefined;

      try {
        for (var _iterator = this.el.children[Symbol.iterator](), _step; !(_iteratorNormalCompletion = (_step = _iterator.next()).done); _iteratorNormalCompletion = true) {
          var child = _step.value;

          if (child.classList.contains('active')) {
            this.childIsActive = true;
            break;
          }
        }
      } catch (err) {
        _didIteratorError = true;
        _iteratorError = err;
      } finally {
        try {
          if (!_iteratorNormalCompletion && _iterator.return != null) {
            _iterator.return();
          }
        } finally {
          if (_didIteratorError) {
            throw _iteratorError;
          }
        }
      }
    }
    /**
     * Add active class to trigger and collapsible
     */

  }, {
    key: "_addActiveInSidenav",
    value: function _addActiveInSidenav() {
      var _this10 = this;

      if (this.childIsActive && this.isInSidenav) {
        var triggers = document.querySelectorAll('.sidenav .collapsible-trigger');
        triggers.forEach(function (trigger) {
          if (trigger.dataset.target === _this10.el.id) {
            trigger.classList.add('active');
          }
        });
        this.el.classList.add('active');
        this.open();
        this.isActive = true;
      }
    }
    /**
     * Enable / disable active state to trigger when collapsible is in sidenav
     * @param {boolean} state enable or disable
     */

  }, {
    key: "_addActiveToTrigger",
    value: function _addActiveToTrigger(state) {
      var _this11 = this;

      var triggers = document.querySelectorAll('.sidenav .collapsible-trigger');
      triggers.forEach(function (trigger) {
        if (trigger.dataset.target === _this11.el.id) {
          state ? trigger.classList.add('active') : trigger.classList.remove('active');
        }
      });
    }
    /**
     * Auto close others collapsible
     */

  }, {
    key: "_autoCloseOtherCollapsible",
    value: function _autoCloseOtherCollapsible() {
      var _this12 = this;

      if (!this.isInitialStart && this.isInSidenav) {
        this.sidenavCollapsibles.forEach(function (collapsible) {
          if (collapsible.id !== _this12.el.id) {
            collapsible.Collapsible.close();
          }
        });
      }
    }
    /**
     * Apply overflow hidden and automatically remove
     */

  }, {
    key: "_applyOverflow",
    value: function _applyOverflow() {
      var _this13 = this;

      this.el.style.overflow = 'hidden';
      setTimeout(function () {
        _this13.el.style.overflow = '';
      }, this.options.animationDelay);
    }
    /**
     * Handle click on trigger
     * @param {Event} e
     */

  }, {
    key: "_onClickTrigger",
    value: function _onClickTrigger(e) {
      e.preventDefault();

      if (this.isAnimated) {
        return;
      }

      this.isActive ? this.close() : this.open();
    }
    /**
     * Open collapsible
     */

  }, {
    key: "open",
    value: function open() {
      var _this14 = this;

      if (this.isActive) {
        return;
      }

      Axentix.createEvent(this.el, 'collapsible.open');
      this.isActive = true;
      this.isAnimated = true;
      this.el.style.display = 'block';

      this._applyOverflow();

      this.el.style.maxHeight = this.el.scrollHeight + 'px';
      this.options.sidenav.activeWhenOpen ? this._addActiveToTrigger(true) : '';
      this.options.sidenav.autoCloseOtherCollapsible ? this._autoCloseOtherCollapsible() : '';
      setTimeout(function () {
        _this14.isAnimated = false;
      }, this.options.animationDelay);
    }
    /**
     * Close collapsible
     */

  }, {
    key: "close",
    value: function close() {
      var _this15 = this;

      if (!this.isActive) {
        return;
      }

      Axentix.createEvent(this.el, 'collapsible.close');
      this.isAnimated = true;
      this.el.style.maxHeight = '';

      this._applyOverflow();

      this.options.sidenav.activeWhenOpen ? this._addActiveToTrigger(false) : '';
      setTimeout(function () {
        _this15.el.style.display = '';
        _this15.isAnimated = false;
        _this15.isActive = false;
      }, this.options.animationDelay);
    }
  }]);

  return Collapsible;
}(AxentixComponent);
/**
 * Class Axentix
 * @class
 */


var Axentix =
/*#__PURE__*/
function () {
  /**
   * Construct Axentix instance
   * @constructor
   * @param {String} component
   * @param {Object} options
   */
  function Axentix(component, options) {
    _classCallCheck(this, Axentix);

    this.component = component[0].toUpperCase() + component.slice(1);
    this.isAll = component === 'all' ? true : false;
    this.options = this.isAll ? {} : options;
    this.instances = [];

    this._init();
  }
  /**
   * Init components
   */


  _createClass(Axentix, [{
    key: "_init",
    value: function _init() {
      var _this16 = this;

      var componentList = {
        Collapsible: document.querySelectorAll('.collapsible:not(.no-axentix-init)'),
        Sidenav: document.querySelectorAll('.sidenav:not(.no-axentix-init)'),
        Modal: document.querySelectorAll('.modal:not(.no-axentix-init)'),
        Dropdown: document.querySelectorAll('.dropdown:not(.no-axentix-init)'),
        Tab: document.querySelectorAll('.tab:not(.no-axentix-init)'),
        Fab: document.querySelectorAll('.fab:not(.no-axentix-init)'),
        Caroulix: document.querySelectorAll('.caroulix:not(.no-axentix-init)')
      };
      var isInList = componentList.hasOwnProperty(this.component);

      if (isInList) {
        var ids = this._detectIds(componentList[this.component]);

        this._instanciate(ids, this.component);
      } else if (this.isAll) {
        Object.keys(componentList).map(function (component) {
          var ids = _this16._detectIds(componentList[component]);

          ids.length > 0 ? _this16._instanciate(ids, component) : '';
        });
      }
    }
    /**
     * Detects all ids
     * @param {NodeListOf<Element>} component
     * @return {Array<String>}
     */

  }, {
    key: "_detectIds",
    value: function _detectIds(component) {
      var idList = [];
      component.forEach(function (el) {
        idList.push('#' + el.id);
      });
      return idList;
    }
    /**
     * Instanciate components
     * @param {Array<String>} ids
     * @param {String} component
     */

  }, {
    key: "_instanciate",
    value: function _instanciate(ids, component) {
      var _this17 = this;

      ids.map(function (id) {
        var constructor = window[component];
        var args = [id, _this17.options];

        try {
          _this17.instances.push(_construct(constructor, args));
        } catch (error) {
          console.error('Axentix : Unable to load ' + component);
        }
      });
    }
    /**
     * Get instance of element
     * @param {String} element Id of element
     */

  }, {
    key: "getInstance",
    value: function getInstance(element) {
      return this.instances.filter(function (instance) {
        return '#' + instance.el.id === element;
      })[0];
    }
    /**
     * Get all instances
     */

  }, {
    key: "getAllInstances",
    value: function getAllInstances() {
      return this.instances;
    }
    /**
     * Sync instance of element
     * @param {String} element Id of element
     */

  }, {
    key: "sync",
    value: function sync(element) {
      this.getInstance(element).sync();
    }
    /**
     * Sync all instances
     */

  }, {
    key: "syncAll",
    value: function syncAll() {
      this.instances.map(function (instance) {
        return instance.sync();
      });
    }
    /**
     * Reset instance of element
     * @param {String} element Id of element
     */

  }, {
    key: "reset",
    value: function reset(element) {
      this.getInstance(element).reset();
    }
    /**
     * Reset all instances
     */

  }, {
    key: "resetAll",
    value: function resetAll() {
      this.instances.map(function (instance) {
        return instance.reset();
      });
    }
  }]);

  return Axentix;
}();
/**
 * Class Dropdown
 * @class
 */


var Dropdown =
/*#__PURE__*/
function (_AxentixComponent3) {
  _inherits(Dropdown, _AxentixComponent3);

  /**
   * Construct Dropdown instance
   * @constructor
   * @param {String} element
   * @param {Object} options
   */
  function Dropdown(element, options) {
    var _this18;

    _classCallCheck(this, Dropdown);

    _this18 = _possibleConstructorReturn(this, _getPrototypeOf(Dropdown).call(this));
    _this18.defaultOptions = {
      animationDelay: 300,
      animationType: 'none',
      hover: false
    };
    _this18.el = document.querySelector(element);
    _this18.options = Axentix.extend(_this18.defaultOptions, options);

    _this18._setup();

    return _this18;
  }
  /**
   * Setup component
   */


  _createClass(Dropdown, [{
    key: "_setup",
    value: function _setup() {
      Axentix.createEvent(this.el, 'dropdown.setup');
      this.dropdownContent = document.querySelector('#' + this.el.id + ' .dropdown-content');
      this.dropdownTrigger = document.querySelector('#' + this.el.id + ' .dropdown-trigger');
      this.isAnimated = false;
      this.isActive = this.el.classList.contains('active') ? true : false;

      if (this.options.hover) {
        this.el.classList.add('active-hover');
      } else {
        this._setupListeners();
      }

      this._setupAnimation();
    }
    /**
     * Setup listeners
     */

  }, {
    key: "_setupListeners",
    value: function _setupListeners() {
      if (this.options.hover) {
        return;
      }

      this.listenerRef = this._onClickTrigger.bind(this);
      this.dropdownTrigger.addEventListener('click', this.listenerRef);
      this.documentClickRef = this._onDocumentClick.bind(this);
      document.addEventListener('click', this.documentClickRef, true);
    }
    /**
     * Remove listeners
     */

  }, {
    key: "_removeListeners",
    value: function _removeListeners() {
      if (this.options.hover) {
        return;
      }

      this.dropdownTrigger.removeEventListener('click', this.listenerRef);
      this.listenerRef = undefined;
      document.removeEventListener('click', this.documentClickRef, true);
      this.documentClickRef = undefined;
    }
    /**
     * Check and init animation
     */

  }, {
    key: "_setupAnimation",
    value: function _setupAnimation() {
      var animationList = ['none', 'fade'];
      this.options.animationType = this.options.animationType.toLowerCase();
      animationList.includes(this.options.animationType) ? '' : this.options.animationType = 'none';

      if (this.options.animationType !== 'none' && !this.options.hover) {
        if (this.options.hover) {
          this.el.style.animationDuration = this.options.animationDelay + 'ms';
        } else {
          this.el.style.transitionDuration = this.options.animationDelay + 'ms';
        }

        this.el.classList.add('anim-' + this.options.animationType);
      }
    }
    /**
     * Handle click on document click
     */

  }, {
    key: "_onDocumentClick",
    value: function _onDocumentClick(e) {
      if (e.target.matches('.dropdown-trigger')) {
        return;
      }

      if (this.isAnimated || !this.isActive) {
        return;
      }

      this.close();
    }
    /**
     * Handle click on trigger
     */

  }, {
    key: "_onClickTrigger",
    value: function _onClickTrigger(e) {
      e.preventDefault();

      if (this.isAnimated) {
        return;
      }

      this.isActive ? this.close() : this.open();
    }
    /**
     * Open dropdown
     */

  }, {
    key: "open",
    value: function open() {
      var _this19 = this;

      if (this.isActive) {
        return;
      }

      Axentix.createEvent(this.el, 'dropdown.open');
      this.dropdownContent.style.display = 'flex';
      setTimeout(function () {
        _this19.el.classList.add('active');

        _this19.isActive = true;
      }, 10);

      if (this.options.animationType !== 'none') {
        this.isAnimated = true;
        setTimeout(function () {
          _this19.isAnimated = false;
          Axentix.createEvent(_this19.el, 'dropdown.opened');
        }, this.options.animationDelay);
      } else {
        Axentix.createEvent(this.el, 'dropdown.opened');
      }
    }
    /**
     * Close dropdown
     */

  }, {
    key: "close",
    value: function close() {
      var _this20 = this;

      if (!this.isActive) {
        return;
      }

      Axentix.createEvent(this.el, 'dropdown.close');
      this.el.classList.remove('active');

      if (this.options.animationType !== 'none') {
        this.isAnimated = true;
        setTimeout(function () {
          _this20.dropdownContent.style.display = '';
          _this20.isAnimated = false;
          _this20.isActive = false;
          Axentix.createEvent(_this20.el, 'dropdown.closed');
        }, this.options.animationDelay);
      } else {
        this.dropdownContent.style.display = '';
        this.isAnimated = false;
        this.isActive = false;
        Axentix.createEvent(this.el, 'dropdown.closed');
      }
    }
  }]);

  return Dropdown;
}(AxentixComponent);
/**
 * Class Fab
 * @class
 */


var Fab =
/*#__PURE__*/
function (_AxentixComponent4) {
  _inherits(Fab, _AxentixComponent4);

  /**
   * Construct Fab instance
   * @constructor
   * @param {String} element
   * @param {Object} options
   */
  function Fab(element, options) {
    var _this21;

    _classCallCheck(this, Fab);

    _this21 = _possibleConstructorReturn(this, _getPrototypeOf(Fab).call(this));
    _this21.defaultOptions = {
      animationDelay: 300,
      hover: true,
      direction: 'top',
      position: 'bottom-right',
      offsetX: '1rem',
      offsetY: '1.5rem'
    };
    _this21.el = document.querySelector(element);
    _this21.options = Axentix.extend(_this21.defaultOptions, options);

    _this21._setup();

    return _this21;
  }
  /**
   * Setup component
   */


  _createClass(Fab, [{
    key: "_setup",
    value: function _setup() {
      Axentix.createEvent(this.el, 'fab.setup');
      this.isAnimated = false;
      this.isActive = false;
      this.trigger = document.querySelector('#' + this.el.id + ' .fab-trigger');
      this.fabMenu = document.querySelector('#' + this.el.id + ' .fab-menu');

      this._verifOptions();

      this.options.hover ? this.el.classList.add('fab-hover') : this._setupListeners();
      this.el.style.transitionDuration = this.options.animationDelay + 'ms';

      this._setProperties();
    }
    /**
     * Options check
     */

  }, {
    key: "_verifOptions",
    value: function _verifOptions() {
      var directionList = ['right', 'left', 'top', 'bottom'];
      directionList.includes(this.options.direction) ? '' : this.options.direction = 'top';
      var positionList = ['top-right', 'top-left', 'bottom-right', 'bottom-left'];
      positionList.includes(this.options.position) ? '' : this.options.position = 'bottom-right';
    }
    /**
     * Setup listeners
     */

  }, {
    key: "_setupListeners",
    value: function _setupListeners() {
      this.listenerRef = this._onClickTrigger.bind(this);
      this.trigger.addEventListener('click', this.listenerRef);
      this.documentClickRef = this._handleDocumentClick.bind(this);
      document.addEventListener('click', this.documentClickRef, true);
    }
    /**
     * Remove listeners
     */

  }, {
    key: "_removeListeners",
    value: function _removeListeners() {
      this.trigger.removeEventListener('click', this.listenerRef);
      this.listenerRef = undefined;
      document.removeEventListener('click', this.documentClickRef, true);
      this.documentClickRef = undefined;
    }
    /**
     * Set different options on element
     */

  }, {
    key: "_setProperties",
    value: function _setProperties() {
      this.options.position.split('-')[0] === 'top' ? this.el.style.top = this.options.offsetY : this.el.style.bottom = this.options.offsetY;
      this.options.position.split('-')[1] === 'right' ? this.el.style.right = this.options.offsetX : this.el.style.left = this.options.offsetX;
      this.options.direction === 'top' || this.options.direction === 'bottom' ? '' : this.el.classList.add('fab-dir-x');

      this._setMenuPosition();
    }
    /**
     * Set menu position
     */

  }, {
    key: "_setMenuPosition",
    value: function _setMenuPosition() {
      if (this.options.direction === 'top' || this.options.direction === 'bottom') {
        var height = this.trigger.clientHeight;
        this.options.direction === 'top' ? this.fabMenu.style.bottom = height + 'px' : this.fabMenu.style.top = height + 'px';
      } else {
        var width = this.trigger.clientWidth;
        this.options.direction === 'right' ? this.fabMenu.style.left = width + 'px' : this.fabMenu.style.right = width + 'px';
      }
    }
    /**
     * Handle document click event
     * @param {Event} e
     */

  }, {
    key: "_handleDocumentClick",
    value: function _handleDocumentClick(e) {
      var isInside = this.el.contains(e.target);
      !isInside && this.isActive ? this.close() : '';
    }
    /**
     * Handle click on trigger
     * @param {Event} e
     */

  }, {
    key: "_onClickTrigger",
    value: function _onClickTrigger(e) {
      e.preventDefault();

      if (this.isAnimated) {
        return;
      }

      this.isActive ? this.close() : this.open();
    }
    /**
     * Open fab
     */

  }, {
    key: "open",
    value: function open() {
      var _this22 = this;

      if (this.isActive) {
        return;
      }

      Axentix.createEvent(this.el, 'fab.open');
      this.isAnimated = true;
      this.isActive = true;
      this.el.classList.add('active');
      setTimeout(function () {
        _this22.isAnimated = false;
      }, this.options.animationDelay);
    }
    /**
     * Close fab
     */

  }, {
    key: "close",
    value: function close() {
      var _this23 = this;

      if (!this.isActive) {
        return;
      }

      Axentix.createEvent(this.el, 'fab.close');
      this.isAnimated = true;
      this.isActive = false;
      this.el.classList.remove('active');
      setTimeout(function () {
        _this23.isAnimated = false;
      }, this.options.animationDelay);
    }
  }]);

  return Fab;
}(AxentixComponent);

Axentix.inputElements = document.querySelectorAll('.form-material .form-field:not(.form-default) .form-control');
/**
 * Detect attribute & state of all inputs
 * @param {NodeListOf<Element>} inputElements
 */

Axentix.detectAllInputs = function (inputElements) {
  inputElements ? '' : inputElements = Axentix.inputElements;
  inputElements.forEach(function (input) {
    Axentix.detectInput(input);
  });
};
/**
 * Detect attribute & state of an input
 * @param {Element} input
 */


Axentix.detectInput = function (input) {
  Axentix.createEvent(input, 'form.input');
  var isActive = input.parentElement.classList.contains('active');
  var hasContent = input.value.length > 0 || input.placeholder.length > 0 || input.matches('[type="date"]') || input.matches('[type="month"]') || input.matches('[type="week"]') || input.matches('[type="time"]');
  var isFocused = document.activeElement === input;
  var isDisabled = input.hasAttribute('disabled') || input.hasAttribute('readonly');

  if (input.firstInit) {
    Axentix.updateInput(input, isActive, hasContent, isFocused);
    input.firstInit = false;
  } else {
    isDisabled ? '' : Axentix.updateInput(input, isActive, hasContent, isFocused);
  }
};
/**
 * Update input field
 * @param {Element} input
 * @param {boolean} isActive
 * @param {boolean} hasContent
 * @param {boolean} isFocused
 */


Axentix.updateInput = function (input, isActive, hasContent, isFocused) {
  var isTextArea = input.type === 'textarea';

  if (!isActive && (hasContent || isFocused)) {
    isTextArea ? '' : Axentix.setFormPosition(input);
    input.parentElement.classList.add('active');
  } else if (isActive && !(hasContent || isFocused)) {
    input.parentElement.classList.remove('active');
  }

  isFocused && !isTextArea ? input.parentElement.classList.add('is-focused') : input.parentElement.classList.remove('is-focused');
  isFocused && isTextArea ? input.parentElement.classList.add('is-txtarea-focused') : input.parentElement.classList.remove('is-txtarea-focused');
};
/**
 * Add bottom position variable to form
 * @param {Element} input
 */


Axentix.setFormPosition = function (input) {
  var style = window.getComputedStyle(input.parentElement);
  var height = parseFloat(input.clientHeight),
      padding = parseFloat(style.paddingTop),
      border = parseFloat(style.borderTopWidth);
  var pos = padding + border + height + 'px';
  input.parentElement.style.setProperty('--form-material-position', pos);
};
/**
 * Handle listeners
 * @param {Event} e
 * @param {NodeListOf<Element>} inputElements
 */


Axentix.handleListeners = function (e, inputElements) {
  inputElements.forEach(function (input) {
    input === e.target ? Axentix.detectInput(input) : '';
  });
};
/**
 * Handle form reset event
 * @param {Event} e
 */


Axentix.handleResetEvent = function (e) {
  if (e.target.tagName === 'FORM' && e.target.classList.contains('form-material')) {
    setTimeout(function () {
      Axentix.detectAllInputs();
    }, 10);
  }
};
/**
 * Setup forms fields listeners
 * @param {NodeListOf<Element>} inputElements
 */


Axentix.setupFormsListeners = function (inputElements) {
  inputElements ? '' : inputElements = Axentix.inputElements;
  inputElements.forEach(function (input) {
    input.addEventListener('input', Axentix.detectInput(input));
    input.firstInit = true;
  });
  document.addEventListener('focus', function (e) {
    return Axentix.handleListeners(e, inputElements);
  }, true);
  document.addEventListener('blur', function (e) {
    return Axentix.handleListeners(e, inputElements);
  }, true);
  window.addEventListener('pageshow', function () {
    setTimeout(function () {
      Axentix.detectAllInputs();
    }, 10);
  });
  document.addEventListener('reset', Axentix.handleResetEvent);
}; // Init


document.addEventListener('DOMContentLoaded', function () {
  if (Axentix.inputElements.length > 0) {
    Axentix.setupFormsListeners();
    Axentix.detectAllInputs();
  }
});
/**
 * Class Modal
 * @class
 */

var Modal =
/*#__PURE__*/
function (_AxentixComponent5) {
  _inherits(Modal, _AxentixComponent5);

  /**
   * Construct Modal instance
   * @constructor
   * @param {String} element
   * @param {Object} options
   */
  function Modal(element, options) {
    var _this24;

    _classCallCheck(this, Modal);

    _this24 = _possibleConstructorReturn(this, _getPrototypeOf(Modal).call(this));
    _this24.defaultOptions = {
      overlay: true,
      bodyScrolling: false,
      animationDelay: 400
    };
    _this24.el = document.querySelector(element);
    _this24.options = Axentix.extend(_this24.defaultOptions, options);

    _this24._setup();

    return _this24;
  }
  /**
   * Setup component
   */


  _createClass(Modal, [{
    key: "_setup",
    value: function _setup() {
      Axentix.createEvent(this.el, 'modal.setup');
      this.modalTriggers = document.querySelectorAll('.modal-trigger');
      this.isActive = this.el.classList.contains('active') ? true : false;
      this.isAnimated = false;

      this._setupListeners();

      this.options.overlay ? this._createOverlay() : '';
      this.el.style.transitionDuration = this.options.animationDelay + 'ms';
    }
    /**
     * Setup listeners
     */

  }, {
    key: "_setupListeners",
    value: function _setupListeners() {
      var _this25 = this;

      this.listenerRef = this._onClickTrigger.bind(this);
      this.modalTriggers.forEach(function (trigger) {
        if (trigger.dataset.target === _this25.el.id) {
          trigger.addEventListener('click', _this25.listenerRef);
        }
      });
    }
    /**
     * Remove listeners
     */

  }, {
    key: "_removeListeners",
    value: function _removeListeners() {
      var _this26 = this;

      this.modalTriggers.forEach(function (trigger) {
        if (trigger.dataset.target === _this26.el.id) {
          trigger.removeEventListener('click', _this26.listenerRef);
        }
      });
      this.listenerRef = undefined;
    }
    /**
     * Create overlay element
     */

  }, {
    key: "_createOverlay",
    value: function _createOverlay() {
      if (this.isActive && this.options.overlay) {
        this.overlayElement = document.querySelector('.modal-overlay[data-target="' + this.el.id + '"]');
        this.overlayElement ? '' : this.overlayElement = document.createElement('div');
      } else {
        this.overlayElement = document.createElement('div');
      }

      this.overlayElement.classList.add('modal-overlay');
      this.overlayElement.style.transitionDuration = this.options.animationDelay + 'ms';
      this.overlayElement.dataset.target = this.el.id;
    }
    /**
     * Enable or disable body scroll when option is true
     * @param {boolean} state Enable or disable body scroll
     */

  }, {
    key: "_toggleBodyScroll",
    value: function _toggleBodyScroll(state) {
      if (!this.options.bodyScrolling) {
        state ? document.body.style.overflow = '' : document.body.style.overflow = 'hidden';
      }
    }
    /**
     * Set Z-Index when modal is open
     */

  }, {
    key: "_setZIndex",
    value: function _setZIndex() {
      var totalModals = document.querySelectorAll('.modal.active').length + 1;
      this.options.overlay ? this.overlayElement.style.zIndex = 800 + totalModals * 6 : '';
      this.el.style.zIndex = 800 + totalModals * 10;
    }
    /**
     * Handle click on trigger
     */

  }, {
    key: "_onClickTrigger",
    value: function _onClickTrigger(e) {
      e.preventDefault();

      if (this.isAnimated) {
        return;
      }

      this.isActive ? this.close() : this.open();
    }
    /**
     * Open the modal
     */

  }, {
    key: "open",
    value: function open() {
      var _this27 = this;

      if (this.isActive) {
        return;
      }

      Axentix.createEvent(this.el, 'modal.open');
      this.isActive = true;
      this.isAnimated = true;

      this._setZIndex();

      this.el.style.display = 'block';
      this.overlay(true);

      this._toggleBodyScroll(false);

      setTimeout(function () {
        _this27.el.classList.add('active');
      }, 50);
      setTimeout(function () {
        _this27.isAnimated = false;
        Axentix.createEvent(_this27.el, 'modal.opened');
      }, this.options.animationDelay);
    }
    /**
     * Close the modal
     */

  }, {
    key: "close",
    value: function close() {
      var _this28 = this;

      if (!this.isActive) {
        return;
      }

      Axentix.createEvent(this.el, 'modal.close');
      this.isAnimated = true;
      this.el.classList.remove('active');
      this.overlay(false);
      setTimeout(function () {
        _this28.el.style.display = '';
        _this28.isAnimated = false;
        _this28.isActive = false;

        _this28._toggleBodyScroll(true);

        Axentix.createEvent(_this28.el, 'modal.closed');
      }, this.options.animationDelay);
    }
    /**
     * Manage overlay
     * @param {boolean} state
     */

  }, {
    key: "overlay",
    value: function overlay(state) {
      var _this29 = this;

      if (this.options.overlay) {
        if (state) {
          this.overlayElement.addEventListener('click', this.listenerRef);
          document.body.appendChild(this.overlayElement);
          setTimeout(function () {
            _this29.overlayElement.classList.add('active');
          }, 50);
        } else {
          this.overlayElement.classList.remove('active');
          setTimeout(function () {
            _this29.overlayElement.removeEventListener('click', _this29.listenerRef);

            document.body.removeChild(_this29.overlayElement);
          }, this.options.animationDelay);
        }
      }
    }
  }]);

  return Modal;
}(AxentixComponent);
/**
 * Class Sidenav
 * @class
 */


var Sidenav =
/*#__PURE__*/
function (_AxentixComponent6) {
  _inherits(Sidenav, _AxentixComponent6);

  /**
   * Construct Sidenav instance
   * @constructor
   * @param {String} element
   * @param {Object} options
   */
  function Sidenav(element, options) {
    var _this30;

    _classCallCheck(this, Sidenav);

    _this30 = _possibleConstructorReturn(this, _getPrototypeOf(Sidenav).call(this));
    _this30.defaultOptions = {
      overlay: true,
      bodyScrolling: false,
      animationDelay: 300
    };
    _this30.el = document.querySelector(element);
    _this30.options = Axentix.extend(_this30.defaultOptions, options);

    _this30._setup();

    return _this30;
  }
  /**
   * Setup component
   */


  _createClass(Sidenav, [{
    key: "_setup",
    value: function _setup() {
      Axentix.createEvent(this.el, 'sidenav.setup');
      this.sidenavTriggers = document.querySelectorAll('.sidenav-trigger');
      this.isActive = false;
      this.isFixed = this.el.classList.contains('fixed');
      this.isLarge = this.el.classList.contains('large');

      this._setupListeners();

      this.options.overlay ? this._createOverlay() : '';
      this.el.classList.contains('large') ? document.body.classList.add('sidenav-large') : document.body.classList.remove('sidenav-large');

      this._handleRightSidenav();

      this.el.style.transitionDuration = this.options.animationDelay + 'ms';
    }
    /**
     * Setup listeners
     */

  }, {
    key: "_setupListeners",
    value: function _setupListeners() {
      var _this31 = this;

      this.listenerRef = this._onClickTrigger.bind(this);
      this.sidenavTriggers.forEach(function (trigger) {
        if (trigger.dataset.target === _this31.el.id) {
          trigger.addEventListener('click', _this31.listenerRef);
        }
      });
      this.windowResizeRef = this.close.bind(this);
      window.addEventListener('resize', this.windowResizeRef);
    }
    /**
     * Remove listeners
     */

  }, {
    key: "_removeListeners",
    value: function _removeListeners() {
      var _this32 = this;

      this.sidenavTriggers.forEach(function (trigger) {
        if (trigger.dataset.target === _this32.el.id) {
          trigger.removeEventListener('click', _this32.listenerRef);
        }
      });
      this.listenerRef = undefined;
      window.removeEventListener('resize', this.windowResizeRef);
      this.windowResizeRef = undefined;
    }
    /**
     * Handle right sidenav detection
     */

  }, {
    key: "_handleRightSidenav",
    value: function _handleRightSidenav() {
      var sidenavs = document.querySelectorAll('.sidenav');
      var found = Array.from(sidenavs).some(function (sidenav) {
        return sidenav.classList.contains('right-aligned');
      });

      if (found && !document.body.classList.contains('sidenav-right')) {
        document.body.classList.add('sidenav-right');
      } else if (!found && document.body.classList.contains('sidenav-right')) {
        document.body.classList.remove('sidenav-right');
      }
    }
    /**
     * Create overlay element
     */

  }, {
    key: "_createOverlay",
    value: function _createOverlay() {
      this.overlayElement = document.createElement('div');
      this.overlayElement.classList.add('sidenav-overlay');
      this.overlayElement.dataset.target = this.el.id;
    }
    /**
     * Enable or disable body scroll when option is true
     * @param {boolean} state
     */

  }, {
    key: "_toggleBodyScroll",
    value: function _toggleBodyScroll(state) {
      if (!this.options.bodyScrolling) {
        state ? document.body.style.overflow = '' : document.body.style.overflow = 'hidden';
      }
    }
    /**
     * Handle click on trigger
     * @param {Event} e
     */

  }, {
    key: "_onClickTrigger",
    value: function _onClickTrigger(e) {
      e.preventDefault();

      if (this.isFixed && window.innerWidth >= 960) {
        return;
      }

      this.isActive ? this.close() : this.open();
    }
    /**
     * Open sidenav
     */

  }, {
    key: "open",
    value: function open() {
      var _this33 = this;

      if (this.isActive) {
        return;
      }

      Axentix.createEvent(this.el, 'sidenav.open');
      this.isActive = true;
      this.el.classList.add('active');
      this.overlay(true);

      this._toggleBodyScroll(false);

      setTimeout(function () {
        Axentix.createEvent(_this33.el, 'sidenav.opened');
      }, this.options.animationDelay);
    }
    /**
     * Close sidenav
     */

  }, {
    key: "close",
    value: function close() {
      var _this34 = this;

      if (!this.isActive) {
        return;
      }

      Axentix.createEvent(this.el, 'sidenav.close');
      this.el.classList.remove('active');
      this.overlay(false);
      setTimeout(function () {
        _this34._toggleBodyScroll(true);

        _this34.isActive = false;
        Axentix.createEvent(_this34.el, 'sidenav.closed');
      }, this.options.animationDelay);
    }
    /**
     * Manage overlay
     * @param {boolean} state
     */

  }, {
    key: "overlay",
    value: function overlay(state) {
      if (this.options.overlay) {
        if (state) {
          this.overlayElement.addEventListener('click', this.listenerRef);
          document.body.appendChild(this.overlayElement);
        } else {
          this.overlayElement.removeEventListener('click', this.listenerRef);
          document.body.removeChild(this.overlayElement);
        }
      }
    }
  }]);

  return Sidenav;
}(AxentixComponent);
/**
 * Class Tab
 * @class
 */


var Tab =
/*#__PURE__*/
function (_AxentixComponent7) {
  _inherits(Tab, _AxentixComponent7);

  /**
   * Construct Tab instance
   * @constructor
   * @param {String} element
   * @param {Object} options
   */
  function Tab(element, options) {
    var _this35;

    _classCallCheck(this, Tab);

    _this35 = _possibleConstructorReturn(this, _getPrototypeOf(Tab).call(this));
    _this35.defaultAnimDelay = 300;
    _this35.defaultOptions = {
      animationDelay: _this35.defaultAnimDelay,
      animationType: 'none',
      caroulix: {
        animationDelay: _this35.defaultAnimDelay
      }
    };
    _this35.el = document.querySelector(element);
    _this35.elQuery = element;
    _this35.options = Axentix.extend(_this35.defaultOptions, options);

    _this35._setup();

    return _this35;
  }
  /**
   * Setup component
   */


  _createClass(Tab, [{
    key: "_setup",
    value: function _setup() {
      Axentix.createEvent(this.el, 'tab.setup');
      var animationList = ['none', 'slide'];
      animationList.includes(this.options.animationType) ? '' : this.options.animationType = 'none';
      this.isAnimated = false;
      this.tabArrow = document.querySelector(this.elQuery + ' .tab-arrow');
      this.tabLinks = document.querySelectorAll(this.elQuery + ' .tab-menu .tab-link');
      this.tabMenu = document.querySelector(this.elQuery + ' .tab-menu');

      this._getItems();

      if (this.tabArrow) {
        this._toggleArrowMode();

        this.leftArrow = document.querySelector(this.elQuery + ' .tab-arrow .tab-prev');
        this.rightArrow = document.querySelector(this.elQuery + ' .tab-arrow .tab-next');
      }

      this._setupListeners();

      this.el.style.transitionDuration = this.options.animationDelay + 'ms';
      this.options.animationType === 'slide' ? this._enableSlideAnimation() : this.updateActiveElement();
    }
    /**
     * Setup listeners
     */

  }, {
    key: "_setupListeners",
    value: function _setupListeners() {
      var _this36 = this;

      this.tabLinks.forEach(function (item) {
        item.listenerRef = _this36._onClickItem.bind(_this36, item);
        item.addEventListener('click', item.listenerRef);
      });
      this.resizeTabListener = this.updateActiveElement.bind(this);
      window.addEventListener('resize', this.resizeTabListener);

      if (this.tabArrow) {
        this.arrowListener = this._toggleArrowMode.bind(this);
        window.addEventListener('resize', this.arrowListener);
        this.scrollLeftListener = this._scrollLeft.bind(this);
        this.scrollRightLstener = this._scrollRight.bind(this);
        this.leftArrow.addEventListener('click', this.scrollLeftListener);
        this.rightArrow.addEventListener('click', this.scrollRightLstener);
      }
    }
    /**
     * Remove listeners
     */

  }, {
    key: "_removeListeners",
    value: function _removeListeners() {
      this.tabLinks.forEach(function (item) {
        item.removeEventListener('click', item.listenerRef);
        item.listenerRef = undefined;
      });
      window.removeEventListener('resize', this.resizeTabListener);
      this.resizeTabListener = undefined;

      if (this.tabArrow) {
        window.removeEventListener('resize', this.arrowListener);
        this.arrowListener = undefined;
        this.leftArrow.removeEventListener('click', this.scrollLeftListener);
        this.rightArrow.removeEventListener('click', this.scrollRightLstener);
        this.scrollLeftListener = undefined;
        this.scrollRightLstener = undefined;
      }
    }
    /**
     * Get all items
     */

  }, {
    key: "_getItems",
    value: function _getItems() {
      this.tabItems = Array.from(this.el.children).reduce(function (acc, child) {
        !child.classList.contains('tab-menu') && !child.classList.contains('tab-arrow') ? acc.push(child) : '';
        return acc;
      }, []);
    }
    /**
     * Hide all tab items
     */

  }, {
    key: "_hideContent",
    value: function _hideContent() {
      this.tabItems.map(function (item) {
        return item.style.display = 'none';
      });
    }
    /**
     * Init slide animation
     */

  }, {
    key: "_enableSlideAnimation",
    value: function _enableSlideAnimation() {
      this.tabItems.map(function (item) {
        return item.classList.add('caroulix-item');
      });
      this.tabCaroulix = Axentix.wrap(this.tabItems);
      this.tabCaroulix.classList.add('caroulix');
      var nb = Math.random().toString().split('.')[1];
      this.tabCaroulix.id = 'tab-caroulix-' + nb;
      this.tabCaroulixInit = true;
      this.options.animationDelay !== this.defaultAnimDelay ? this.options.caroulix.animationDelay = this.options.animationDelay : '';
      this.updateActiveElement();
    }
    /**
     * Set active bar position
     * @param {Element} element
     */

  }, {
    key: "_setActiveElement",
    value: function _setActiveElement(element) {
      this.tabLinks.forEach(function (item) {
        return item.classList.remove('active');
      });
      var width = element.clientWidth;
      var elementPosLeft = element.getBoundingClientRect().left;
      var menuPosLeft = this.tabMenu.getBoundingClientRect().left;
      var left = elementPosLeft - menuPosLeft + this.tabMenu.scrollLeft;
      this.tabMenu.style.setProperty('--tab-bar-left-offset', left + 'px');
      this.tabMenu.style.setProperty('--tab-bar-width', width + 'px');
      element.classList.add('active');
    }
    /**
     * Toggle arrow mode
     */

  }, {
    key: "_toggleArrowMode",
    value: function _toggleArrowMode() {
      var totalWidth = Array.from(this.tabLinks).reduce(function (acc, element) {
        acc += element.clientWidth;
        return acc;
      }, 0);
      var arrowWidth = this.tabArrow.clientWidth;

      if (totalWidth > arrowWidth) {
        this.tabArrow.classList.contains('tab-arrow-show') ? '' : this.tabArrow.classList.add('tab-arrow-show');
      } else {
        this.tabArrow.classList.contains('tab-arrow-show') ? this.tabArrow.classList.remove('tab-arrow-show') : '';
      }

      this.updateActiveElement();
    }
    /**
     * Scroll left
     * @param {Event} e
     */

  }, {
    key: "_scrollLeft",
    value: function _scrollLeft(e) {
      e.preventDefault();
      this.tabMenu.scrollLeft -= 40;
    }
    /**
     * Scroll right
     * @param {Event} e
     */

  }, {
    key: "_scrollRight",
    value: function _scrollRight(e) {
      e.preventDefault();
      this.tabMenu.scrollLeft += 40;
    }
    /**
     * Handle click on menu item
     * @param {Element} item
     * @param {Event} e
     */

  }, {
    key: "_onClickItem",
    value: function _onClickItem(item, e) {
      e.preventDefault();

      if (this.isAnimated || item.classList.contains('active')) {
        return;
      }

      var target = item.children[0].getAttribute('href');
      this.select(target.split('#')[1]);
    }
    /**
     * Select tab
     * @param {String} itemId
     */

  }, {
    key: "select",
    value: function select(itemId) {
      var _this37 = this;

      if (this.isAnimated) {
        return;
      }

      this.isAnimated = true;
      var menuItem = document.querySelector(this.elQuery + ' .tab-menu a[href="#' + itemId + '"]');
      Axentix.createEvent(menuItem, 'tab.select');

      this._setActiveElement(menuItem.parentElement);

      if (this.tabCaroulixInit) {
        this.tabItems.map(function (item) {
          return item.id === itemId ? item.classList.add('active') : '';
        });
        this.caroulixInstance = new Caroulix('#' + this.tabCaroulix.id, this.options.caroulix);
        this.tabCaroulixInit = false;
        this.isAnimated = false;
        return;
      }

      if (this.options.animationType === 'slide') {
        var nb = this.tabItems.findIndex(function (item) {
          return item.id === itemId;
        });
        this.caroulixInstance.goTo(nb);
        setTimeout(function () {
          _this37.isAnimated = false;
        }, this.options.animationDelay);
      } else {
        this._hideContent();

        this.tabItems.map(function (item) {
          return item.id === itemId ? item.style.display = 'block' : '';
        });
        this.isAnimated = false;
      }
    }
    /**
     * Detect active element & update component
     */

  }, {
    key: "updateActiveElement",
    value: function updateActiveElement() {
      var itemSelected;
      this.tabLinks.forEach(function (item) {
        item.classList.contains('active') ? itemSelected = item : '';
      });
      itemSelected ? '' : itemSelected = this.tabLinks.item(0);
      var target = itemSelected.children[0].getAttribute('href');
      this.select(target.split('#')[1]);
    }
  }]);

  return Tab;
}(AxentixComponent);
/**
 * Class Toast
 * @class
 */


var Toast =
/*#__PURE__*/
function () {
  /**
   * Construct Toast instance
   * @constructor
   * @param {String} content
   * @param {Object} options
   */
  function Toast(content, options) {
    _classCallCheck(this, Toast);

    this.defaultOptions = {
      animationDelay: 400,
      duration: 4000,
      classes: '',
      position: 'right',
      direction: 'top',
      mobileDirection: 'bottom',
      isClosable: false
    };

    if (Axentix.toastInstanceExist) {
      console.error("Don't try to create multiple toast instances");
      return;
    } else {
      Axentix.toastInstanceExist = true;
    }

    this.content = content;
    this.options = Axentix.extend(this.defaultOptions, options);
    this.options.position = this.options.position.toLowerCase();
    this.options.direction = this.options.direction.toLowerCase();
    this.options.mobileDirection = this.options.mobileDirection.toLowerCase();
    this.toasters = {};
  }
  /**
   * Create toast container
   */


  _createClass(Toast, [{
    key: "_createToaster",
    value: function _createToaster() {
      var toaster = document.createElement('div');
      var positionList = ['right', 'left'];
      positionList.includes(this.options.position) ? '' : this.options.position = 'right';
      var directionList = ['bottom', 'top'];
      directionList.includes(this.options.direction) ? '' : this.options.direction = 'top';
      directionList.includes(this.options.mobileDirection) ? '' : this.options.mobileDirection = 'bottom';
      toaster.className = 'toaster toaster-' + this.options.position + ' toast-' + this.options.direction + ' toaster-mobile-' + this.options.mobileDirection;
      this.toasters[this.options.position] = toaster;
      document.body.appendChild(toaster);
    }
    /**
     * Remove toast container
     */

  }, {
    key: "_removeToaster",
    value: function _removeToaster() {
      for (var key in this.toasters) {
        var toaster = this.toasters[key];

        if (toaster.childElementCount <= 0) {
          toaster.remove();
          delete this.toasters[key];
        }
      }
    }
    /**
     * Toast in animation
     * @param {Element} toast
     */

  }, {
    key: "_fadeInToast",
    value: function _fadeInToast(toast) {
      var _this38 = this;

      setTimeout(function () {
        Axentix.createEvent(toast, 'toast.show');
        toast.classList.add('toast-animated');
        setTimeout(function () {
          Axentix.createEvent(toast, 'toast.shown');
        }, _this38.options.animationDelay);
      }, 50);
    }
    /**
     * Toast out animation
     * @param {Element} toast
     */

  }, {
    key: "_fadeOutToast",
    value: function _fadeOutToast(toast) {
      var _this39 = this;

      setTimeout(function () {
        Axentix.createEvent(toast, 'toast.hide');

        _this39._hide(toast);
      }, this.options.duration + this.options.animationDelay);
    }
    /**
     * Anim out toast
     * @param {Element} toast
     */

  }, {
    key: "_animOut",
    value: function _animOut(toast) {
      toast.style.transitionTimingFunction = 'cubic-bezier(0.445, 0.05, 0.55, 0.95)';
      toast.style.paddingTop = 0;
      toast.style.paddingBottom = 0;
      toast.style.margin = 0;
      toast.style.height = 0;
    }
    /**
     * Create toast
     */

  }, {
    key: "_createToast",
    value: function _createToast() {
      var toast = document.createElement('div');
      toast.className = 'toast shadow-1 ' + this.options.classes;
      toast.innerHTML = this.content;
      toast.style.transitionDuration = this.options.animationDelay + 'ms';

      if (this.options.isClosable) {
        var trigger = document.createElement('i');
        trigger.className = 'toast-trigger fas fa-times';
        trigger.listenerRef = this._hide.bind(this, toast, trigger);
        trigger.addEventListener('click', trigger.listenerRef);
        toast.appendChild(trigger);
      }

      this._fadeInToast(toast);

      this.toasters[this.options.position].appendChild(toast);

      this._fadeOutToast(toast);

      var height = toast.clientHeight;
      toast.style.height = height + 'px';
    }
    /**
     * Hide toast
     * @param {String} toast
     * @param {Element} trigger
     * @param {Event} e
     */

  }, {
    key: "_hide",
    value: function _hide(toast, trigger, e) {
      var _this40 = this;

      if (toast.isAnimated) {
        return;
      }

      var timer = 1;

      if (e) {
        e.preventDefault();
        timer = 0;
        this.options.isClosable ? trigger.removeEventListener('click', trigger.listenerRef) : '';
      }

      toast.style.opacity = 0;
      toast.isAnimated = true;
      var delay = timer * this.options.animationDelay + this.options.animationDelay;
      setTimeout(function () {
        _this40._animOut(toast);
      }, delay / 2);
      setTimeout(function () {
        toast.remove();
        Axentix.createEvent(toast, 'toast.remove');

        _this40._removeToaster();
      }, delay * 1.45);
    }
    /**
     * Showing the toast
     */

  }, {
    key: "show",
    value: function show() {
      if (!Object.keys(this.toasters).includes(this.options.position)) {
        this._createToaster();
      }

      this._createToast();
    }
    /**
     * Change
     * @param {String} content
     * @param {Object} options
     */

  }, {
    key: "change",
    value: function change(content, options) {
      this.content = content;
      this.options = Axentix.extend(this.options, options);
    }
  }]);

  return Toast;
}(); // By https://gomakethings.com/vanilla-javascript-version-of-jquery-extend/ | MIT License


Axentix.extend = function () {
  var extended = {};
  var deep = false;
  var i = 0;
  var length = arguments.length;

  if (Object.prototype.toString.call(arguments[0]) === '[object Boolean]') {
    deep = arguments[0];
    i++;
  }

  var merge = function merge(obj) {
    for (var prop in obj) {
      if (Object.prototype.hasOwnProperty.call(obj, prop)) {
        if (deep && Object.prototype.toString.call(obj[prop]) === '[object Object]') {
          extended[prop] = extend(true, extended[prop], obj[prop]);
        } else {
          extended[prop] = obj[prop];
        }
      }
    }
  };

  for (; i < length; i++) {
    var obj = arguments[i];
    merge(obj);
  }

  return extended;
};
/**
 * Wrap content inside an element (<div> by default)
 * @param {Array<Element>} target
 * @param {Element} wrapper
 * @return {Element}
 */


Axentix.wrap = function (target) {
  var wrapper = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : document.createElement('div');
  var parent = target[0].parentElement;
  target.forEach(function (elem) {
    return wrapper.appendChild(elem);
  });
  parent.appendChild(wrapper);
  return wrapper;
};
/**
 * Create custom event
 * @param {Element} element
 * @param {string} eventName
 * @param {Object} extraData
 */


Axentix.createEvent = function (element, eventName, extraData) {
  var event = new CustomEvent('ax.' + eventName, {
    detail: extraData || {},
    bubbles: true
  });
  element.dispatchEvent(event);
};