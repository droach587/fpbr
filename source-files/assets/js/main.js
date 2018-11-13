import $ from 'jquery';
// import SearchToggle from './app/SearchToggle';
// import MobileNavToggle from './app/MobileNavToggle';
// import MobileToggle from './app/MobileToggle';
// import ScrollNavHide from './app/ScrollNavHide';
import Carousels from './app/Carousels';
// import Modal from './app/Modal';
import Parallax from './app/Parallax';
// import Tabs from './app/Tabs';
// import MobileNestToggle from './app/MobileNestToggle';

import React from 'react';
import ReactDOM from 'react-dom';
import {Provider} from 'mobx-react';

// import RootStore from './stores/index';
// import CaseStudyApp from './app/CaseStudyApp';
// import NewsArticlesApp from './app/NewsArticlesApp';

//Run here
// const searchToggle = new SearchToggle();
// const mobileNavToggle = new MobileNavToggle();
// const scrollNavHide = new ScrollNavHide();
const carousels = new Carousels();
// const modal = new Modal();
const parallax = new Parallax();
// const tabs = new Tabs();
// const mobileToggle = new MobileToggle();
// const mobileNestToggle = new MobileNestToggle();

$(document).ready(() => {

  const measureScroll = () => {
    let scroll = $(document).scrollTop();
    if(scroll > 60){
      $('.main-nav').addClass('isKnockout');
    }else{
      $('.main-nav').removeClass('isKnockout');
    }
  }

  $('.js-untuck').each(function(){
    $(this).on('click', function(e){
      $(this).parent().toggleClass('isVisible');
      e.preventDefault();
    })
  });

  function getScrollPercent() {
    var h = document.documentElement,
        b = document.body,
        st = 'scrollTop',
        sh = 'scrollHeight';
    return (h[st]||b[st]) / ((h[sh]||b[sh]) - h.clientHeight) * 100;
  }

  $(window).scroll(function (event) {
    measureScroll();
    $('.js-progress-inner').css('width', `${getScrollPercent()}%`)
  });

  $(window).on('load', function(){
    setTimeout(function(){
      $('.loader').addClass('leave');
      setTimeout(function(){
        $('.preloader').remove();
      },500);
    }, 1200);
  });

  measureScroll();


  $('.js-jumplink').each(function(){
    $(this).on('click', e => {
      let target = $(this).attr('href');
      $('html, body').stop().animate({
        scrollTop: $(target).offset().top - 65
      }, 800);
      e.preventDefault();
    })
  });

  $('.js-nav-toggle').on('click', e => {
    $('.flyout-nav__mask').toggleClass('isActive');
    $('.flyout-nav').toggleClass('isActive');
    e.preventDefault();
  });

  $('.flyout-nav__mask').on('click', e => {
    if($(e.target).hasClass('flyout-nav__mask')){
      $('.flyout-nav__mask').toggleClass('isActive');
      $('.flyout-nav').toggleClass('isActive');
    }
    e.stopPropagation();
  });

  // searchToggle.init();
  // mobileNavToggle.init();
  // scrollNavHide.init();
  carousels.init();
  // mobileToggle.init();
  // mobileNestToggle.init();
  // tabs.init();
  // modal.init();
  parallax.init();
});


// ---------------------------
// Set up all react and mobx components
// const rootStore = new RootStore();
//
// if (document.getElementById('case-studies')) {
//   const heading = document.getElementById('case-studies').dataset.heading;
//   ReactDOM.render(<Provider RootStore={rootStore}><CaseStudyApp route="case_studies" heading={heading}/></Provider>, document.getElementById('case-studies'));
// }
