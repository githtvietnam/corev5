<div class="pcoded-content">
   <div class="pcoded-inner-content">
      @include('backend/user/catalogue/include/breadcrumb')
   </div>
   <div class="pcoded-inner-content">
      <div class="main-body">
         <div class="page-wrapper">
            <div class="page-body">
               <div class="card">
                  <div class="card-header">
                     <h5>Quản lý nhóm thành viên</h5>
                  </div>
                  <div class="card-block table-border-style">
                     @include('backend/user/catalogue/include/filter')
                     <div class="table-responsive">
                        @include('backend/user/catalogue/include/table')
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
