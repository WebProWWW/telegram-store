<script type="text/javascript">

var data = [];

$('.composer_sticker_image').each(function(i, img) {
  data.push($(img).attr('src'));
});

$.post('https://telegram-store.loc/admin/parser/ajax', { imgsrc:data }, function(reData){
  console.log(reData);
});

</script>