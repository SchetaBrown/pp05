<?php

namespace App\Services;

use App\Models\User;
use App\Models\UserRecord;
use Illuminate\Support\Facades\Auth;
use App\Services\Interfaces\UserRecordServiceInterface;
use App\Repositories\Interfaces\MealRepositoryInterface;

class UserRecordService implements UserRecordServiceInterface
{
    private MealRepositoryInterface $mealRepository;
    private User $user;
    const WEIGHT_CONSTANT = 10;
    const HEIGHT_CONSTANT = 6.25;
    const AGE_CONSTANT = 5;
    const MAN_CONSTANT = 5;
    const WOMAN_CONSTANT = 161;

    public function __construct(MealRepositoryInterface $mealRepository)
    {
        $this->mealRepository = $mealRepository;
        $this->user = Auth::user();
    }

    public function getDataForIndexPage()
    {
        $meals = $this->mealRepository->getMeals();
        $records = [];
        $nutrients = [
            'calories' => [
                'title' => 'Калории',
                'value' => 0,
                'normal' => $this->getUserNormalCalories(),
            ],
            'protein' => [
                'title' => 'Белки',
                'value' => 0,
                'normal' => $this->getUserNormalProtein()
            ],
            'fat' => [
                'title' => 'Жиры',
                'value' => 0,
                'normal' => $this->getUserNormalFat()
            ],
            'carbs' => [
                'title' => 'Углеводы',
                'value' => 0,
                'normal' => $this->getUserNormalCarb()
            ],
        ];

        // Формумируем массив на основе meals
        foreach ($meals as $meal) {
            $records[$meal->title] =
                UserRecord::with(['user', 'meal', 'product', 'productUnit'])
                    ->where('meal_id', $meal->id)
                    ->where('user_id', Auth::id())
                    ->orderByDesc('created_at')
                    ->get();

            foreach ($records[$meal->title] as $record) {
                $product = $record->product;
                $productFields = $record->product->only(['calories', 'fat', 'protein', 'carbs']);
                $productUnit = $record->productUnit->short_unit;
                $productQuantity = $record->quantity;
                foreach ($productFields as $key => $value) {
                    if (array_key_exists($key, $nutrients)) {
                        $nutrients[$key]['value'] += $product->$key *
                            round(
                                (
                                    $productUnit === 'г' || $productUnit === 'мл' ? ($productQuantity / 100) : $productQuantity
                                ),
                                1
                            );
                    }

                }
            }
        }

        return [
            'records' => $records,
            'nutrients' => $nutrients,
        ];
    }

    private function getUserNormalCalories()
    {
        // Формула Миффлина-Сан Жеора для расчета нормы калорий
        $activityLevel = $this->user->activityLevel->multiplier;
        $goal = $this->user->goalType->calorie_modifier;

        // Пользовательские данные
        $weight = $this->user->weight;
        $height = $this->user->height;
        $age = $this->user->age;


        $overallData = (self::WEIGHT_CONSTANT * $weight) + (self::HEIGHT_CONSTANT * $height) - (self::AGE_CONSTANT * $age);

        if ($this->user->gender->gender === 'Мужчина') {
            return round((($overallData + self::MAN_CONSTANT) * $activityLevel * $goal), 0);
        } else {
            return round((($overallData - self::WOMAN_CONSTANT) * $activityLevel * $goal), 0);
        }
    }

    private function getUserNormalProtein()
    {
        $weight = $this->user->weight;
        $protein = $this->user->protein_grams;

        return $weight * $protein;
    }

    private function getUserNormalFat()
    {
        $weight = $this->user->weight;
        $fat = $this->user->fat_grams;

        return $weight * $fat;
    }

    private function getUserNormalCarb()
    {
        $weight = $this->user->weight;
        $carb = $this->user->carb_grams;

        return $weight * $carb;
    }

    public function destroyProductFromDiet(UserRecord $product)
    {
        $product->delete();
    }
}
