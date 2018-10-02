import $ from 'jquery';

class SearchToggle {

  constructor() {
    this.toggleClass = 'js-search-toggle';
    this.toggleString = `.${this.toggleClass}`;
    this.toggle = $(this.toggleString);
    this.targetContainerString = '.js-searchform';
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

    $('body').on('click', ({target}) => {
      if(!$(target).parents(this.targetContainerString).length == 1){
        if(!$(target).parents(this.toggleString).length == 1){
          if(!$(target).hasClass(this.toggleClass)){
            this.targetContainer.removeClass(this.activeClass);
            this.toggle.removeClass(this.activeClass);
          }
        }
      }
    });

  };

}
export { SearchToggle as default };
