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
            <div class="uk-search uk-flex uk-flex-middle mr10 ml10">
               <div class="search-group uk-flex uk-flex-middle">
                  <input type="text" name="keyword" value="{{ app('request')->input('keyword') }}" placeholder="Nhập từ khóa tìm kiếm..." class="form-control">
                  <span class="input-group-btn">
                     <button type="submit" name="search" value="search" class="btn btn-primary mb0    btn-sm">Tìm kiếm </button>
                  </span>
               </div>
            </div>
            <div class="uk-button">
               <a href="{{ route('permission.create') }}" class="btn btn-danger btn-sm">
                  <i class="fa fa-plus"></i>Thêm {{ $config['moduleName'] }} mới </a>
            </div>
         </div>
      </div>
   </div>
</form>
