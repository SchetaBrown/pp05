<?php

namespace App\Repositories;

use App\Models\Meal;
use App\Repositories\Interfaces\MealRepositoryInterface;

class MealRepository implements MealRepositoryInterface
{
    private Meal $meal;

    public function __construct()
    {
        $this->meal = new Meal();
    }

    public function getMeals()
    {
        return $this->meal->get();
    }
}
