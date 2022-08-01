<?php

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
