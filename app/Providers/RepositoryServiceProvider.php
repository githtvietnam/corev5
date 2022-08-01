<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */

     public $bindings = [
         'App\Repositories\Interfaces\TranslateRepositoryInterface' => 'App\Repositories\TranslateRepository',
         'App\Repositories\Interfaces\PermissionRepositoryInterface' => 'App\Repositories\PermissionRepository',
         'App\Repositories\Interfaces\UserCatalogueRepositoryInterface' => 'App\Repositories\UserCatalogueRepository',
     ];

   public function register()
   {
      foreach($this->bindings as $key => $val)
      {
         $this->app->bind($key, $val);
      }
   }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
