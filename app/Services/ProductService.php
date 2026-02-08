<?php

namespace App\Services;

use App\Repositories\Interfaces\MealRepositoryInterface;
use App\Services\Interfaces\ProductServiceInterface;

class ProductService implements ProductServiceInterface
{
    private MealRepositoryInterface $mealRepository;

    public function __construct(MealRepositoryInterface $mealRepository)
    {
        $this->mealRepository = $mealRepository;
    }
}
