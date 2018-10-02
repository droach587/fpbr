import $ from 'jquery';
import 'waypoints';

class Parallax {

  constructor() {
    this.modalClass = 'js-modal';
    this.modalString = `.${this.modalClass}`;
    this.modal = $(this.modalString);
  }

  init(){

    var _this = this;

    $('.p-hide').each(function(){
      const waypoint = new Waypoint({
        element: $(this)[0],
        handler(direction) {
          if(direction == 'down'){
            if(!$(this.element).hasClass('p-hide--show')){
              $(this.element).addClass('p-hide--show');
            }
          }
        },
        offset: '80%'
      });
    });


  };

}
export { Parallax as default };
