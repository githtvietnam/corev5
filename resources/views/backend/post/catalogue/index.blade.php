<div class="pcoded-content">
   <div class="pcoded-inner-content">
      @include('backend/post/catalogue/include/breadcrumb')
   </div>
   <div class="pcoded-inner-content">
      <div class="main-body">
         <div class="page-wrapper">
            <div class="page-body">
               <div class="card">
                  <div class="card-header">
                     <h5>Quản lý danh mục bài viết</h5>
                  </div>
                  <div class="card-block table-border-style">
                     @include('backend/post/catalogue/include/filter')
                     <div class="table-responsive">
                        @include('backend/post/catalogue/include/table')
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
