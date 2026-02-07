@extends('layouts.auth-layout')

@section('title')
    Вход в систему - {{ config('app.name') }}
@endsection

@section('content')
    <div class="bg-white rounded-lg shadow-lg w-full max-w-sm p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">Вход</h1>

        <form class="space-y-4" action="{{ route('login.store') }}" method="POST">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Логин</label>
                <input type="text" name="login" required placeholder="Введи логин"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Пароль</label>
                <div class="relative">
                    <input type="password" id="password" name="password" required placeholder="Введи пароль"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 pr-10">
                </div>
            </div>

            <!-- Кнопка -->
            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md transition duration-200">
                Войти
            </button>
        </form>

        <div class="mt-4 text-center text-sm text-gray-600">
            Нет аккаунта? <a href="{{ route('register.create') }}"
                class="text-blue-600 hover:text-blue-800">Зарегистрируйся</a>
        </div>
    </div>
@endsection
