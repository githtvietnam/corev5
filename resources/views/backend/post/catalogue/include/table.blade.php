<table class="table table-bordered table-striped ver1  table100 border-checkbox-section">
   <thead>
      <tr>
         <th style="width: 20px;">
            <div class="border-checkbox-group border-checkbox-group-primary">
               <input class="border-checkbox" type="checkbox" id="checkAll">
               <label class="border-checkbox-label" for="checkAll"></label>
           </div>
         </th>
         </th>
         <th>ID</th>
         <th>Tiêu đề</th>
         <th class="text-center">
            <span class="icon-language img-cover">
               <img src="public/en.png" alt="">
            </span>
         </th>
         <th class="text-center">Vị trí</th>
         <th class="text-center">Người tạo</th>
         <th class="text-center">Ngày tạo</th>
         <th class="text-center">Trạng Thái</th>
         <th style="width:100px;" class="text-center">Thao tác</th>
      </tr>
   </thead>
   <tbody>
      @foreach($postCatalogue as $key => $val)
      <tr>
         <td>
            <div class="border-checkbox-group border-checkbox-group-primary">
               <input class="border-checkbox" type="checkbox" id="checkbox10">
               <label class="border-checkbox-label" for="checkbox10"></label>
           </div>
         </td>
         <td class="text-center">{{ $val->id }}</td>
         <td class="text-left">
            {{ str_repeat('|----', (($val->level > 0)?($val->level - 1):0)).$val->name }}
         </td>
         <td class="text-center">Chưa Dịch</td>
         <td class="text-center">
            <input type="text" name="order[{{ $val->id }}]" value="0" class="form-control sort-order" placeholder="Vị trí" style="width:50px;text-align:right;display:inline-block;">
         </td>
         <td class="text-center">
            -
         </td>
         <td class="text-center">
            {{ $val->created_at }}
         </td>
         <td class="text-center">
            <input type="checkbox" class="js-switch" {{ ($val->publish == 1) ? 'checked=""'  : ''  }}>
         </td>
         <td>
            <a type="button" href="" class="btn btn-primary">
               <i class="ti-write"></i>
            </a>
            <a type="button" href="" class="btn btn-danger">
               <i class="ti-trash"></i>
            </a>
         </td>
      </tr>
      @endforeach
   </tbody>
</table>
<div id="pagination" class="mt20">
   {{ $postCatalogue->links('pagination::bootstrap-4') }}
</div>
