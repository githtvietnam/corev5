<div class="pcoded-content">
   <div class="pcoded-inner-content">
      @include('backend/permission/include/breadcrumb')
   </div>
   <div class="pcoded-inner-content">
      <div class="main-body">
         <div class="page-wrapper">
            <div class="page-body">
               <div class="card">
                  <div class="card-header">
                     <h5>Quản lý danh sách {{ $config['moduleName'] }}</h5>
                  </div>
                  <div class="card-block table-border-style">
                     @include('backend/permission/include/filter')
                     <div class="table-responsive">
                        @include('backend/permission/include/table')
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
