<form action="" method="" class="mb20 mt20">
   <div class="uk-flex uk-flex-middle uk-flex-space-between mb20">
      <div class="perpage">
         <div class="uk-flex uk-flex-middle ">
            <select name="perpage" class="form-control input-sm perpage filter mr10">
               @foreach (config('apps.general.perpage') as $perpage)
               <option value="{{ $perpage }}">{{ $perpage }} bản ghi</option>
               @endforeach
            </select>
         </div>
      </div>
      <div class="toolbox">
         <div class="uk-flex uk-flex-middle uk-flex-space-between">
            <div class="form-row cat-wrap mr10">
               <select name="" class="form-control ">
                  <option value="0" data-select2-id="3">[Root]</option>
                  <option value="1">Tin tức</option>
                  <option value="5">Thông tin chung</option>
                  <option value="6">Hướng dẫn mua hàng</option>
               </select>
            </div>
            <div class="uk-search uk-flex uk-flex-middle mr10 ml10">
               <div class="search-group uk-flex uk-flex-middle">
                  <input type="text" name="keyword" value="" placeholder="Nhập từ khóa tìm kiếm..." class="form-control">
                  <span class="input-group-btn">
                     <button type="submit" name="search" value="search" class="btn btn-primary mb0    btn-sm">Tìm kiếm </button>
                  </span>
               </div>
            </div>
            <div class="uk-button">
               <a href="{{ route('post.catalogue.create') }}" class="btn btn-danger btn-sm">
               <i class="fa fa-plus"></i>Thêm Nhóm Bài Viết mới </a>
            </div>
         </div>
      </div>
   </div>
</form>