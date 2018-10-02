import $ from 'jquery';
import 'fancy';
import 'fancy-media';

class Modal {

  constructor() {
    this.modalClass = 'js-modal';
    this.modalString = `.${this.modalClass}`;
    this.modal = $(this.modalString);
  }

  init(){

    var _this = this;

    this.modal.fancybox({
      openEffect  : 'none',
      closeEffect : 'none',
      helpers : {
        media : {}
      },
      fitToView: true,
    });


  };

}
export { Modal as default };
