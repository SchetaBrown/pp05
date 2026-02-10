<?php

namespace App\Services\Interfaces;

use App\Models\UserRecord;
use Illuminate\Http\Request;

interface UserRecordServiceInterface
{
    public function getDataForIndexPage(Request $request);
    public function destroyProductFromDiet(UserRecord $product);
    public function setUserRecord(Request $request, $product);
}
