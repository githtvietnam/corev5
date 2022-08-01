<?php

namespace App\Repositories;
use Illuminate\Support\Facades\DB;

use App\Repositories\Interfaces\PostCatalogueRepositoryInterface;
use App\Models\PostCatalogue;
//use Your Model

/**
 * Class PostCatalogueRepository.
 */
class PostCatalogueRepository implements PostCatalogueRepositoryInterface
{
   public function getAllPostCatalogue()
   {
      $query = PostCatalogue::query();
      return $query->select(
         'post_catalogues.id',
         'post_catalogues.level',
         'post_catalogues.lft',
         'post_catalogues.rgt',
         'post_catalogues.publish',
         'post_catalogues.created_at',
         'post_catalogue_translate.name'
      )
      ->from('post_catalogues')
      ->join('post_catalogue_translate','post_catalogues.id','=','post_catalogue_translate.post_catalogue_id')
      ->where([
         'post_catalogue_translate.translate_id' => 1,
      ])
      ->orderBy('post_catalogues.lft','asc')
      ->paginate(config('apps.general.pagination'))
      ->withQueryString()
      ->withPath(BASE_URL.'public/backend/post/catalogue/index');
   }



   public function getAllPostCatalogues()
   {
      return PostCatalogue::all();
   }

   public function getPostCatalogueById($id)
   {

   }

   public function delete($id)
   {
      return PostCatalogue::where('id', $id)->delete();
   }

   public function create(array $data)
   {
      return PostCatalogue::create($data);
   }

   public function update($id, array $data)
   {
      return PostCatalogue::where(['id' => $id])->update($data);
   }

   public function createDataPivot($model, array $data){
      return $model->translates()->attach($model->id, $data);
   }
}
