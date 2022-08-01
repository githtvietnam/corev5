<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostCatalogueRequest;
use App\Services\Interfaces\PostCatalogueServiceInterface as PostCatalogueServiceInterfaces;
use App\Classes\Nestedsetbie;


class PostCatalogueController extends Controller
{

   protected $postCatalogueService;

   public function __construct(PostCatalogueServiceInterfaces $postCatalogueService){
      $this->postCatalogueService = $postCatalogueService;
      $this->nestedsetbie = new Nestedsetbie([
         'table' => 'post_catalogues',
         'foreignkey' => 'post_catalogue_id',
         'translate_id' => 1
      ]);
   }

   public function index(Request $request){

      $postCatalogue = $this->postCatalogueService->index($request);

      $config['switchery'] = config('apps.general.switchery');
      $config['meta_title'] = config('apps.post_catalogue.index_meta_title');
      $config['js'] = 'post_catalogue';
      $template = 'backend/post/catalogue/index';
      return view('backend/dashboard/layout/home', compact('template', 'config' , 'postCatalogue'));
   }

   public function create(){

      $config['meta_title'] = config('apps.post_catalogue.create_meta_title');
      $config['ckeditor'] = config('apps.general.ckeditor');
      $config['select2'] = config('apps.general.select2');
      $config['class'] = config('apps.general.fix_class');
      $config['dropdown'] = $this->nestedsetbie->Dropdown();
      $template = 'backend/post/catalogue/create';
      return view('backend/dashboard/layout/home', compact('template', 'config'));
   }

   public function store(StorePostCatalogueRequest $request){
      if($this->postCatalogueService->create($request)){
         return redirect()->route('post.catalogue.index')->with('success', config('apps.post_catalogue.success_message'));
      }else{
         return redirect()->route('post.catalogue.index')->with('error',config('apps.post_catalogue.error_message'));
      }
   }

   public function edit(){
      $template = 'backend/post/catalogue/create';
      return view('backend/dashboard/layout/home', compact('template'));
   }

   public function update(){

   }

   public function destroy(){

   }




}
