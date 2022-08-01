<?php

namespace App\Repositories\Interfaces;

/**
 * Interface PostCatalogueServiceInterface
 * @package App\Services\Interfaces
 */
interface PostCatalogueRepositoryInterface
{
   public function getAllPostCatalogues();
   public function getPostCatalogueById($id);
   public function delete($id);
   public function create(array $data);
   public function update($orderId, array $data);
   public function createDataPivot($model, array $data);
}
