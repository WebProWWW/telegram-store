#=include lib/MyClass.coffee

$headerBlock = $ '.js-header'

$(window).on 'scroll', (e) ->
  offset = 15
  scrollTopNum = $(this).scrollTop()
  $headerBlock.addClass 'onscroll' if scrollTopNum > offset
  $headerBlock.removeClass 'onscroll' if scrollTopNum < offset