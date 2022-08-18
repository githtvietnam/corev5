<?php

namespace App\Services;

use App\Services\Interfaces\UserServiceInterface;
use App\Repositories\Interfaces\UserRepositoryInterface as UserRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserService
 * @package App\Services
 */
class UserService implements UserServiceInterface
{

   public $userRepository;

   public function __construct(
      UserRepository $userRepository
   ){
      $this->userRepository = $userRepository;
   }

   public function index($request){
      $condition['keyword'] = addslashes($request->input('keyword'));
      $condition['publish'] = $request->input('publish');
      $perpage = $request->input('perpage') ?? 20;
      $user = $this->userRepository->paginateUser($perpage, $condition);
      return $user;
   }

   public function create($request){
      DB::beginTransaction();
      try{
         // dd($request->all());
         $insert = $request->except('_token','create','password');
         $insert['password'] = bcrypt($request->password);
         // dd($insert);
         $user = $this->userRepository->create($insert);
         DB::commit();
         return true;
      }catch(\Exception $e ){
          DB::rollBack();
          // Log::error($e->getMessage());
          echo $e->getMessage();die();
          return false;
      }
   }

   public function update($id, $request){
      DB::beginTransaction();
      try{
         $update = $request->except(['_token','create']);

         $user = $this->userRepository->update($id, $update);

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
         $user = $this->userRepository->deleteById($id);

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
         $object = $this->userRepository->findById($request->id);
         $columnValue = ($object->{$request->column} == 1) ? 0  : 1;

         $translate = $this->userRepository->update($request->id, [
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
