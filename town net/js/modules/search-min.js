"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }(); //


var _jquery = require("jquery");

var _jquery2 = _interopRequireDefault(_jquery);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var Search = function () {

  // 1. describer and initiate our object
  function Search() {
    _classCallCheck(this, Search);

    this.openButton = (0, _jquery2.default)(".js-search-trigger");
    this.closeButton = (0, _jquery2.default)(".search-overlay__close");
    this.searchOverlay = (0, _jquery2.default)(".search-overlay");
    this.events();
  }

  // 2. events


  _createClass(Search, [{
    key: "events",
    value: function events() {
      this.openButton.on("click", this.openOverlay.bind(this));
      this.closeButton.on("click", this.closeOverlay.bind(this));
    }

    // 3. methods

  }, {
    key: "openOverlay",
    value: function openOverlay() {
      this.searchOverlay.addClass("search-overlay--active");
    }
  }, {
    key: "closeOverlay",
    value: function closeOverlay() {
      this.searchOverlay.removeClass("search-overlay--active");
    }
  }]);

  return Search;
}();

exports.default = Search;
