<table class="table table-bordered table-striped ver1  table100 border-checkbox-section">
   <thead>
      <tr>
         <th logo-theme="theme1" style="width: 20px;">
            <div class="border-checkbox-group border-checkbox-group-primary">
               <input class="border-checkbox checkall" type="checkbox" id="checkAll">
               <label class="border-checkbox-label" for="checkAll"></label>
           </div>
         </th>
         <th logo-theme="theme1">ID</th>
         <th logo-theme="theme1">Tên Quyền</th>
         <th logo-theme="theme1" class="text-center">Tên Route</th>
         <th logo-theme="theme1" class="text-center">Ngày tạo</th>
         <th logo-theme="theme1" class="text-center">Trạng Thái</th>
         <th logo-theme="theme1" style="width:100px;" class="text-center">Thao tác</th>
      </tr>
   </thead>
   <tbody>
      @if(isset($permission) && is_object($permission))
      @foreach($permission as $key => $val)
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
         <td class="text-center">
            {{ $val->route }}
         </td>
         <td class="text-center">
            {{ $val->created_at }}
         </td>
         <td class="text-center">
            <input type="checkbox"  class="js-switch publish" data-field="publish" data-id="{{ $val->id }}" data-module="permission" {{ ($val->publish == 1) ? 'checked'  : ''  }}>
         </td>
         <td>
            <form action="{{ route('permission.destroy', $val->id) }}" method="post">
                @csrf
                @method('DELETE')
                <a type="button" href="{{ route('permission.edit', $val->id) }}" class="btn btn-primary">
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
