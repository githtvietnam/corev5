<?php

namespace App\Services;

use App\Services\Interfaces\TranslateServiceInterface;
use App\Repositories\Interfaces\TranslateRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Translate;

/**
 * Class TranslateService
 * @package App\Services
 */
class TranslateService implements TranslateServiceInterface
{

   public $translateRepository;

   public function __construct(
      TranslateRepositoryInterface $translateRepository
   ){
      $this->translateRepository = $translateRepository;
   }

   public function index($request){
      $condition['keyword'] = addslashes($request->input('keyword'));
      $condition['publish'] = $request->input('publish');
      $perpage = $request->input('perpage') ?? 20;
      $translate = $this->translateRepository->paginateTranslate($perpage, $condition);
      return $translate;
   }

   public function create($request){
      DB::beginTransaction();
      try{
         $translate = $this->translateRepository->create([
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
         $translate = $this->translateRepository->update($id, [
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
         $translate = $this->translateRepository->deleteById($id);

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
         $object = $this->translateRepository->findById($request->id);
         $columnValue = ($object->{$request->column} == 1) ? 0  : 1;

         $translate = $this->translateRepository->update($request->id, [
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

   public function changeDefaultLanguage($request){
      $currentLanguageId = \Arr::get(config('app.rootTranslate'), 'id');
      DB::beginTransaction();
      try{
         if($currentLanguageId != $request->id){
            $this->translateRepository->update($currentLanguageId, [
               'default' => 0
            ]);
            $this->translateRepository->update($request->id, [
               'default' => 1
            ]);
         }
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
