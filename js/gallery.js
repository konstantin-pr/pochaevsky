$(document).ready(function(){
  function hoverGallery() {
    var hItems = $('.small-col1');
    console.log('hh', hItems);
    hItems.hover(function(){
      console.log('a', $(this));
      console.log($(this).children());
    },
     function(){
      console.log('live', $(this));
    });
  }

});
