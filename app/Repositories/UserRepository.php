<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository extends BaseRepository implements UserRepositoryInterface
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
    public function __construct(User $model)
    {
        $this->model = $model;
    }

   public function paginateUser($perpage, $condition){
      return $this->model->where(function($query) use ($condition) {
         if(isset($condition['keyword']) && !empty($condition['keyword'])){
            $query->where('name','LIKE', '%'.$condition['keyword'].'%')->orWhere('email','LIKE', '%'.$condition['keyword'].'%')->orWhere('phone','LIKE', '%'.$condition['keyword'].'%')->orWhere('address','LIKE', '%'.$condition['keyword'].'%');
         }
         if(isset($condition['publish']) && $condition['publish'] != 01 ){
            $query->where('publish', '=' , $condition['publish']);
         }
      })
      ->paginate($perpage)->withQueryString()->withPath(BASE_URL.'backend.user.catalogue.index');
   }
}
