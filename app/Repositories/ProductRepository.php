<?php

namespace App\Repositories;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductUnit;
use App\Repositories\Interfaces\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    private Product $product;
    private ProductCategory $productCategory;
    private ProductUnit $productUnit;

    public function __construct(Product $product, ProductCategory $productCategory, ProductUnit $productUnit)
    {
        $this->product = $product;
        $this->productCategory = $productCategory;
        $this->productUnit = $productUnit;
    }
    public function get()
    {
        return $this->product;
    }

    public function getProductById($id)
    {
        return $this->product->find($id);
    }

    public function getProductCategories()
    {
        return $this->productCategory->get();
    }

    public function getProductUnits()
    {
        return $this->productUnit->get();
    }
}
