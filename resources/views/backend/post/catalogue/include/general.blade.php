<div class="row mb15">
   <div class="col-lg-12">
      <div class="form-input">
         <label class="control-label text-left">
            <span>Tiêu đề <b class="text-danger">(*)</b></span>
         </label>
            <input type="text" name="name" value="{{ old('title') }}"  class="form-control" placeholder="" autocomplete="off" id="title" data-flag="0">
      </div>
   </div>
</div>
<div class="row mb15">
   <div class="col-lg-12">
      <div class="form-input form-description">
         <div class="uk-flex uk-flex-middle uk-flex-space-between">
            <label class="control-label text-left">
               <span>Mô tả</span>
            </label>
            <a href="" title="" data-target="{{ config('apps.general.ckfinder_target_description') }}" class="uploadMultiImage">Upload hình ảnh</a>
         </div>
         <textarea name="description" class="ck-editor form-control" id="description" autocomplete="off" data-height="{{ config('apps.general.ckeditor_description_height') }}">{{ old('description') }}</textarea>

      </div>
   </div>
</div>

<div class="row mb15">
   <div class="col-lg-12">
      <div class="form-input">
         <div class="uk-flex uk-flex-middle uk-flex-space-between">
            <label class="control-label text-left">
               <span>Nội dung</span>
            </label>
            <a href="" title="" data-target="{{ config('apps.general.ckfinder_target_content') }}" class="uploadMultiImage">Upload hình ảnh</a>
         </div>
         <textarea name="content" class="ck-editor form-control" id="content" data-height="{{ config('apps.general.ckeditor_content_height') }}" autocomplete="off">{{ old('content') }}</textarea>
      </div>
   </div>
</div>
