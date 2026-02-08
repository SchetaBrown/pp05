<?php

namespace App\Repositories\Interfaces;

interface ProductRepositoryInterface
{
    public function get();
    public function getProductCategories();
    public function getProductUnits();
    public function getProductById($id);
}
