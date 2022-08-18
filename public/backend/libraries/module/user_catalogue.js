HT.updateUserCatalogueStatus = () => {
   if($('.user-catalogue-publish').length){
      $(document).on('change', '.user-catalogue-publish', function(){
         let _this = $(this)
         let module = _this.attr('data-module')
         let ajaxUrl = 'ajax/user/catalogue/updateUserCatalogueStatus'
         $.ajax({
            type        : 'POST',
            url         :  ajaxUrl,
            data		    : {
               'id' : _this.attr('data-id'),
            },
            dataType    : 'json',
            success: function(response){

            }
			})
      })
   }
}


$(document).ready(function(){
   $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
   });

   HT.updateUserCatalogueStatus();

});
