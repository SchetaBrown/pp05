<?php

namespace App\Http\Controllers\Web\Profile;

use App\Http\Controllers\Controller;
use App\Models\ActivityLevel;
use App\Models\GoalType;
use App\Services\Interfaces\UserServiceInterface;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    private UserServiceInterface $userService;
    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }
    public function index()
    {
        return view('pages.profile.settings', [
            'goals' => GoalType::get(),
            'activityLevels' => ActivityLevel::get(),
        ]);
    }

    public function update(Request $request)
    {
        $user = auth()->user();
        if ($request->has('activity_level_id')) {
            $user->update([
                'activity_level_id' => $request->activity_level_id,
            ]);

            $this->userService->setUserNormalCalories($user);
        }

        if ($request->has('goal_type_id')) {
            $user->update([
                'goal_type_id' => $request->goal_type_id,
            ]);

            $this->userService->setUserNormalCalories($user);
        }

        return redirect()->back();
    }
}
