<?php

namespace App\Services;

use App\Services\Interfaces\PostCatalogueServiceInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Repositories\Interfaces\PostCatalogueRepositoryInterface;
use App\Classes\Nestedsetbie;

/**
 * Class PostCatalogueService
 * @package App\Services
 */
class PostCatalogueService implements PostCatalogueServiceInterface
{

   public $postCatalogueRepository;
   public $nestedsetbie;

   public function __construct(
      PostCatalogueRepositoryInterface $postCatalogueRepository
   ){
      $this->postCatalogueRepository = $postCatalogueRepository;
      $this->nestedsetbie = new Nestedsetbie([
         'table' => 'post_catalogues',
         'foreignkey' => 'post_catalogue_id',
         'translate_id' => 1
      ]);
   }

   public function index($request){
      DB::beginTransaction();
      try{
         $listPostCatalogue = $this->postCatalogueRepository->getAllPostCatalogue();
         return $listPostCatalogue;
      }catch(\Exception $e ){
          DB::rollBack();
          Log::error($e->getMessage());
          // echo $e->getMessage();die();
          return false;
      }
   }

   public function create($request){

      DB::beginTransaction();
      try{
         $postCatalogue = $this->postCatalogueRepository->create([
            'parentid' => $request->parentid,
            'publish' => $request->publish,
            'image' => $request->image,
            'album' => $request->album,
            'script' => $request->script,
            'userid_created' => 1,
         ]);
         if($postCatalogue->id > 0){
            $except = ['parentid','publish','image','album','script','create','_token'];
            $translate = $request->except($except);
            $translate['translate_id'] = 1;
            $response = $this->postCatalogueRepository->createDataPivot($postCatalogue, $translate);
         }

         $this->nestedsetbie->Get('level ASC, order ASC');
         $this->nestedsetbie->Recursive(0, $this->nestedsetbie->Set());
         $this->nestedsetbie->Action();


         DB::commit();
         return true;
      }catch(\Exception $e ){
          DB::rollBack();
          // Log::error($e->getMessage());
          echo $e->getMessage();die();
          return false;
      }
   }

}
