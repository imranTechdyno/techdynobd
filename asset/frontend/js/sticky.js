//===== Sticky Header =====//
// $(window).on('scroll',function () {


//     'use strict';
//     var menu_height = $('header').innerHeight();
//     var scroll = $(window).scrollTop();
//     if (scroll >= menu_height) {
//       $('body').addClass('sticky');
  
      
//     } else {
//       $('body').removeClass('sticky');
//     }
  
//   });
// When the user scrolls the page, execute myFunction
window.onscroll = function() {myFunction()};

// Get the header
var header = document.getElementById("navbar");

// Get the offset position of the navbar
var sticky = header.offsetTop;

// Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}