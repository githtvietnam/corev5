<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTranslateRequest;
use App\Http\Requests\UpdateTranslateRequest;
use App\Services\Interfaces\TranslateServiceInterface as TranslateServiceInterfaces;
use App\Repositories\Interfaces\TranslateRepositoryInterface;
use Gate;

class TranslateController extends Controller
{

   protected $translateService;
   protected $translateRepository;

   public function __construct(
      TranslateServiceInterfaces $translateService,
      TranslateRepositoryInterface $translateRepository
   ){
      $this->translateService = $translateService;
      $this->translateRepository = $translateRepository;
   }

   public function index(Request $request){

      Gate::allows('modules', 'translate_view');

      $translate = $this->translateService->index($request);
      $config['switchery'] = config('apps.general.switchery');
      $config['meta_title'] = config('apps.translate.index_meta_title');
      $config['js'] = 'translate';
      $template = 'backend.translate.index';
      return view('backend.dashboard.layout.home', compact('template', 'config' ,'translate'));
   }

   public function create(){

      Gate::allows('modules', 'translate_create');

      $config['meta_title'] = config('apps.translate.create_meta_title');
      $config['js'] = 'translate';
      $config['ckeditor'] = config('apps.general.ckeditor');
      $config['select2'] = config('apps.general.select2');
      $config['class'] = config('apps.general.fix_class');
      $template = 'backend.translate.create';
      return view('backend.dashboard.layout.home', compact('template', 'config'));
   }

   public function store(StoreTranslateRequest $request){

      Gate::allows('modules', 'translate_create');

      if($this->translateService->create($request)){
         return redirect()->route('translate.index')->with('success', config('apps.general.success_create'));
      }else{
         return redirect()->route('translate.index')->with('error',config('apps.general.error_create'));
      }
   }

   public function edit($id = 0){

      Gate::allows('modules', 'translate_edit');

      $translate = $this->translateRepository->findById($id);
      $config['meta_title'] = config('apps.translate.update_meta_title');
      $config['js'] = 'translate';
      $config['ckeditor'] = config('apps.general.ckeditor');
      $config['select2'] = config('apps.general.select2');
      $config['class'] = config('apps.general.fix_class');
      $template = 'backend.translate.update';
      return view('backend.dashboard.layout.home', compact('template', 'config', 'translate'));
   }

   public function update($id = 0, UpdateTranslateRequest $request){

      Gate::allows('modules', 'translate_edit');

      if($this->translateService->update($id, $request)){
         return redirect()->route('translate.index')->with('success', config('apps.general.success_create'));
      }else{
         return redirect()->route('translate.index')->with('error',config('apps.general.error_create'));
      }
   }

   public function destroy($id, Request $request){

      Gate::allows('modules', 'translate_delete');

      if($this->translateService->delete($id)){
         return redirect()->route('translate.index')->with('success', config('apps.general.success_delete'));
      }else{
         return redirect()->route('translate.index')->with('error',config('apps.general.error'));
      }
   }


}
