
import $ from 'jquery';

class Search {

  // 1. describer and initiate our Search object
  constructor() {
    this.openButton = $(".js-search-trigger");
    this.closeButton = $(".search-overlay__close");
    this.searchOverlay = $(".search-overlay");
    this.searchField = $("search-term");
    this.events();
    this.isOverlayOpen = false;
    this.typingTimer;
  }

  // 2. events
  events() {
    this.openButton.on("click", this.openOverlay.bind(this)); // open overlay event.
    this.closeButton.on("click", this.closeOverlay.bind(this)); // close overlay event
    $(document).on("keydown", this.keyPressDispatcher.bind(this));
    this.searchField.on("keydown", this.typingLogic.bind(this));
  }

  // 3. methods
  typingLogic () {
    clearTimeout(this.typingTimer);
    this.typingTimer = setTimeOut(function() {console.log("Timeout test");}, 2000);
  }


  keyPressDispatcher(e) {
    if(e.keyCode == 83 && !this.isOverlayOpen) {
    this.openOverlay();
    }

    if (e.keyCode == 27 && this.isOverlayOpen) {
      this.closeOverlay();
    }
  }

  openOverlay() { // open the Overlay function
    this.searchOverlay.addClass("search-overlay--active"); // adds the active overalay class
    $("body").addClass("body-no-scroll");
    this.isOverlayOpen = true;
  }

  closeOverlay() {
    this.searchOverlay.removeClass("search-overlay--active"); // removes the overlay class
    $("body").removeClass("body-no-scroll");
    this.isOverlayOpen = false;
  }
}

export default Search; // make the Search object available to other
