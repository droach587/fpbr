import $ from 'jquery';

class MobileToggle {

  constructor() {
    this.toggleClass = 'js-mobile-toggle';
    this.toggleString = `.${this.toggleClass}`;
    this.toggle = $(this.toggleString);
    this.activeClass = 'isActive';
  }

  init(){

    var _this = this;

    this.toggle.on('click', (_this, e) => {
      let dataTarget = $(_this.currentTarget).attr('data-target');
      $(_this.currentTarget).toggleClass(this.activeClass);
      $(dataTarget).toggleClass(this.activeClass);
      if(e !== undefined){
        e.preventDefault();
      }
    });

  };

}
export { MobileToggle as default };
