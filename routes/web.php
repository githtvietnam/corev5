<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\PostCatalogueController;
use App\Http\Controllers\Backend\TranslateController;
use App\Http\Controllers\Backend\UserCatalogueController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Ajax\TranslateController as AjaxTranslateController;
use App\Http\Controllers\Ajax\PermissionController as AjaxPermissionController;
use App\Http\Controllers\Ajax\UserCatalogueController as AjaxUserCatalogueController;
use App\Http\Controllers\Ajax\UserController as AjaxUserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/* DASHBOARD*/
Route::get('backend/dashboard/index', [DashboardController::class, 'index'])->name('dashboard.index');
//Neu can dang nhap moi xu dung duoc module thi cho het vao trong group nay
Route::group(['middleware' => 'admin.verified'], function() {

   Route::get('backend/dashboard/index', [DashboardController::class, 'index'])->name('dashboard.index');


   /* POST CATALOGUE ROUTE */
   Route::get('backend/post/catalogue/index', [PostCatalogueController::class, 'index'])->name('post.catalogue.index');
   Route::get('backend/post/catalogue/create', [PostCatalogueController::class, 'create'])->name('post.catalogue.create');
   Route::post('backend/post/catalogue/store', [PostCatalogueController::class, 'store'])->name('post.catalogue.store');
   Route::get('backend/post/catalogue/edit', [PostCatalogueController::class, 'edit'])->name('post.catalogue.edit');
   Route::get('backend/post/catalogue/destroy', [PostCatalogueController::class, 'create'])->name('post.catalogue.destroy');


   /* TRANSLATE */
   // Trường hợp này anh nên có 1 route:group bao xung quanh đường dẫn admin nhé.
   Route::get('backend/translate/index', [TranslateController::class, 'index'])->name('translate.index');
   Route::get('backend/translate/create', [TranslateController::class, 'create'])->name('translate.create');
   Route::post('backend/translate/store', [TranslateController::class, 'store'])->name('translate.store');
   Route::get('backend/translate/edit/{id}', [TranslateController::class, 'edit'])->where(['id' => '[0-9]+'])->name('translate.edit');
   Route::post('backend/translate/update/{id}', [TranslateController::class, 'update'])->where(['id' => '[0-9]+'])->name('translate.update');
   Route::delete('/backend/translate/destroy/{id}', [TranslateController::class, 'destroy'])->name('translate.destroy');
   Route::post('ajax/translate/uploadByField', [AjaxTranslateController::class, 'updateByField'])->name('system.uploadByField');
   Route::post('ajax/translate/changeDefaultLanguage', [AjaxTranslateController::class, 'changeDefaultLanguage'])->name('system.changeDefaultLanguage');




   Route::group(['prefix' => 'backend/user'], function () {
      /* USER CATALOGUE */
      Route::get('catalogue/index', [UserCatalogueController::class, 'index'])->name('user.catalogue.index');
      Route::get('catalogue/create', [UserCatalogueController::class, 'create'])->name('user.catalogue.create');
      Route::post('catalogue/store', [UserCatalogueController::class, 'store'])->name('user.catalogue.store');
      Route::get('catalogue/edit/{id}', [UserCatalogueController::class, 'edit'])->where(['id' => '[0-9]+'])->name('user.catalogue.edit');
      Route::post('catalogue/update/{id}', [UserCatalogueController::class, 'update'])->where(['id' => '[0-9]+'])->name('user.catalogue.update');
      Route::delete('catalogue/destroy/{id}', [UserCatalogueController::class, 'destroy'])->name('user.catalogue.destroy');

      Route::get('user/index', [UserController::class, 'index'])->name('user.index');
      Route::get('user/create', [UserController::class, 'create'])->name('user.create');
      Route::post('user/store', [UserController::class, 'store'])->name('user.store');
      Route::get('user/edit/{id}', [UserController::class, 'edit'])->where(['id' => '[0-9]+'])->name('user.edit');
      Route::post('user/update/{id}', [UserController::class, 'update'])->where(['id' => '[0-9]+'])->name('user.update');
      Route::delete('user/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
      Route::get('user/permission/{id}', [UserController::class, 'permission'])->where(['id' => '[0-9]+'])->name('user.permission');
      Route::post('user/update/permission/{id}', [UserController::class, 'updatePermission'])->where(['id' => '[0-9]+'])->name('user.update.permission');

   });

   Route::post('ajax/user/catalogue/updateUserCatalogueStatus', [AjaxUserCatalogueController::class, 'updateUserCatalogueStatus'])->name('ajax.user.catalogue.update_user_status');
   Route::post('ajax/user/uploadByField', [AjaxUserController::class, 'updateByField'])->name('user.uploadByField');


   /*PERMISISON*/
   Route::group(['prefix' => 'backend/permission'], function () {
      Route::get('index', [PermissionController::class, 'index'])->name('permission.index');
      Route::get('create', [PermissionController::class, 'create'])->name('permission.create');
      Route::post('store', [PermissionController::class, 'store'])->name('permission.store');
      Route::get('edit/{id}', [PermissionController::class, 'edit'])->where(['id' => '[0-9]+'])->name('permission.edit');
      Route::post('update/{id}', [PermissionController::class, 'update'])->where(['id' => '[0-9]+'])->name('permission.update');
      Route::delete('/destroy/{id}', [PermissionController::class, 'destroy'])->name('permission.destroy');
   });


   Route::post('ajax/permission/uploadByField', [AjaxPermissionController::class, 'updateByField'])->name('permission.uploadByField');

   Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');
});

/* AUTHENTICATION */
Route::get('admin/login', [AuthController::class, 'index'])->name('auth.index');
Route::post('login', [AuthController::class, 'login'])->name('auth.login');
