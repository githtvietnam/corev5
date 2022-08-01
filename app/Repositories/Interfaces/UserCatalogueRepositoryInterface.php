<?php

namespace App\Repositories\Interfaces;

/**
 * Interface PostCatalogueServiceInterface
 * @package App\Services\Interfaces
 */
interface UserCatalogueRepositoryInterface extends BaseRepositoryInterface
{
   public function paginateUserCatalogue($perpage, $condition);
}
