<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserCatalogueRequest;
use App\Repositories\Interfaces\UserCatalogueRepositoryInterface as UserCatalogueRepository;
use App\Repositories\Interfaces\PermissionRepositoryInterface as PermissionRepository;
use App\Services\Interfaces\UserCatalogueServiceInterface  as UserCatalogueService;
use App\Helpers\Helper;

class UserCatalogueController extends Controller
{


   protected $userCatalogueService;
   protected $userCatalogueRepository;
   protected $permissionRepository;
   public $module;

   public function __construct(
      UserCatalogueService $userCatalogueService,
      UserCatalogueRepository $userCatalogueRepository,
      PermissionRepository $permissionRepository,
   ){
      $this->userCatalogueService = $userCatalogueService;
      $this->userCatalogueRepository = $userCatalogueRepository;
      $this->permissionRepository = $permissionRepository;
   }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $userCatalogue = $this->userCatalogueService->index($request);
      $config['switchery'] = config('apps.general.switchery');
      $config['js'] = config('apps.general.js');
      $config['meta_title'] = config('apps.user_catalogue.index_meta_title');
      $config['moduleName'] = config('apps.user_catalogue.module');
      $template = 'backend.user.catalogue.index';
      return view('backend.dashboard.layout.home', compact('template', 'config' ,'userCatalogue'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $permission= makeNewArrayByKey($this->permissionRepository->allByCondition(['id','name','module','route'], ['publish' => 1]));
      $config['js'] = 'user_catalogue';
      $config['ckeditor'] = config('apps.general.ckeditor');
      $config['select2'] = config('apps.general.select2');
      $config['switchery'] = config('apps.general.switchery');
      $config['moduleName'] = config('apps.user_catalogue.module');
      $config['meta_title'] = config('apps.user_catalogue.create_meta_title');
      $template = 'backend.user.catalogue.create';
      return view('backend.dashboard.layout.home', compact('template', 'config', 'permission'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserCatalogueRequest $request)
    {
      if($this->userCatalogueService->create($request)){
         return redirect()->route('user_catalogue.index')->with('success', config('apps.general.success_create'));
      }else{
         return redirect()->route('user_catalogue.index')->with('error',config('apps.general.error_create'));
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
      $userCatalogue = $this->userCatalogueRepository->findById($id);
      $config['js'] = 'user_catalogue';
      $config['ckeditor'] = config('apps.general.ckeditor');
      $config['select2'] = config('apps.general.select2');
      $config['class'] = config('apps.general.fix_class');
      $config['moduleName'] = config('apps.user_catalogue.module');
      $config['meta_title'] = config('apps.user_catalogue.update_meta_title');
      $template = 'backend.user.catalogue.update';
      return view('backend.dashboard.layout.home', compact('template', 'config', 'userCatalogue'));
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
      if($this->userCatalogueService->update($id, $request)){
         return redirect()->route('user_catalogue.index')->with('success', config('apps.general.success_create'));
      }else{
         return redirect()->route('user_catalogue.index')->with('error',config('apps.general.error_create'));
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
      if($this->userCatalogueService->delete($id)){
         return redirect()->route('user_catalogue.index')->with('success', config('apps.general.success_delete'));
      }else{
         return redirect()->route('user_catalogue.index')->with('error',config('apps.general.error'));
      }
    }
}
