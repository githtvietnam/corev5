<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Interfaces\UserCatalogueServiceInterface as UserCatalogueService;

class UserCatalogueController extends Controller
{

   protected $userCatalogueService;

   public function __construct(UserCatalogueService $userCatalogueService){
      $this->userCatalogueService = $userCatalogueService;
   }
   public function updateUserCatalogueStatus (Request $request){

      if($this->userCatalogueService->updateUserCatalogueStatus($request)){
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

   public function changeUserStatusWhenUserCatalogueChangeStatus(){
      
   }
}
