<?php

namespace App\Repositories;

use App\Models\UserCatalogue;
use App\Repositories\Interfaces\UserCatalogueRepositoryInterface;

class UserCatalogueRepository extends BaseRepository implements UserCatalogueRepositoryInterface
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
    public function __construct(UserCatalogue $model)
    {
        $this->model = $model;
    }

   public function paginateUserCatalogue($perpage, $condition){
      return $this->model->where(function($query) use ($condition) {
         if(isset($condition['keyword']) && !empty($condition['keyword'])){
            $query->where('name','LIKE', '%'.$condition['keyword'].'%');
         }
         if(isset($condition['publish']) && $condition['publish'] != 01 ){
            $query->where('publish', '=' , $condition['publish']);
         }
      })
      ->paginate($perpage)->withQueryString()->withPath(BASE_URL.'backend.user.catalogue.index');
   }
}
