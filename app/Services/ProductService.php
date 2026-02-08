<?php

namespace App\Services;

use App\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Http\Request;
use App\Services\Interfaces\ProductServiceInterface;

class ProductService implements ProductServiceInterface
{
    private Product $product;
    private ProductRepositoryInterface $productRepository;

    public function __construct(Product $product, ProductRepositoryInterface $productRepository)
    {
        $this->product = $product;
        $this->productRepository = $productRepository;
    }

    public function all(Request $request, $pagination = 10)
    {
        $products = $this->productRepository->get()->query();
        if ($request->has('search_category')) {
            if ($request->search_category !== '#') {
                $products->where('product_category_id', $request->search_category);
            }
        }

        return $products->paginate($pagination);
    }
}
