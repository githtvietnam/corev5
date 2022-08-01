<div class="ibox ibox-seo mb20">
   <div class="ibox-title">
      <div class="uk-flex uk-flex-middle uk-flex-space-between">
         <h5>Cấu hình SEO</h5>
         <div class="uk-flex uk-flex-middle uk-flex-space-between">
            <div class="edit">
               <a href="#" class="edit-seo">Chỉnh sửa SEO</a>
            </div>
         </div>
      </div>
   </div>

   <div class="ibox-content">
      <div class="row">
         <div class="col-lg-12">
            <div class="google">
               @php
                  $meta_title = (null != old('meta_title')) ? old('meta_title') : 'Bạn chưa nhập tiêu đề SEO cho Bản ghi';
                  $canonical = (null != old('canonical')) ? old('canonical') : 'http://website.com/huong-dan-tao-duong-dan.html';
                  $meta_description = (null != old('meta_description')) ? old('meta_description') : 'Bạn Chưa nhập mô tả SEO cho Bản ghi';
               @endphp
               <div class="g-title">{{ $meta_title }}</div>
               <div class="g-link">{{ $canonical }}</div>
               <div class="g-description" id="metaDescription">
                  {{ $meta_description }}
               </div>
            </div>
         </div>
      </div>
      <div class="seo-group">
         <hr>
            <div class="row mb15">
            <div class="col-lg-12">
               <div class="form-input">
                  <div class="uk-flex uk-flex-middle uk-flex-space-between">
                     <label class="control-label ">
                        <span>Đường dẫn <b class="text-danger">(*)</b></span>
                     </label>
                  </div>
                  <div class="outer">
                     <div class="uk-flex uk-flex-middle">
                        <div class="base-url"><?php echo BASE_URL; ?></div>
                        <input type="text" name="canonical" value="{{ old('canonical') }}" class="form-control canonical" placeholder="" autocomplete="off" data-flag="0">
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="row mb15">
            <div class="col-lg-12">
               <div class="form-input">
                  <div class="uk-flex uk-flex-middle uk-flex-space-between">
                     <label class="control-label ">
                        <span>Tiêu đề SEO</span>
                     </label>
                     <span style="color:#9fafba;"><span id="titleCount">0</span> trên 70 ký tự</span>
                  </div>
                   <input type="text" name="meta_title" value="{{ old('meta_title') }}" data-target="titleCount" class="form-control meta-title" placeholder="" data-flag="0" autocomplete="off">

               </div>
            </div>
         </div>
          <div class="row mb15">
            <div class="col-lg-12">
               <div class="form-input">
                  <div class="uk-flex uk-flex-middle uk-flex-space-between">
                     <label class="control-label ">
                        <span>Từ khóa SEO <small class="text-danger">(Mỗi từ khóa cách nhau dấu ,)</small></span>
                     </label>
                  </div>
                   <input type="text" name="meta_keyword" value="{{ old('meta_keyword') }}" class="form-control meta-keyword" placeholder="" autocomplete="off">
               </div>
            </div>
         </div>
         <div class="row mb15">
            <div class="col-lg-12">
               <div class="form-input">
                  <div class="uk-flex uk-flex-middle uk-flex-space-between">
                     <label class="control-label ">
                        <span>Mô tả SEO</span>
                     </label>
                     <span style="color:#9fafba;"><span id="descriptionCount">0</span> trên 320 ký tự</span>
                  </div>
                  <textarea name="meta_description" cols="40" rows="10" data-target="descriptionCount" class="form-control meta-description" id="seoDescription" placeholder="" autocomplete="off">{{ old('meta_description') }}</textarea>
               </div>
            </div>
         </div>
                <div class="row mb15">
            <div class="col-lg-12">
               <div class="form-input">
                  <div class="uk-flex uk-flex-middle uk-flex-space-between">
                     <label class="control-label ">
                        <span>Script <small class="text-danger">(Mã script nhúng vào thẻ head)</small></span>
                     </label>
                  </div>
                  <textarea name="script" cols="40" rows="10" class="form-control" id="seoScript" placeholder="" autocomplete="off">{{ old('script') }}</textarea>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
