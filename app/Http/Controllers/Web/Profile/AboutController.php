<?php

namespace App\Http\Controllers\Web\Profile;

use App\Models\ActivityLevel;
use App\Models\GoalType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AboutController extends Controller
{
    public function __invoke()
    {
        return view('pages.profile.about', [
            'activity_levels' => ActivityLevel::orderBy('multiplier', 'asc')->get(),
            'goal_types' => GoalType::orderBy('calorie_modifier', 'asc')->get(),
        ]);
    }
}
