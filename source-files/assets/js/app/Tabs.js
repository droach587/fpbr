import $ from 'jquery';

class Tabs {

  constructor() {
    this.tabsClass = 'js-tabs';
    this.tabsString = `.${this.tabsClass}`;
    this.tabs = $(this.tabsString);
    this.menuClass = 'js-dropdown-menu';
    this.menuString = `.${this.menuClass}`;
    this.menu = $(this.menuString);
  }

  init(){

    var _this = this;

    this.tabs.each(function(){
      $(this).on('click', (e) => {

        const tabRef = $(this).attr('href');
        const tabTar = $(this).attr('data-target');

        if($(this).hasClass('js-tabs-menu')){
          const _this = this;
          const menuTar = $(this).attr('data-menu');
          $(menuTar).find('.isActive').removeClass('isActive');
          setTimeout(function(){
            $(_this).parent().addClass('isActive');
          },100);
        }

        $(tabTar).find('.isActive').removeClass('isActive').addClass('hidden');
        $(tabRef).removeClass('hidden').addClass('isActive');

        e.preventDefault();
      });
    });

    this.menu.each(function(){

      const menu = this;

      $(this).find('>li:first-child a').on('click', function(e){
        e.preventDefault();
      });

      $(this).find('>li:first-child a span:not(".arrow")').text($(this).find('li ul li:first-child a').text());

      $(this).find('.js-dropdown-tab').each(function(){

        $(this).on('click', (e) => {

          const tabRef = $(this).attr('href');
          const tabTar = $(this).attr('data-target');

          $(tabTar).find('.isActive').removeClass('isActive').addClass('hidden');
          $(tabRef).removeClass('hidden').addClass('isActive');

          $(menu).find('>li:first-child a span:not(".arrow")').text($(this).text());

          e.preventDefault();
        });

      });

    });

  };

}
export { Tabs as default };
