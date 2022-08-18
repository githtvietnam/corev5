<div class="row mb20">
   <div class="col-lg-{{ ($method == 'create') ? '6' : '12' }}">
      <div class="form-input">
         <label class="control-label text-left">
            <span>Họ Tên <b class="text-danger">(*)</b></span>
         </label>
            <input type="text" name="name" value="{{ old('name', (isset($user->name)) ? $user->name : '') }}"  class="form-control" placeholder="" autocomplete="off" id="title" data-flag="0">
      </div>
   </div>
   @if($method == 'create')
   <div class="col-lg-6">
      <div class="form-input">
         <label class="control-label text-left">
            <span>Mật khẩu</span>
         </label>
            <input type="password" name="password" value="{{ old('password', (isset($user->password)) ? $user->password : '') }}"  class="form-control" placeholder="" autocomplete="off" >
      </div>
   </div>
   @endif
</div>

<div class="row mb20">
   <div class="col-lg-6">
      <div class="form-input">
         <label class="control-label text-left">
            <span>Email <b class="text-danger">(*)</b></span>
         </label>
            <input type="text" name="email" value="{{ old('email', (isset($user->email)) ? $user->email : '') }}"  class="form-control" placeholder="" autocomplete="off">
      </div>
   </div>
   <div class="col-lg-6">
      <div class="form-input">
         <label class="control-label text-left">
            <span>Giới tính</span>
         </label>
            <input type="text" name="gender" value="{{ old('gender', (isset($user->gender)) ? $user->gender : '') }}"  class="form-control" placeholder="" autocomplete="off" >
      </div>
   </div>
</div>
<div class="row">
   <div class="col-lg-6">
      <div class="form-input">
         <label class="control-label text-left">
            <span>Địa chỉ </span>
         </label>
            <input type="text" name="address" value="{{ old('address', (isset($user->address)) ? $user->address : '') }}"  class="form-control" placeholder="" autocomplete="off">
      </div>
   </div>
   <div class="col-lg-6">
      <div class="form-input">
         <label class="control-label text-left">
            <span>Số điện thoại</span>
         </label>
            <input type="text" name="phone" value="{{ old('phone', (isset($user->phone)) ? $user->phone : '') }}"  class="form-control" placeholder="" autocomplete="off" >
      </div>
   </div>
</div>
