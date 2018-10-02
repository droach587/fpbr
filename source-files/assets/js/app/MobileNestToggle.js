import $ from 'jquery';

class MobileNestToggle {

  constructor() {
    this.toggleClass = 'li.menu-item-has-children > a';
    this.toggleString = `${this.toggleClass}`;
    this.toggle = $(this.toggleString);
    this.activeClass = 'isActive';
  }

  init(){

    var _this = this;

    if($(document).width() < 860){
      this.toggle.on('click', (e, _this) => {
        $(e.currentTarget).parent().toggleClass(this.activeClass);
        e.preventDefault();
      });
    }

  };

}
export { MobileNestToggle as default };
