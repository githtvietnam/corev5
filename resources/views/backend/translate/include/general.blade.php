<div class="row mb15">
   <div class="col-lg-12">
      <div class="form-input">
         <label class="control-label text-left">
            <span>Tiêu đề <b class="text-danger">(*)</b></span>
         </label>
            <input type="text" name="name" value="{{ old('name', (isset($translate->name)) ? $translate->name : '') }}"  class="form-control" placeholder="" autocomplete="off" id="title" data-flag="0">
      </div>
   </div>
</div>
<div class="row mb15">
   <div class="col-lg-12">
      <div class="form-input">
         <label class="control-label text-left">
            <span>Từ khóa <b class="text-danger">(*)</b></span>
         </label>
            <input type="text" name="canonical" value="{{ old('canonical', ($translate->canonical) ??  '') }}"  class="form-control" placeholder="" autocomplete="off" >
      </div>
   </div>
</div>
