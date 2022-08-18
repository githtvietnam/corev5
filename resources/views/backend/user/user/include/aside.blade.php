
<div class="ibox mb20">
   <div class="ibox-title">
      <h5>{{ config('apps.user_catalogue.module') }}</h5>
   </div>
   <div class="ibox-content">
      <div class="row">
         <div class="col-lg-12">
            <div class="form-row mt10">
               <select class="form-control single-select2"  name="user_catalogue_id">
                   <option value="0">[Chọn {{ config('apps.user_catalogue.module') }}]</option>
                  @if(isset($userCatalogue))
                     @foreach($userCatalogue as $userCatalogue)
                     <option @if (old('user_catalogue_id', (isset($user->user_catalogue_id)) ? $user->user_catalogue_id : '') == $userCatalogue->id) selected="selected" @endif value="{{ $userCatalogue->id }}">{{ $userCatalogue->name }}</option>
                     @endforeach
                  @endif
               </select>
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
               @php $image = (null != old('image')) ? old('image', (isset($user->image)) ? $user->image : '') : ((isset($user->image) && $user->image != '') ? $user->image : 'public/not-found.png') @endphp
               <div class="avatar" style="cursor: pointer;"><img src="{{ $image }}" class="img-thumbnail" alt=""></div>
               <input type="text" name="image" value="{{ old('image', $image) }}" class="form-control" placeholder="Đường dẫn của ảnh" id="imageTxt">
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
                   <option @if (old('publish', (isset($user->publish)) ? $user->publish : '') == 1) selected="selected" @endif value="1">Cho phép hiển thị</option>
                   <option @if (old('publish', (isset($user->publish)) ? $user->publish : '') == 0) selected="selected" @endif value="0">Không cho phép hiển thị</option>
               </select>
            </div>

         </div>
      </div>
   </div>
</div>
