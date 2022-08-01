<div class="ibox mb20">
   <div class="ibox-title">
      <div class="uk-flex uk-flex-middle uk-flex-space-between">
         <h5 class="choose-image" style="cursor: pointer;">Lựa Chọn Module </h5>
         <a class="text-danger reset-image">Reset</a>
      </div>
   </div>
   <div class="ibox-content">
      <div class="row">
         <div class="col-lg-12">
            <div class="form-row">

               <select class="form-control single-select2"  name="module">
                  <option value="0">[ Chọn Module ]</option>
                  @foreach(config('apps.general.module') as $key => $val)
                   <option  @if (old('module', (isset($permission->module)) ? $permission->module : '') == $key) selected="selected" @endif value="{{ $key }}">{{ $val }}</option>
                   @endforeach
               </select>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="ibox mb20">
   <div class="ibox-title">
      <h5>Trạng thái</h5>
   </div>
   <div class="ibox-content">
      <div class="row">
         <div class="col-lg-12">
            <div class="form-row mt10">
               <select class="form-control single-select2" id="publish" name="publish">
                   <option @if (old('publish', (isset($permission->publish)) ? $permission->publish : '') == 1) selected="selected" @endif value="1">Cho phép hiển thị</option>
                   <option @if (old('publish', (isset($permission->publish)) ? $permission->publish : '') == 0) selected="selected" @endif value="0">Không cho phép hiển thị</option>
               </select>
            </div>

         </div>
      </div>
   </div>
</div>
