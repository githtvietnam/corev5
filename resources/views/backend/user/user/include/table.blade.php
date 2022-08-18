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
         <th>Ảnh</th>
         <th>Họ Tên</th>
         <th class="text-center">Email</th>
         <th class="text-center">Số ĐT</th>
         <th class="text-center">Địa chỉ</th>
         <th class="text-center">Trạng Thái</th>
         <th style="width:100px;" class="text-center">Thao tác</th>
      </tr>
   </thead>
   <tbody>
      @if(isset($user) && is_object($user))
      @foreach($user as $key => $val)
      <tr>
         <td>
            <div class="border-checkbox-group border-checkbox-group-primary">
               <input class="border-checkbox checkbox-item" type="checkbox" id="checkbox{{ $val->id }}">
               <label class="border-checkbox-label" for="checkbox{{ $val->id }}"></label>
           </div>
         </td>
         <td class="text-center">{{ $val->id }}</td>
         <td class="text-center">
            <div style="width:65px;height:45px;" class="table-image img-cover image"><img src="{{ !empty($val->image) ? $val->image : '/public/not-found.png' }}" alt=""></div>
         </td>
         <td class="text-left">
            {{ $val->name }}
         </td>
         <td class="text-center">
            {{ $val->email }}
         </td>
         <td class="text-center">
            {{ $val->phone }}
         </td>
         <td class="text-center">
            {{ $val->address }}
         </td>
         <td class="text-center">
            <input type="checkbox"  class="js-switch publish" data-field="publish" data-id="{{ $val->id }}" data-module="user"  {{ ($val->publish == 1) ? 'checked'  : ''  }}>
         </td>
         <td>
            <form action="{{ route('user.destroy', $val->id) }}" method="post">
                @csrf
                @method('DELETE')
               <a type="button" href="{{ route('user.edit', $val->id) }}" class="btn btn-primary">
                  <i class="ti-write"></i>
               </a>
                <button type="submit" name="delete" class="btn btn-danger delete-user">
                  <i class="ti-trash"></i>
               </button>
               <a title="phân quyền mở rộng" type="button" href="{{ route('user.permission', $val->id) }}" class="btn btn-danger">
                  <i class="ti-key"></i>
               </a>
            </form>
         </td>
      </tr>
      @endforeach
      @endif
   </tbody>
</table>
