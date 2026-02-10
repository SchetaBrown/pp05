<?php

namespace Database\Seeders;

use App\Models\User;
use App\Services\Interfaces\UserServiceInterface;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    private UserServiceInterface $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }
    private array $users = [
        [
            'login' => 'User',
            'email' => 'user@gmail.com',
            'password' => '123123123',
            'weight' => 74.3,
            'height' => 178,
            'age' => 24,
            'role_id' => 1,
            'gender_id' => 1,
            'goal_type_id' => 2,
            'activity_level_id' => 2,
        ],
        [
            'login' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => '123123123',
            'weight' => 78.3,
            'height' => 183,
            'age' => 28,
            'role_id' => 2,
            'gender_id' => 1,
            'goal_type_id' => 4,
            'activity_level_id' => 2,
        ],
    ];
    public function run(): void
    {
        foreach ($this->users as $user) {
            $newUser = User::create($user);
            $this->userService->setUserNormalCalories($newUser);
        }
    }
}
