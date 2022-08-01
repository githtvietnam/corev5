<?php

namespace App\Services;

use App\Services\Interfaces\PermissionServiceInterface;
use App\Repositories\Interfaces\PermissionRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Permission;

/**
 * Class PermissionService
 * @package App\Services
 */
class PermissionService implements PermissionServiceInterface
{

   public $permisisonRepository;

   public function __construct(
      PermissionRepositoryInterface $permisisonRepository
   ){
      $this->permisisonRepository = $permisisonRepository;
   }

   public function index($request){

      $condition['keyword'] = addslashes($request->input('keyword'));
      $condition['publish'] = $request->input('publish');
      $perpage = $request->input('perpage') ?? 20;
      $permisison = $this->permisisonRepository->paginatePermission($perpage, $condition);
      return $permisison;
   }

   public function create($request){
      DB::beginTransaction();
      try{;

         $permisison = $this->permisisonRepository->create($request->except(['_token','create']));

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
         $permisison = $this->permisisonRepository->update($id, $request->except(['_token','create']));

         DB::commit();
         return true;
      }catch(\Exception $e ){
          DB::rollBack();
          // Log::error($e->getMessage());
          echo $e->getMessage();die();
          return false;
      }
   }

   public function delete($id){
      DB::beginTransaction();
      try{
         $permisison = $this->permisisonRepository->deleteById($id);

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
         $object = $this->permisisonRepository->findById($request->id);
         $columnValue = ($object->{$request->column} == 1) ? 0  : 1;

         $permisison = $this->permisisonRepository->update($request->id, [
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
