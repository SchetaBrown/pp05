@extends('layouts.admin-layout')

@section('title')
@endsection


@section('content')
    <main class="max-w-2xl mx-auto px-4 py-6">
        <form class="bg-white rounded border p-6 space-y-6">
            <!-- Название -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Название продукта *
                </label>
                <input type="text" required placeholder="Введите название"
                    class="w-full px-3 py-2 border rounded focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Описание -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Описание
                </label>
                <textarea rows="3" placeholder="Описание продукта (необязательно)"
                    class="w-full px-3 py-2 border rounded focus:ring-1 focus:ring-blue-500 focus:border-blue-500"></textarea>
            </div>

            <!-- КБЖУ -->
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Калории *
                    </label>
                    <input type="number" required min="0" placeholder="0"
                        class="w-full px-3 py-2 border rounded focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Белки (г)
                    </label>
                    <input type="number" min="0" step="0.1" placeholder="0"
                        class="w-full px-3 py-2 border rounded focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Жиры (г)
                    </label>
                    <input type="number" min="0" step="0.1" placeholder="0"
                        class="w-full px-3 py-2 border rounded focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Углеводы (г)
                    </label>
                    <input type="number" min="0" step="0.1" placeholder="0"
                        class="w-full px-3 py-2 border rounded focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>

            <!-- Категория -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Категория *
                </label>
                <select required
                    class="w-full px-3 py-2 border rounded focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                    <option value="">Выберите категорию</option>
                    <option value="protein">Белковые продукты</option>
                    <option value="vegetables">Овощи</option>
                    <option value="fruits">Фрукты</option>
                    <option value="dairy">Молочные продукты</option>
                    <option value="grains">Крупы и зерновые</option>
                    <option value="fats">Жиры и масла</option>
                    <option value="drinks">Напитки</option>
                    <option value="other">Другое</option>
                </select>
            </div>

            <!-- Кнопки -->
            <div class="flex space-x-3 pt-4">
                <a href="admin.html" class="px-4 py-2 border rounded text-gray-700 hover:bg-gray-50">
                    Отмена
                </a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Создать продукт
                </button>
            </div>
        </form>

        <!-- Подсказка -->
        <div class="mt-6 p-4 bg-blue-50 rounded border border-blue-200">
            <div class="text-sm text-gray-700">
                <p class="font-medium mb-1">Подсказка:</p>
                <p>Все значения указываются на 100 грамм продукта.</p>
                <p class="mt-1">Поля отмеченные * обязательны для заполнения.</p>
            </div>
        </div>
    </main>
@endsection
