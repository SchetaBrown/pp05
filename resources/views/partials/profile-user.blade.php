<section class="flex items-center justify-center bg-white rounded-xl py-10 border border-gray-200">
    <div class="flex flex-col gap-1">
        <div class="size-25 rounded-full bg-black"></div>
        <span class="text-center font-medium text-[20px]">{{ $user->login }}</span>
    </div>
</section>
<nav class="my-4">
    <ul class="flex justify-center gap-4">
        <li class="flex justify-center">
            <a href="{{ route('profile.index') }}"
                class=" py-3 text-center font-medium text-gray-600 hover:text-blue-600">
                Общая информация
            </a>
        </li>
        <li class="flex justify-center">
            <a href="{{ route('profile.setting.index') }}"
                class="flex-1 py-3 text-center font-medium text-gray-600 hover:text-blue-600">
                Настройки
            </a>
        </li>
        <li class="flex justify-center">
            <a href="{{ route('profile.about') }}"
                class="flex-1 py-3 text-center font-medium text-gray-600 hover:text-blue-600">
                Дополнительная информация
            </a>
        </li>
    </ul>
</nav>
