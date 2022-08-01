<div class="ibox mb20">
   <div class="ibox-title">
      <h5>Danh mục cha</h5>
   </div>
   <div class="ibox-content">
      <div class="row">
         <div class="col-lg-12">
            <div class="form-row mb10">
               <small class="text-danger">Chọn [Root] Nếu không có danh mục cha</small>
            </div>
            <div class="form-row mt10">
               @if(isset($config['dropdown']) && is_array($config['dropdown']) && count($config['dropdown']))
               <select class="form-control single-select2" id="parentid" name="parentid" required="required">
                  @foreach($config['dropdown'] as $key => $val)
                   <option  value="{{ $key }}"  @if (old('parentid') == $key) selected="selected" @endif >{{ $val }}</option>
                  @endforeach
               </select>
               @endif
            </div>

         </div>
      </div>
   </div>
</div>
<div class="ibox mb20">
   <div class="ibox-title">
      <div class="uk-flex uk-flex-middle uk-flex-space-between">
         <h5 class="choose-image" style="cursor: pointer;">Ảnh đại diện </h5>
         <a class="text-danger reset-image">Reset</a>
      </div>
   </div>
   <div class="ibox-content">
      <div class="row">
         <div class="col-lg-12">
            <div class="form-row">
               @php $image = (null != old('image')) ? old('image')  : 'public/not-found.png' @endphp
               <div class="avatar" style="cursor: pointer;"><img src="{{ $image }}" class="img-thumbnail" alt=""></div>
               <input type="text" name="image" value="{{ old('image') }}" class="form-control" placeholder="Đường dẫn của ảnh" id="imageTxt">
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
               <select class="form-control single-select2"  name="publish">
                   <option value="1" @if (old('publish') == 1) selected="selected" @endif>Cho Phép hiển thị</option>
                   <option value="0" @if (old('publish') == 0) selected="selected" @endif>Không cho phép hiển thị</option>
               </select>
            </div>

         </div>
      </div>
   </div>
</div>
