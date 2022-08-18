<div class="pcoded-content">
   <div class="pcoded-inner-content">
      @include('backend.user.user.include.breadcrumb')
   </div>
   <div class="pcoded-inner-content">
      <div class="main-body">
         <div class="page-wrapper">
            <div class="page-body">
               <div class="card">
                  <div class="card-header">
                     <h5>Quản lý {{ config('apps.user.module') }}</h5>
                  </div>
                  <div class="card-block table-border-style">
                     @include('backend.user.user.include.filter')
                     <div class="table-responsive">
                        @include('backend.user.user.include.table')
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
