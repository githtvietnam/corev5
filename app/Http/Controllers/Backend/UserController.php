<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Repositories\Interfaces\UserRepositoryInterface as UserRepository;
use App\Repositories\Interfaces\UserCatalogueRepositoryInterface as UserCatalogueRepository;
use App\Repositories\Interfaces\PermissionRepositoryInterface as PermissionRepository;
use App\Services\Interfaces\UserServiceInterface  as UserService;
use App\Helpers\Helper;

class UserController extends Controller
{


   protected $userService;
   protected $userRepository;
   protected $userCatalogueRepository;
   protected $permissionRepository;
   public $module;

   public function __construct(
      UserService $userService,
      UserRepository $userRepository,
      PermissionRepository $permissionRepository,
      UserCatalogueRepository $userCatalogueRepository,
   ){
      $this->userService = $userService;
      $this->userRepository = $userRepository;
      $this->permissionRepository = $permissionRepository;
      $this->userCatalogueRepository = $userCatalogueRepository;
   }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $user = $this->userService->index($request);
      $config['switchery'] = config('apps.general.switchery');
      $config['js'] = config('apps.user.js');
      $config['meta_title'] = config('apps.user.index_meta_title');
      $config['moduleName'] = config('apps.user.module');
      $template = 'backend.user.user.index';
      return view('backend.dashboard.layout.home', compact('template', 'config' ,'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $userCatalogue = $this->userCatalogueRepository->all();
      $config['js'] = config('apps.user.js');
      $config['ckeditor'] = config('apps.general.ckeditor');
      $config['select2'] = config('apps.general.select2');
      $config['switchery'] = config('apps.general.switchery');
      $config['moduleName'] = config('apps.user.module');
      $config['meta_title'] = config('apps.user.create_meta_title');
      $template = 'backend.user.user.create';
      return view('backend.dashboard.layout.home', compact('template', 'config' ,'userCatalogue'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
      if($this->userService->create($request)){
         return redirect()->route('user.index')->with('success', config('apps.general.success_create'));
      }else{
         return redirect()->route('user.index')->with('error',config('apps.general.error_create'));
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $userCatalogue = $this->userCatalogueRepository->all();
      $user = $this->userRepository->findById($id);
      $permission= makeNewArrayByKey($this->permissionRepository->allByCondition(['id','name','module','route'], ['publish' => 1]));
      $config['js'] = config('apps.user.js');
      $config['ckeditor'] = config('apps.general.ckeditor');
      $config['select2'] = config('apps.general.select2');
      $config['moduleName'] = config('apps.user.module');
      $config['switchery'] = config('apps.general.switchery');
      $config['meta_title'] = config('apps.user.update_meta_title');
      $template = 'backend.user.user.update';
      return view('backend.dashboard.layout.home', compact('template', 'config', 'user','userCatalogue'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      if($this->userService->update($id, $request)){
         return redirect()->route('user.index')->with('success', config('apps.general.success_update'));
      }else{
         return redirect()->route('user.index')->with('error',config('apps.general.error_create'));
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      if($this->userService->delete($id)){
         return redirect()->route('user.index')->with('success', config('apps.general.success_delete'));
      }else{
         return redirect()->route('user.index')->with('error',config('apps.general.error'));
      }
    }

    public function permission($id){
      $user = $this->userRepository->findById($id, ['name','id','user_catalogue_id'], ['user_catalogues']);
      $userCataloguePermission = json_decode($user->user_catalogues->permissions, TRUE);
      $permission= makeNewArrayByKey($this->permissionRepository->allByCondition(['id','name','module','route'], ['publish' => 1]));
      $config['js'] = config('apps.user.js');
      $config['ckeditor'] = config('apps.general.ckeditor');
      $config['select2'] = config('apps.general.select2');
      $config['moduleName'] = config('apps.user.module');
      $config['switchery'] = config('apps.general.switchery');
      $config['meta_title'] = config('apps.user.update_meta_title');
      $template = 'backend.user.user.permission';
      return view('backend.dashboard.layout.home', compact('template', 'config', 'user','userCataloguePermission','permission'));
   }

   public function updatePermission(Request $request, $id){
      if($this->userService->updatePermission($id)){
         return redirect()->route('user.index')->with('success', config('apps.general.success_delete'));
      }else{
         return redirect()->route('user.index')->with('error',config('apps.general.error'));
      }
   }
}
