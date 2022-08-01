<?php

namespace App\Repositories;

use App\Models\Translate;
use App\Repositories\Interfaces\TranslateRepositoryInterface;

class TranslateRepository extends BaseRepository implements TranslateRepositoryInterface
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
    public function __construct(Translate $model)
    {
        $this->model = $model;
    }

   public function paginateTranslate($perpage, $condition){
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
}
