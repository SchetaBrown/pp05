<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Interfaces\UserRecordServiceInterface;

class IndexController extends Controller
{
    private UserRecordServiceInterface $userRecordService;

    public function __construct(UserRecordServiceInterface $userRecordService)
    {
        $this->userRecordService = $userRecordService;
    }

    public function index()
    {
        return view('pages.index', [
            'userRecords' => $this->userRecordService->getDataForIndexPage()
        ]);
    }
}
