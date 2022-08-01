<table class="table table-bordered table-striped ver1  table100 border-checkbox-section">
   <thead>
      <tr>
         <th style="width: 20px;">
            <div class="border-checkbox-group border-checkbox-group-primary">
               <input class="border-checkbox checkall" type="checkbox" id="checkAll">
               <label class="border-checkbox-label" for="checkAll"></label>
           </div>
         </th>
         </th>
         <th>ID</th>
         <th>Tên Nhóm</th>
         <th>Số Thành Viên</th>
         <th class="text-center">Người tạo</th>
         <th class="text-center">Ngày tạo</th>
         <th class="text-center">Trạng Thái</th>
         <th style="width:100px;" class="text-center">Thao tác</th>
      </tr>
   </thead>
   <tbody>
      @if(isset($userCatalogue) && is_object($userCatalogue))
      @foreach($userCatalogue as $key => $val)
      <tr>
         <td>
            <div class="border-checkbox-group border-checkbox-group-primary">
               <input class="border-checkbox checkbox-item" type="checkbox" id="checkbox{{ $val->id }}">
               <label class="border-checkbox-label" for="checkbox{{ $val->id }}"></label>
           </div>
         </td>
         <td class="text-center">{{ $val->id }}</td>
         <td class="text-left">
            {{ $val->name }}
         </td>
         <td class="text-left">
            0
         </td>
         <td class="text-center">
            <img style="max-width:50px;display:inline-block;" src="{{ $val->image ?? 'public/not-found.png' }}" alt="">
         </td>
         <td class="text-center">
            -
         </td>
         <td class="text-center">
            {{ $val->created_at }}
         </td>
         <td class="text-center">
            <input type="checkbox"  class="js-switch publish" data-field="publish" data-id="{{ $val->id }}" data-module="translate" {{ ($val->publish == 1) ? 'checked'  : ''  }}>
         </td>
         <td>
            <form action="{{ route('user.catalogue.destroy', $val->id) }}" method="post">
                @csrf
                @method('DELETE')
                <a type="button" href="{{ route('user.catalogue.edit', $val->id) }}" class="btn btn-primary">
                  <i class="ti-write"></i>
               </a>
                <button type="submit" name="delete" class="btn btn-danger delete-record">
                  <i class="ti-trash"></i>
               </button>
            </form>
         </td>
      </tr>
      @endforeach
      @endif
   </tbody>
</table>
