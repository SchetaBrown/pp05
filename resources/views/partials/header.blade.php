<header class="flex items-center justify-between h-15 bg-white border-b-gray-200 px-12.5 absolute top-0 left-0 right-0">

    @if (request()->routeIs('product.*'))
        <span class="font-semibold">Продукты</span>
    @elseif(request()->routeIs('profile.index'))
        <span class="font-semibold">Профиль</span>
    @elseif(request()->routeIs('profile.setting.*'))
        <span class="font-semibold">Настройки</span>
    @elseif (request()->routeIs('profile.about'))
                <span class="font-semibold">Дополнительная информация</span>
    @elseif (request()->routeIs('admin.*'))
        <a href="{{ route('admin.index') }}" class="flex items-center gap-2 text-blue-600 font-semibold">
            <i class="fa-solid fa-book"></i>
            Админ-панель
        </a>
    @else
        <a href="{{ route('index') }}" class="flex items-center gap-2.5">
            <i class="fas fa-weight text-blue-600 text-xl"></i>
            <span class="font-semibold text-xl">FatTracker</span>
        </a>
    @endif
</header>
