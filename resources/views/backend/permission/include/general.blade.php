<div class="row mb15">
   <div class="col-lg-12">
      <div class="form-input">
         <label class="control-label text-left">
            <span>Tên Quyền <b class="text-danger">(*)</b></span>
         </label>
            <input type="text" name="name" value="{{ old('name', (isset($permission->name)) ? $permission->name : '') }}"  class="form-control" placeholder="" autocomplete="off" id="title" data-flag="0">
      </div>
   </div>
</div>
<div class="row mb15">
   <div class="col-lg-12">
      <div class="form-input">
         <label class="control-label text-left">
            <span>Route Name <b class="text-danger">(*)</b></span>
         </label>
            <input type="text" name="route" value="{{ old('route', ($permission->route) ??  '') }}"  class="form-control" placeholder="" autocomplete="off" >
      </div>
   </div>
</div>
