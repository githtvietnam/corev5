$(document).ready(function(){
   $(document).on('click', '.avatar .img-thumbnail', function(){
      BrowseServerSingleImage($(this));
      return false;
   });

   $(document).on('click', '.reset-image', function(){
      $('.avatar .img-thumbnail').attr('src','/public/not-found.png');
      $('#imageTxt').val('');
   });

   $(document).on('click', '.uploadMultiImage', function(){
      let target = $(this).attr('data-target');
      BrowseServerMultiImageCkeditor($(this), target);
      return false;
   });

   $(document).on('click', '.upload-picture', function(){
      BrowseServerMultiImageDrag();
      return false;
   });

   $(document).on('click', '.delete-image', function(){
      let _this = $(this);
      _this.parents('.ui-state-default').remove();
      if(check_album_item() == false){
         $('.upload-list').hide();
         $('.click-to-upload').show();
      }
   });

   $( ".sortui" ).sortable();
	$( ".sortui" ).disableSelection();



});

function check_album_item(){
   if($('.ui-state-default').length > 0){
      return true;
   }
   return false;
}

function BrowseServerMultiImageDrag(){
   if(typeof(type) == 'undefined'){
     type = 'Images'
   }
      var finder = new CKFinder();

      finder.resourceType = type;
         finder.selectActionFunction = function(fileUrl , data, allFiles ) {
            var files = allFiles;
            var html = '';
            for(var i = 0 ; i < allFiles.length; i++){
               html = html + '<li class="ui-state-default">'
                    html = html + '<div class="thumb">'
                      html = html + '<span class="image img-scaledown">'
                        html = html + '<img src="'+files[i].url.replace(BASE_URL, "/")+'" alt="">'
                        html = html + '<input type="hidden" value="'+files[i].url.replace(BASE_URL, "/")+'" name="album[]">'
                      html = html + '</span>'
                      html = html + '<div class="overlay"></div>'
                      html = html + '<div class="delete-image">'
                        html = html + '<i class="ti-trash"></i>'
                      html = html + '</div>'
                    html = html + '</div>'
               html = html + '</li>'
            }

            if(check_album_item() == false){
               $('.upload-list').show();
               $('.click-to-upload').hide();
            }
            $('#sortable').append(html)

         }
   finder.popup();
}

function BrowseServerSingleImage(object, type){
   if(typeof(type) == 'undefined'){
     type = 'Images';
   }
   var finder = new CKFinder();
   finder.resourceType = type;
   finder.selectActionFunction = function( fileUrl, data ) {
     fileUrl =  fileUrl.replace(BASE_URL, "/");

     object.attr('src', fileUrl);
     $('#imageTxt').val(fileUrl);

   }
   finder.popup();
}

function BrowseServerMultiImageCkeditor(object, field, type){
   if(typeof(type) == 'undefined'){
     type = 'Images';
   }
    var finder = new CKFinder();
    // var object  = editors[field] // Xac dinh editor ma minh muon cho anh vao
    finder.resourceType = type;
    finder.selectActionData = field;

      finder.selectActionFunction = function(fileUrl , data, allFiles ) {
            var files = allFiles;
            for(var i = 0 ; i < allFiles.length; i++){
               fileUrl =  files[i].url;
               CKEDITOR.instances[field].insertHtml('<p><img src="'+fileUrl+'" alt="'+fileUrl+'"></p>');
            }
    }
    finder.popup();
}
