<?php

namespace App\Repositories;

use App\Models\Permission;
use App\Repositories\Interfaces\PermissionRepositoryInterface;

class PermissionRepository extends BaseRepository implements PermissionRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * BaseRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(Permission $model)
    {
        $this->model = $model;
    }

   public function paginatePermission($perpage, $condition){
      return $this->model->where(function($query) use ($condition) {
         if(isset($condition['keyword']) && !empty($condition['keyword'])){
            $query->where('name','LIKE', '%'.$condition['keyword'].'%');
         }
         if(isset($condition['publish']) && $condition['publish'] != 01 ){
            $query->where('publish', '=' , $condition['publish']);
         }
      })
      ->paginate($perpage)->withQueryString()->withPath(BASE_URL.'backend/translate/index');
   }

   public function allByCondition($column = ['*'], $condition){
      return $this->model->where($condition)->get($column);
   }
}
