@extends('layouts.app-layout')

@section('title')
    Дополнительная информация
@endsection

@section('content')
    <main class="max-w-4xl mx-auto px-4 py-6 space-y-8">
        <div class="bg-white rounded border p-6 border-gray-200">
            <h2 class="text-xl font-bold text-gray-900 mb-4">Формула расчета калорий</h2>

            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-4">
                <div class="font-mono text-lg text-blue-800 mb-2">
                    БMR = (10 × вес) + (6.25 × рост) - (5 × возраст) + S
                </div>
                <div class="text-sm text-gray-700">
                    <p class="mb-1"><strong>Формула Миффлина-Сан Жеора</strong> - современный стандарт расчета базового
                        метаболизма.</p>
                    <p class="mb-1"><strong>S</strong>: +5 для мужчин, -161 для женщин</p>
                    <p><strong>Суточная норма</strong> = БMR × Активность × Цель</p>
                </div>
            </div>

            <div class="text-sm text-gray-600">
                <p>Пример: мужчина 30 лет, 75кг, 180см, средняя активность, цель - поддержание:</p>
                <p class="font-mono mt-1">БMR = (10×75) + (6.25×180) - (5×30) + 5 = 1667 ккал</p>
                <p class="font-mono">Норма = 1667 × 1.55 × 1.0 = 2584 ккал/день</p>
            </div>
        </div>

        <!-- Уровни активностей -->
        <div class="bg-white rounded border p-6 border-gray-200">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold text-gray-900">Уровни активности</h2>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="">
                            <th class="text-left py-3 px-2 text-sm font-medium text-gray-700">Название</th>
                            <th class="text-left py-3 px-2 text-sm font-medium text-gray-700">Описание</th>
                            <th class="text-left py-3 px-2 text-sm font-medium text-gray-700">Коэффициент</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($activity_levels as $activity_level)
                            <tr class="hover:bg-gray-50">
                                <td class="py-3 px-2">
                                    <div class="font-medium">{{ $activity_level->level }}</div>
                                </td>
                                <td class="py-3 px-2 text-sm text-gray-600">
                                    {{ $activity_level->description }}
                                </td>
                                <td class="py-3 px-2">
                                    <span
                                        class="px-3 py-1 bg-gray-100 text-gray-800 rounded text-sm">{{ $activity_level->multiplier }}</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="bg-white rounded border p-6 border-gray-200">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold text-gray-900">Типы целей</h2>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr>
                            <th class="text-left py-3 px-2 text-sm font-medium text-gray-700">Название</th>
                            <th class="text-left py-3 px-2 text-sm font-medium text-gray-700">Описание</th>
                            <th class="text-left py-3 px-2 text-sm font-medium text-gray-700">Коэффициент</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($goal_types as $goal_type)
                            <tr class="hover:bg-gray-50">
                                <td class="py-3 px-2">
                                    <div class="font-medium">{{ $goal_type->type }}</div>
                                </td>
                                <td class="py-3 px-2 text-sm text-gray-600">
                                    {{ $goal_type->description }}
                                </td>
                                <td class="py-3 px-2">
                                    <span
                                        class="px-3 py-1 bg-gray-100 text-gray-800 rounded text-sm">{{ $goal_type->calorie_modifier }}</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
@endsection
