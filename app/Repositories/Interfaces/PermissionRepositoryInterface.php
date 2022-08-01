<?php

namespace App\Repositories\Interfaces;

/**
 * Interface PostCatalogueServiceInterface
 * @package App\Services\Interfaces
 */
interface PermissionRepositoryInterface extends BaseRepositoryInterface
{
   public function paginatePermission($perpage, $condition);
   public function allByCondition($column = ['*'], $condition);
}
