var HT = {};


HT.setupCKeditor = () => {
   if($('.ck-editor').length){
      $('.ck-editor').each(function(){
         let _this = $(this);
         let elementId = _this.attr('id')
         let height = _this.attr('data-height')
         ckeditor(elementId, height)
      });
   }
}

HT.slugTitle = () => {
   if($('.title').length){
      $(document).on('keyup', '.title', function(){
         let _this = $(this);
         let metaTitle = _this.val();
         let totalCharacter = metaTitle.length;
         if(totalCharacter > 70){
            $('.meta-title').addClass('input-error');
         }else{
            $('.meta-title').removeClass('input-error');
         }
         $('.g-title').text(metaTitle);
         $('.meta-title').val(metaTitle);
         let val = slug(metaTitle)
         $('.g-link').text(BASE_URL + val + '.html');
         $('.canonical').val(val)
      });
   }
}

HT.metaDescription = () => {
   if($('.meta-description').length){
      $(document).on('keyup change','.meta-description', function(){
         let _this = $(this);
         let totalCharacter = _this.val().length;
         $('#descriptionCount').text(totalCharacter);
         if(totalCharacter > 320){
            _this.addClass('input-error');
         }else{
            _this.removeClass('input-error');
         }
         $('.g-description').text(_this.val());
      });
   }
}

HT.slugCanonical = () => {
   if($('.canonical').length){
      $(document).on('keyup','.canonical', function(){
         let _this = $(this);
         _this.attr('data-flag', '1');
         let slugTitle = slug(_this.val());
         $('.g-link').text(BASE_URL + slugTitle + '.html');
      });
   }
}

HT.setupSelect2 = () => {
   if($('.single-select2').length){
      $('.single-select2').select2();
   }

}

HT.deleteRecord = () => {
   if($('.delete-record').length){
      $('.delete-record').on('click', function(){
         let _this = $(this)
         let _form = _this.parent('form')
         HT.swalConfirm('Cảnh Báo', 'Hãy chắc chắn rằng bạn muốn thực hiện chức năng này', _form)
      });
   }
}

HT.updateField = () => {
   if($('.publish').length){
      $(document).on('change', '.publish', function(){
         let _this = $(this)
         let module = _this.attr('data-module')
         let ajaxUrl = 'ajax/'+module+'/uploadByField'
         $.ajax({
            type        : 'POST',
            url         :  ajaxUrl,
            data		    : {
               'id' : _this.attr('data-id'),
               'module' : _this.attr('data-module'),
               'column' : _this.attr('data-field')
            },
            dataType    : 'json',
            success: function(response){

            }
			})
      })
   }
}

HT.changeDefaultLanguage = () => {
   if($('.default').length){
      $(document).on('change', '.default', function(){
         let _this = $(this)
         if(_this.attr('data-id') == _this.attr('data-language')){
            HT.swalError('Cảnh báo', 'Bạn không thể lựa chọn ngôn ngữ này', 'error')
            _this.prop('checked', true);
         }else{
            $.ajax({
               type        : 'POST',
               url         :  'ajax/translate/changeDefaultLanguage',
               data		    : {
                  'id' : _this.attr('data-id'),
                  'module' : _this.attr('data-module'),
               },
               dataType    : 'json',
               success: function(response){
                  if(response.error == 1){
                     HT.swalError('Cảnh báo', response.message, 'error')
                  }else{
                     location.reload();
                  }
               }
   			})
         }
      })
   }
}

HT.checkbox = () => {
   if($('.checkbox-item').length){
      $(document).on('change','.checkbox-item', function(){
         let _this = $(this);
         HT.changeTableBackground();
         HT.checkItemAll(_this);
      });
   }
}

HT.checkAll = () => {
   if($('.checkall').length){
      $(document).on('click','.checkall' , function(){
         let _this = $(this)
         HT.processCheckAll(_this)
         HT.changeTableBackground(_this)
      });
   }
}

HT.changeTableBackground = () => {
   $('.checkbox-item').each(function() {
		if($(this).is(':checked')) {
			$(this).parents('tr').addClass('bg-active')
		}else {
			$(this).parents('tr').removeClass('bg-active')
		}
	});
}

HT.processCheckAll = (object) => {
   let table = object.parents('table')
   if($('#checkAll').length){
      if(table.find('#checkAll').prop('checked')){
			table.find('.checkbox-item').prop('checked', true);
		}
		else{
			table.find('.checkbox-item').prop('checked', false);
		}
   }
}




HT.checkItemAll = (object) => {
   let table = object.parents('table')
	if(table.find('.checkbox-item').length) {
      console.log(table.find('.checkbox-item').length);
		if(table.find('.checkbox-item:checked').length == table.find('.checkbox-item').length) {
			table.find('#checkAll').prop('checked', true)
		}
		else{
			table.find('#checkAll').prop('checked', false)
		}
	}
}


HT.swalConfirm = (title, message, form) => {
   event.preventDefault(); // prevent form submit
   var form = form; // storing the form
   swal({
      title: title,
      text: message,
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Xác Nhận",
      cancelButtonText: "Hủy Bỏ",
      closeOnConfirm: false,
      closeOnCancel: false
   },
   function(isConfirm){
      if (isConfirm) {
           form.submit();          // submitting the form when user press yes
      } else {
           swal("Hủy Bỏ", "Thao tác bị hủy bỏ", "error");
      }
   });
}

HT.swalError = (title, message) => {
   swal(title, message, "error");
}

$(document).ready(function(){

   $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
   });

   HT.setupCKeditor();
   HT.setupSelect2();
   HT.deleteRecord();
   HT.metaDescription();
   HT.checkbox();
   HT.slugTitle();
   HT.slugCanonical();
   HT.checkAll();
   HT.updateField();
   HT.changeDefaultLanguage();
});
