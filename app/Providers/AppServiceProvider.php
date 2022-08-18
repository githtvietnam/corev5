<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Translate;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Log;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */

     public $bindings = [
         'App\Services\Interfaces\PostCatalogueServiceInterface' => 'App\Services\PostCatalogueService',
         'App\Services\Interfaces\TranslateServiceInterface' => 'App\Services\TranslateService',
         'App\Services\Interfaces\PermissionServiceInterface' => 'App\Services\PermissionService',
         'App\Services\Interfaces\UserCatalogueServiceInterface' => 'App\Services\UserCatalogueService',
         'App\Services\Interfaces\UserServiceInterface' => 'App\Services\UserService',
     ];


   public function register()
   {
      foreach($this->bindings as $key => $val)
      {
        $this->app->bind($key, $val);
      }

      $this->app->register(RepositoryServiceProvider::class);


   }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
   public function boot()
   {
      DB::enableQueryLog();
      if(Schema::hastable('translates')){
         Config::set('app.rootTranslate', Translate::select('id','name')->where('default', 1)->get()->first() ?? []);
      }
      Log::debug(DB::getQueryLog());

   }
}
