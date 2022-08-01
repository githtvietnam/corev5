<div class="ibox mb20">
   <div class="ibox-title">
      <h5>Trạng thái</h5>
   </div>
   <div class="ibox-content">
      <div class="row">
         <div class="col-lg-12">
            <div class="form-row mt10">
               <select class="form-control single-select2" id="publish" name="publish">
                   <option @if (old('publish', (isset($userCatalogue->publish)) ? $userCatalogue->publish : '') == 1) selected="selected" @endif value="1">Cho phép hiển thị</option>
                   <option @if (old('publish', (isset($userCatalogue->publish)) ? $userCatalogue->publish : '') == 0) selected="selected" @endif value="0">Không cho phép hiển thị</option>
               </select>
            </div>

         </div>
      </div>
   </div>
</div>
