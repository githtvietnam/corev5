<div class="pcoded-inner-content f-container">
     <div class="main-body">
        <div class="page-wrapper">
            @if ($errors->any())
            <div class="box-body">
               <div class="alert alert-danger">
                 @foreach ($errors->all() as $error)
                     <p>{{ $error }}</p>
                 @endforeach
               </div>
            </div><!-- /.box-body -->
            @endif
            @php
                $url = ($method == 'create') ? url('backend/user/user/store') : url('backend/user/user/update/'.$user->id);
             @endphp
          <form method="post" action="{{ $url }}" class="form-horizontal box" >
             @csrf
             <div class="page-body">
                <div class="row">
                   <div class="col-lg-8">
                     <div class="ibox">
                        <div class="ibox-title">
                           <div class="uk-flex uk-flex-middle uk-flex-space-between">
                              <div>
                                 <h5>Quản lý {{ config('apps.user.module') }}</h5>
                                 <small class="text-danger">điền đầy đủ các thông tin được mô tả dưới đây</small>
                              </div>
                              <button type="submit" name="create" value="create" class="btn btn-primary block m-b pull-right">Lưu lại</button>
                           </div>

                        </div>
                        <div class="ibox-content table-border-style">
                           @include('backend.user.user.include.general')
                        </div>
                     </div>
                     <button type="submit" name="create" value="create" class="btn btn-primary block m-b pull-right">Lưu lại</button>
                   </div>
                   <div class="col-lg-4">
                      @include('backend.user.user.include.aside')
                   </div>
                </div>
               </div>
             </form>
        </div>
     </div>
</div>
