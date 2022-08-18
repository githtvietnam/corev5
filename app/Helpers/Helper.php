<?php

use Illuminate\Support\Facades\Auth;

function makeNewArrayByKey($payload){
   $newArray = [];
   foreach($payload as $key => $val){
      $newArray[$val->module][] = [
         'id' => $val->id,
         'name' => $val->name,
         'route' => $val->route,
         'module' => $val->module
      ];
   }
   return $newArray;
}

function getUserInformation(){
   $user = Auth::user();
   return $user;
}
