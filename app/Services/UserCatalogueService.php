<?php

namespace App\Services;

use App\Services\Interfaces\UserCatalogueServiceInterface;
use App\Repositories\Interfaces\UserCatalogueRepositoryInterface as UserCatalogueRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\UserCatalogue;

/**
 * Class UserCatalogueService
 * @package App\Services
 */
class UserCatalogueService implements UserCatalogueServiceInterface
{

   public $UserCatalogueRepository;

   public function __construct(
      UserCatalogueRepository $UserCatalogueRepository
   ){
      $this->userCatalogueRepository = $UserCatalogueRepository;
   }

   public function index($request){
      $condition['keyword'] = addslashes($request->input('keyword'));
      $condition['publish'] = $request->input('publish');
      $perpage = $request->input('perpage') ?? 20;
      $translate = $this->userCatalogueRepository->paginateUserCatalogue($perpage, $condition);
      return $translate;
   }

   public function create($request){
      DB::beginTransaction();
      try{
         dd($request->all());
         $translate = $this->userCatalogueRepository->create([
            'name' => $request->name,
            'canonical' => $request->canonical,
            'publish' => $request->publish,
            'image' => $request->image,
         ]);

         DB::commit();
         return true;
      }catch(\Exception $e ){
          DB::rollBack();
          Log::error($e->getMessage());
          return false;
      }
   }

   public function update($id, $request){
      DB::beginTransaction();
      try{
         $translate = $this->userCatalogueRepository->update($id, [
            'name' => $request->name,
            'canonical' => $request->canonical,
            'publish' => $request->publish,
            'image' => $request->image,
         ]);

         DB::commit();
         return true;
      }catch(\Exception $e ){
          DB::rollBack();
          Log::error($e->getMessage());
          // echo $e->getMessage();die();
          return false;
      }
   }

   public function delete($id){
      DB::beginTransaction();
      try{
         $translate = $this->userCatalogueRepository->deleteById($id);

         DB::commit();
         return true;
      }catch(\Exception $e ){
          DB::rollBack();
          Log::error($e->getMessage());
          // echo $e->getMessage();die();
          return false;
      }
   }

   public function updateByField($request){
      DB::beginTransaction();
      try{
         $object = $this->userCatalogueRepository->findById($request->id);
         $columnValue = ($object->{$request->column} == 1) ? 0  : 1;

         $translate = $this->userCatalogueRepository->update($request->id, [
            $request->column => $columnValue
         ]);

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
