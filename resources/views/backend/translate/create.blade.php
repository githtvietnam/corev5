<div class="pcoded-content {{  (isset($config['class'])) ? $config['class'] : '' }}">
   <div class="pcoded-inner-content">
      @include('backend/translate/include/breadcrumb')
   </div>

   @include('backend/translate/store', ['method' => 'create'])
</div>
