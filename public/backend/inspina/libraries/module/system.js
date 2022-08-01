$(document).ready(function(){

   if($('.ck-editor').length){
      $('.ck-editor').each(function(){
         let _this = $(this);
         let elementId = _this.attr('id')
         let height = _this.attr('data-height')
         ckeditor(elementId, height)
      });
   }

   $('.single-select2').select2();


});
