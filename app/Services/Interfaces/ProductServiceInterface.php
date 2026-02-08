<?php

namespace App\Services\Interfaces;
use Illuminate\Http\Request;

interface ProductServiceInterface
{
    public function all(Request $request, $pagination = 10);
}
