<div class="row mb15">
   <div class="col-lg-12">
      <div class="form-input">
         <label class="control-label text-left">
            <span>Tiêu đề <b class="text-danger">(*)</b></span>
         </label>
            <input type="text" name="name" value="{{ old('name', (isset($userCatalogue->name)) ? $userCatalogue->name : '') }}"  class="form-control" placeholder="" autocomplete="off" id="title" data-flag="0">
      </div>
   </div>
</div>

@if(isset($permission) && is_array($permission) && count($permission))
@foreach($permission as $key => $permissions)
<div class="row mb15 align-items-start">
   <div class="col-lg-2">
      <span><strong>{{ \Arr::get(config('apps.general.module'), $key) }}</strong></span>
   </div>
   <div class="col-lg-10">
      <div class="form-input mb20">
         <div class="row">
            @if(isset($permissions) && is_array($permissions) && count($permissions))
            @foreach($permissions as $keyItem => $item)
            <div class="col-lg-3 mb10">
               <div class="permission-item uk-flex uk-flex-middle">
                  <input
                     name="permissions[]"
                     value="{{ $item['route'] }}"
                     type="checkbox"
                     class="js-switch js-small"
                     data-color="rgb(252, 97, 128)"
                     {{ ((isset($userCatalogue->permissions)  && in_array($item['route'], json_decode($userCatalogue->permissions), TRUE)) ? 'checked' : '') }}
                     data-size="small"
                     id="checkbox-{{ $keyItem }}-{{ $key }}"
                     >
                  <label class="permission-text ml10" for="checkbox-{{ $keyItem }}-{{ $key }}" style="margin-bottom:0;cursor:pointer;">{{ $item['name'] }}</label>
               </div>
            </div>
            @endforeach
            @endif
         </div>
      </div>
   </div>
</div>
@endforeach
@endif
