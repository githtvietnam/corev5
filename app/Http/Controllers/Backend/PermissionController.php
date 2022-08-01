<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StorePermissionRequest;
use App\Repositories\Interfaces\PermissionRepositoryInterface as PermissionRepository;
use App\Services\Interfaces\PermissionServiceInterface  as PermissonService;

class PermissionController extends Controller
{


   protected $permissionService;
   protected $permissionRepository;
   public $module;

   public function __construct(
      PermissonService $permissionService,
      PermissionRepository $permissionRepository,
   ){
      $this->permissionService = $permissionService;
      $this->permissionRepository = $permissionRepository;
   }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $permission = $this->permissionService->index($request);
      $config['switchery'] = config('apps.general.switchery');
      $config['js'] = config('apps.general.js');
      $config['meta_title'] = config('apps.permission.index_meta_title');
      $config['moduleName'] = config('apps.permission.module');
      $template = 'backend.permission.index';
      return view('backend.dashboard.layout.home', compact('template', 'config' ,'permission'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $config['js'] = 'permission';
      $config['ckeditor'] = config('apps.general.ckeditor');
      $config['select2'] = config('apps.general.select2');
      $config['class'] = config('apps.general.fix_class');
      $config['moduleName'] = config('apps.permission.module');
      $config['meta_title'] = config('apps.permission.create_meta_title');
      $template = 'backend.permission.create';
      return view('backend.dashboard.layout.home', compact('template', 'config'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePermissionRequest $request)
    {
      if($this->permissionService->create($request)){
         return redirect()->route('permission.index')->with('success', config('apps.general.success_create'));
      }else{
         return redirect()->route('permission.index')->with('error',config('apps.general.error_create'));
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
      $permission = $this->permissionRepository->findById($id);
      $config['js'] = 'permission';
      $config['ckeditor'] = config('apps.general.ckeditor');
      $config['select2'] = config('apps.general.select2');
      $config['class'] = config('apps.general.fix_class');
      $config['moduleName'] = config('apps.permission.module');
      $config['meta_title'] = config('apps.permission.update_meta_title');
      $template = 'backend.permission.update';
      return view('backend.dashboard.layout.home', compact('template', 'config', 'permission'));
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
      if($this->permissionService->update($id, $request)){
         return redirect()->route('permission.index')->with('success', config('apps.general.success_create'));
      }else{
         return redirect()->route('permission.index')->with('error',config('apps.general.error_create'));
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
      if($this->permissionService->delete($id)){
         return redirect()->route('permission.index')->with('success', config('apps.general.success_delete'));
      }else{
         return redirect()->route('permission.index')->with('error',config('apps.general.error'));
      }
    }
}
