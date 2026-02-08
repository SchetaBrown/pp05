<?php

namespace App\Http\Controllers\Web\Auth;

use App\Models\ActivityLevel;
use App\Models\Gender;
use App\Models\GoalType;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;

class RegisterController extends Controller
{
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
            return redirect()->route('index');
        } catch (\Exception $e) {
            dd($e);
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
