import $ from 'jquery';
import 'waypoints';

class Parallax {

  constructor() {

  }

  init(){

    var _this = this;

    $('.animated').each(function(){
      const waypoint = new Waypoint({
        element: $(this)[0],
        handler(direction) {
          if(direction == 'down'){
            if(!$(this.element).hasClass('isAnimated')){
              $(this.element).addClass('isAnimated');
            }
          }
        },
        offset: '80%'
      });
    });

  };

}
export { Parallax as default };
