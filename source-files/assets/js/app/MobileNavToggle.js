import $ from 'jquery';

class MobileNavToggle {

  constructor() {
    this.toggleClass = 'js-mobile-menu-toggle';
    this.toggleString = `.${this.toggleClass}`;
    this.toggle = $(this.toggleString);
    this.targetContainerString = '.js-main-navigation-wrapper';
    this.targetContainer = $(this.targetContainerString);
    this.activeClass = 'isActive';
  }

  init(){

    var _this = this;

    this.toggle.on('click', e => {
      this.targetContainer.toggleClass(this.activeClass);
      this.toggle.toggleClass(this.activeClass);
      e.preventDefault();
    });

    $('.main-navigation').on('mouseleave', function(){
      $('.js-main-navigation-wrapper, .js-mobile-menu-toggle').removeClass('isActive');
    });

  };

}
export { MobileNavToggle as default };
