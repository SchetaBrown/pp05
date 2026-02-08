<?php

namespace App\Http\Controllers\Web\Product;

use App\Models\UserRecord;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Interfaces\ProductServiceInterface;
use App\Services\Interfaces\UserRecordServiceInterface;

class ProductController extends Controller
{
    private UserRecordServiceInterface $userRecordService;

    public function __construct(UserRecordServiceInterface $userRecordService)
    {
        $this->userRecordService = $userRecordService;
    }
    public function index()
    {

    }

    public function destroy(UserRecord $record)
    {
        $this->userRecordService->destroyProductFromDiet($record);
        return redirect()->back()->with("success", "Продукт удален из рациона");
    }
}
