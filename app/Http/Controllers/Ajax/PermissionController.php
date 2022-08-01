<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Interfaces\PermissionServiceInterface;

class PermissionController extends Controller
{

   protected $permissionService;

   public function __construct(PermissionServiceInterface $permissionService){
      $this->permissionService = $permissionService;
   }

   public function updateByField(Request $request){
      if($this->permissionService->updateByField($request)){
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
