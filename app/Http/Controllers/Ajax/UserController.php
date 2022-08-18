<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Interfaces\UserServiceInterface;

class UserController extends Controller
{

   protected $userService;

   public function __construct(UserServiceInterface $userService){
      $this->userService = $userService;
   }

   public function updateByField(Request $request){
      if($this->userService->updateByField($request)){
         echo json_encode([
            'error' => 0,
            'message' => config('apps.general.success_update')
         ]);
      }else{
         echo json_encode([
            'error' => 1,
            'message' => config('apps.general.error')
         ]);
      }
      die();
   }

}
