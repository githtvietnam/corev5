$(document).ready(function(){
   $(document).on('click','.edit-seo', function(){
      $('.seo-group').toggleClass('hidden')
      return false;
   });

   $(document).on('keyup','#title', function(){
      let _this = $(this);
      let string = _this.val();
      string = slug(string);
      if($('.canonical').val().length == 0){
         $('.canonical').val(string);
      }

      change_google_meta_title(_this.val())
      change_google_meta_link(string)
   });

   $(document).on('keyup','.meta-title', function(){
      let _this = $(this);
      let seft = 'meta-title';
      check_character(_this, _this.attr('data-target'));
      change_google_meta_title(_this.val(), seft)
   });
   $(document).on('keyup','.meta-description', function(){
      let _this = $(this);
      check_character(_this, _this.attr('data-target'));
      $('.g-description').html(_this.val());
   });

   $(document).on('keyup','.canonical', function(){
      let _this = $(this);
      let string = slug($(this).val());
      $('.g-link').html(BASE_URL+string)
   });

});

function change_google_meta_title(string, seft){
   let meta_title = $('.meta-title').val()
   if(meta_title.length == 0){
      $('.g-title').html(string)
   }
   if(seft == 'meta-title'){
      $('.g-title').html(string)
   }
}

function change_google_meta_link(string, seft){
   let canonical = $('.canonical').val()
   $('.g-link').html(BASE_URL+string)
}




function check_character(object, target){
   let totalCharacter = object.val().length
   let maxCharacter = (target == 'titleCount') ? 71 : 320
   if(totalCharacter > maxCharacter){
      object.addClass('s-alert')
   }else{
      object.removeClass('s-alert');
   }
   $('#'+target).html(totalCharacter);
}


function slug(title){
	title = cnvVi(title);
	return title;
}

function cnvVi(str) {
	str = str.toLowerCase(); // chuyen ve ki tu biet thuong
	str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
	str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
	str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
	str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
	str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
	str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
	str = str.replace(/đ/g, "d");
	str = str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|,|\.|\:|\;|\'|\–| |\"|\&|\#|\[|\]|\\|\/|~|$|_/g, "-");
	str = str.replace(/-+-/g, "-");
	str = str.replace(/^\-+|\-+$/g, "");
	return str;
}
