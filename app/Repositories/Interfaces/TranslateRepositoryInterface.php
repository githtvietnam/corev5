<?php

namespace App\Repositories\Interfaces;

/**
 * Interface PostCatalogueServiceInterface
 * @package App\Services\Interfaces
 */
interface TranslateRepositoryInterface extends BaseRepositoryInterface
{
   public function paginateTranslate($perpage, $condition);
}
