<?php

namespace App\Services;

use App\Models\Meal;
use App\Models\User;
use App\Models\UserRecord;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\Auth;
use App\Services\Interfaces\UserRecordServiceInterface;
use App\Repositories\Interfaces\MealRepositoryInterface;
use Illuminate\Http\Request;

class UserRecordService implements UserRecordServiceInterface
{
    private MealRepositoryInterface $mealRepository;
    private ProductRepositoryInterface $productRepository;
    private User $user;

    const WEIGHT_CONSTANT = 10;
    const HEIGHT_CONSTANT = 6.25;
    const AGE_CONSTANT = 5;
    const MAN_CONSTANT = 5;
    const WOMAN_CONSTANT = 161;
    const PROTEIN_CALORIES_PER_GRAM = 4;
    const FAT_CALORIES_PER_GRAM = 9;
    const CARB_CALORIES_PER_GRAM = 4;

    public function __construct(MealRepositoryInterface $mealRepository, ProductRepositoryInterface $productRepository)
    {
        $this->mealRepository = $mealRepository;
        $this->user = Auth::user();
        $this->productRepository = $productRepository;
    }

    public function getDataForIndexPage(Request $request)
    {
        $meals = $this->mealRepository->getMeals();
        $records = collect([]);
        $day = $request->has('day')
            ? $request->day
            : (session()->get('day') ?? now()->format('Y-m-d'));


        // 3. СРАЗУ сохраняем эту дату в сессию!
        session()->put('day', $day);

        $nutrients = [
            'calories' => [
                'title' => 'Калории',
                'value' => 0,
            ],
            'protein' => [
                'title' => 'Белки',
                'value' => 0,
            ],
            'fat' => [
                'title' => 'Жиры',
                'value' => 0,
            ],
            'carbs' => [
                'title' => 'Углеводы',
                'value' => 0,
            ],
        ];

        // Формумируем массив на основе meals
        foreach ($meals as $meal) {
            $records[$meal->title] =
                UserRecord::with(['user', 'meal', 'product', 'productUnit'])
                    ->where('meal_id', $meal->id)
                    ->where('user_id', Auth::id())
                    ->whereDate('date', $day)
                    ->orderByDesc('created_at')
                    ->get();

            foreach ($records[$meal->title] as $record) {
                $product = $record->product;
                $productFields = $record->product->only(['calories', 'fat', 'protein', 'carbs']);
                $productUnit = $record->productUnit->short_unit;
                $productQuantity = $record->quantity;
                foreach ($productFields as $key => $value) {
                    if (array_key_exists($key, $nutrients)) {
                        $nutrients[$key]['value'] +=
                            $product->$key * round(($productUnit === 'г' || $productUnit === 'мл' ? ($productQuantity / 100) : $productQuantity), 1);
                    }
                }
            }
        }

        return [
            'records' => $records,
            'nutrients' => $nutrients,
            'current_day' => $this->getCurrentDay($request)
        ];
    }

    public function setUserRecord(Request $request, $product)
    {
        try {
            if ($request->has('meal_id') || $request->has('meal')) {
                UserRecord::create([
                    'quantity' => $request->quantity,
                    'user_id' => $this->user->id,
                    'date' => session()->get('day'),
                    'meal_id' => Meal::where('title', $request->meal_id)->orWhere('id', $request->meal_id)->first()->id,
                    'product_id' => $product->id,
                    'product_unit_id' => $request->product_unit_id,
                ]);
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    private function getCurrentDay(Request $request)
    {
        if ($request->has('day')) {
            return $request->day;
        }

        return now()->format('Y-m-d');
    }

    public function destroyProductFromDiet(UserRecord $product)
    {
        $product->delete();
    }
}
