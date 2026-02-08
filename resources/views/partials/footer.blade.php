<footer
    class="flex items-center justify-around fixed bottom-0 left-0 right-0 h-20 bg-white border-t border-gray-200 px-4 z-50">
    <a href="{{ route('index') }}" class="nav-item flex flex-col items-center text-gray-600 hover:text-blue-600">
        <div class="nav-icon w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center mb-1">
            <i class="fas fa-home"></i>
        </div>
        <span class="text-xs font-medium">Главная</span>
    </a>

    <a href="{{ route('product.index') }}" class="nav-item flex flex-col items-center text-gray-600 hover:text-blue-600">
        <div class="nav-icon w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center mb-1">
            <i class="fas fa-utensils"></i>
        </div>
        <span class="text-xs font-medium">Продукты</span>
    </a>

    <a href="{{ route('profile.index') }}"
        class="nav-item flex flex-col items-center text-gray-600 hover:text-blue-600">
        <div class="nav-icon w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center mb-1">
            <i class="fas fa-user"></i>
        </div>
        <span class="text-xs font-medium">Профиль</span>
    </a>
</footer>
