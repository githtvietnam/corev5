<div class="pcoded-content {{  (isset($config['class'])) ? $config['class'] : '' }}">
   <div class="pcoded-inner-content">
      @include('backend/post/catalogue/include/breadcrumb')
   </div>

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
             <form method="post" action="{{ route('post.catalogue.store') }}" class="form-horizontal box" >
                @csrf
                <div class="page-body">
                   <div class="row">
                      <div class="col-lg-8">
                        <div class="ibox">
                           <div class="ibox-title">
                              <div class="uk-flex uk-flex-middle uk-flex-space-between">
                                 <div>
                                    <h5>Quản lý nhóm thành viên</h5>
                                    <small class="text-danger">điền đầy đủ các thông tin được mô tả dưới đây</small>
                                 </div>
                                 <button type="submit" name="create" value="create" class="btn btn-primary block m-b pull-right">Lưu lại</button>
                              </div>

                           </div>
                           <div class="ibox-content table-border-style">


                              @include('backend/post/catalogue/include/general')

                           </div>
                        </div>
                        @include('backend/post/catalogue/include/album')
                        @include('backend/post/catalogue/include/seo')
                        <button type="submit" name="create" value="create" class="btn btn-primary block m-b pull-right">Lưu lại</button>
                      </div>
                      <div class="col-lg-4">
                          @include('backend/post/catalogue/include/aside')
                      </div>
                   </div>
                  </div>
                </form>
           </div>
        </div>
   </div>
</div>
