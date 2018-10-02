import $ from 'jquery';
import 'slick';

class Carousels {

  constructor() {
    this.carouselClass = 'js-carousel';
    this.carouselString = `.${this.carouselClass}`;
    this.socialCarouselClass = 'js-social-carousel';
    this.socialCarouselString = `.${this.socialCarouselClass}`;
    this.carousel = $(this.carouselString);
    this.socialCarousel = $(this.socialCarouselString);
  }

  init(){

    var _this = this;


    $('.js-hero__carousel-overide').slick({
			infinite: true,
			slidesToScroll: 1,
			speed: 900,
			fade: true,
			dots: false,
			appendArrows: false,
			pauseOnFocus: false,
			pauseOnHover: false,
		});

    this.carousel.slick({
			infinite: true,
			slidesToScroll: 1,
			speed: 900,
			fade: true,
			dots: true,
			appendArrows: false,
			pauseOnFocus: true,
			pauseOnHover: true,
			pauseOnDotsHover: true,
      prevArrow: $('.js-previous-arrow'),
      nextArrow: $('.js-next-arrow'),
		});

    this.socialCarousel.slick({
			infinite: true,
			slidesToScroll: 3,
      slidesToShow: 3,
			speed: 900,
			fade: false,
			dots: false,
			appendArrows: false,
			pauseOnFocus: true,
			pauseOnHover: true,
			pauseOnDotsHover: true,
      prevArrow: $('.js-previous-arrow'),
      nextArrow: $('.js-next-arrow'),
      responsive: [
        {
          breakpoint: 640,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
          }
        }
      ]
		});


  };

}
export { Carousels as default };
