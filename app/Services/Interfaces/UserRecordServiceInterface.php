<?php

namespace App\Services\Interfaces;

use App\Models\UserRecord;

interface UserRecordServiceInterface
{
    public function getDataForIndexPage();
    public function destroyProductFromDiet(UserRecord $product);
}
