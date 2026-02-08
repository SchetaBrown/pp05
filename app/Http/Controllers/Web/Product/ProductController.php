<?php

namespace App\Http\Controllers\Web\Product;

use App\Models\Meal;
use App\Models\Product;
use App\Models\UserRecord;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Interfaces\ProductServiceInterface;
use App\Services\Interfaces\UserRecordServiceInterface;
use App\Repositories\Interfaces\ProductRepositoryInterface;

class ProductController extends Controller
{
    private UserRecordServiceInterface $userRecordService;
    private ProductServiceInterface $productService;
    private ProductRepositoryInterface $productRepository;

    public function __construct(
        UserRecordServiceInterface $userRecordService,
        ProductServiceInterface $productService,
        ProductRepositoryInterface $productRepository
    ) {
        $this->userRecordService = $userRecordService;
        $this->productService = $productService;
        $this->productRepository = $productRepository;
    }
    public function index(Request $request)
    {
        return view('pages.product.index', [
            'products' => $this->productService->all($request, 15)->withQueryString(),
            'categories' => $this->productRepository->getProductCategories(),
            'units' => $this->productRepository->getProductUnits(),
            'meals' => Meal::get(),
        ]);
    }

    public function store(Request $request, Product $product)
    {
        $this->userRecordService->setUserRecord($request, $product);

        return redirect()->route('index');
    }

    public function destroy(UserRecord $record)
    {
        $this->userRecordService->destroyProductFromDiet($record);
        return redirect()->back()->with("success", "Продукт удален из рациона");
    }
}
