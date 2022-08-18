<div class="permission-title mb20" style="font-size:20px">Permission IN</div>
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
               @php
                  if(in_array($item['route'], $userCataloguePermission)) continue;
               @endphp
            <div class="col-lg-3 mb10">
               <div class="permission-item uk-flex uk-flex-middle">
                  <input
                     name="permissions_in[]"
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


<div class="permission-title mb20" style="font-size:20px">Permission OUT</div>
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
               @php
                  if(!in_array($item['route'], $userCataloguePermission)) continue;
               @endphp
            <div class="col-lg-3 mb10">
               <div class="permission-item uk-flex uk-flex-middle">
                  <input
                     name="permissions[]"
                     value="{{ $item['route'] }}"
                     type="checkbox"
                     class="js-switch js-small permission-out"
                     data-color="rgb(252, 97, 128)"
                     checked
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
<input type="hidden" value="" name="permissions_out[]" class="permission-out-value">
<script type="text/javascript">
   $(document).ready(function(){
      $(document).on('change', '.permission-out' ,function(){
         let permissionOut = [];
         $('.permission-out').each(function(){
            let _this = $(this);
            if(_this.prop('checked') == false){
               permissionOut.push(_this.val())
            }
         });
         permissionOut = JSON.stringify(permissionOut)
         $('.permission-out-value').val(permissionOut)
      });
   });
</script>
