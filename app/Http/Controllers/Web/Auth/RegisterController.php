<?php

namespace App\Http\Controllers\Web\Auth;

use App\Models\User;
use App\Models\Gender;
use App\Models\GoalType;
use App\Models\ActivityLevel;
use App\Http\Controllers\Controller;
use App\Services\Interfaces\UserRecordServiceInterface;
use App\Services\Interfaces\UserServiceInterface;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\RegisterRequest;

class RegisterController extends Controller
{
    private UserServiceInterface $userService;
    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    public function create()
    {
        $activityLevels = ActivityLevel::get();
        $genders = Gender::get();
        $goals = GoalType::get();
        return view('pages.auth.register', compact(['activityLevels', 'genders', 'goals']));
    }

    public function store(RegisterRequest $request)
    {
        try {
            $data = $request->validated();
            $user = User::create($data);
            Auth::login($user);
            $this->userService->setUserNormalCalories($user);
            return redirect()->route('index');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
