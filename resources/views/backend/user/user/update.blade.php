<div class="pcoded-content {{  (isset($config['class'])) ? $config['class'] : '' }}">
   <div class="pcoded-inner-content">
      @include('backend.user.user.include.breadcrumb')
   <div>

   @include('backend.user.user.store', ['method' => 'update'])
</div>
