import $ from 'jquery';
import 'slick';

class Carousels {

  constructor() {
    this.carouselClass = 'js-case-carousel';
    this.carouselString = `.${this.carouselClass}`;
    this.carousel = $(this.carouselString);
  }

  init(){

    var _this = this;

    this.carousel.slick({
			infinite: true,
			slidesToScroll: 1,
			speed: 900,
			dots: true,
      vertical: true,
      verticalSwiping: true,
			appendArrows: false,
			pauseOnFocus: true,
			pauseOnHover: true,
			pauseOnDotsHover: true,
      prevArrow: $('.js-previous-arrow'),
      nextArrow: $('.js-next-arrow'),
		});


  };

}
export { Carousels as default };
