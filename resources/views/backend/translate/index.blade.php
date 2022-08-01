<div class="pcoded-content">
   <div class="pcoded-inner-content">
      @include('backend/translate/include/breadcrumb')
   </div>
   <div class="pcoded-inner-content">
      <div class="main-body">
         <div class="page-wrapper">
            <div class="page-body">
               <div class="card">
                  <div class="card-header">
                     <h5>Quản lý ngôn ngữ</h5>
                  </div>
                  <div class="card-block table-border-style">
                     @include('backend/translate/include/filter')
                     <div class="table-responsive">
                        @include('backend/translate/include/table')
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
