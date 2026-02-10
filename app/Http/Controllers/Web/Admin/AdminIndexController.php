<?php

namespace App\Http\Controllers\Web\Admin;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminIndexController extends Controller
{
    public function __invoke()
    {
        return view('pages.admin.dashboard', [
            'user_count' => User::count(),
            'product_count' => Product::count(),
        ]);
    }
}
