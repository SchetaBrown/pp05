<?php

namespace App\Http\Controllers\Web\Profile;

use App\Http\Controllers\Controller;
use App\Models\ActivityLevel;
use App\Models\GoalType;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Services\Interfaces\UserServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    private UserServiceInterface $userService;
    private UserRepositoryInterface $userRepository;
    public function __construct(UserServiceInterface $userService, UserRepositoryInterface $userRepository)
    {
        $this->userService = $userService;
        $this->userRepository = $userRepository;
    }
    public function index()
    {
        return view('pages.profile.settings', [
            'goals' => $this->userRepository->getAllGoalTypes(),
            'activityLevels' => $this->userRepository->getAllActivityLevels(),
        ]);
    }

    public function update(Request $request)
    {
        $this->userRepository->updateUserSettings(Auth::user(), $request);

        return redirect()->back();
    }
}
