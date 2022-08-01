<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Interfaces\TranslateServiceInterface;

class TranslateController extends Controller
{

   protected $translateService;

   public function __construct(TranslateServiceInterface $translateService){
      $this->translateService = $translateService;
   }

   public function updateByField(Request $request){
      if($this->translateService->updateByField($request)){
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

   public function changeDefaultLanguage(Request $request){
      if($this->translateService->changeDefaultLanguage($request)){
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
