import $ from 'jquery';

class ScrollNavHide {

  constructor() {
    this.navClass = 'main-header';
    this.navString = `.${this.navClass}`;
    this.navTarget = $(this.navString);
    this.isHidden = 'isHidden';
    this.isActive = 'isActive';
    this.timer = '';
  }

  init(){

    var _this = this;

    // Initial state
    let scrollPos = 0;
    // adding scroll event
    window.addEventListener('scroll', () => {
      // detects new state and compares it with the new one
      if ((document.body.getBoundingClientRect()).top > scrollPos){
        this.navTarget.removeClass(this.isHidden);
        if($(document).scrollTop() < 150){
          this.navTarget.removeClass(this.isActive);
        }
    	}else{
        if($(document).scrollTop() > 150){
          this.navTarget.addClass(this.isHidden);
          this.navTarget.addClass(this.isActive);
        }
      }
    	// saves the new position for iteration.
    	scrollPos = (document.body.getBoundingClientRect()).top;
    });

  };

}
export { ScrollNavHide as default };
