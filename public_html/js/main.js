/*
 * @author Timur Valiyev
 * @link https://webprowww.github.io
 */

(function() {
  var $headerBlock, MyClass;

  MyClass = class MyClass {
    constructor() {}

  };

  $headerBlock = $('.js-header');

  $(window).on('scroll', function(e) {
    var offset, scrollTopNum;
    offset = 15;
    scrollTopNum = $(this).scrollTop();
    if (scrollTopNum > offset) {
      $headerBlock.addClass('onscroll');
    }
    if (scrollTopNum < offset) {
      return $headerBlock.removeClass('onscroll');
    }
  });

}).call(this);
