class Search {

  // 1. describer and initiate our Search object
  constructor() {
    this.openButton = $(".js-search-trigger");
    this.closeButton = $(".search-overlay__close");
    this.searchOverlay = $(".search-overlay");
    this.events();
  }

  // 2. events
  events() {
    this.openButton.on("click", this.openOverlay.bind(this)); // open overlay event.
    this.closeButton.on("click", this.closeOverlay.bind(this)); // close overlay event
  }

  // 3. methods
  openOverlay() { // open the Overlay function
    this.searchOverlay.addClass("search-overlay--active"); // adds the active overalay class
  }

  closeOverlay() {
    this.searchOverlay.removeClass("search-overlay--active"); // removes the overlay class
  }
}

export default Search; // make the Search object available to other
