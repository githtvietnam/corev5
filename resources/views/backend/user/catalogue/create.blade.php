<div class="pcoded-content {{  (isset($config['class'])) ? $config['class'] : '' }}">
   <div class="pcoded-inner-content">
      @include('backend/user/catalogue/include/breadcrumb')
   </div>

   @include('backend/user/catalogue/store', ['method' => 'create'])
</div>
