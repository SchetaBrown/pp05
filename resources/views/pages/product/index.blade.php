@extends('layouts.app-layout')
@section('title')
@endsection

@section('content')
    <section class="mb-5 relative">
        <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
        <input type="text" placeholder="Поиск продуктов..."
            class="w-full pl-10 pr-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white">
    </section>
    <section class="mb-5">
        <form action="{{ route('product.index') }}" id="search_category_form" method="GET">
            <select name="search_category" id="" class="bg-white px-6 py-2 rounded-md"
                onchange="document.getElementById('search_category_form').submit()">
                <option value="#">Все продукты</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @selected($category->id == request()->search_category)>{{ $category->category }}</option>
                @endforeach
            </select>
        </form>
    </section>
    <section class="grid grid-cols-2 gap-3">
        @foreach ($products as $product)
            <div class="bg-white rounded-lg p-4 flex items-center justify-between border border-gray-200">
                <div class="flex flex-col gap-1">
                    <span class="font-medium">
                        {{ $product->title }}
                    </span>
                    <span class="text-sm text-gray-500">
                        {{ $product->calories }} ккал
                        Б:{{ $product->protein }}
                        Ж:{{ $product->fat }}
                        У:{{ $product->carbs }}
                    </span>
                </div>
                <form action="{{ route('product.store', ['product' => $product->id]) }}" method="POST">
                    @csrf
                    @isset (request()->query()['meal_id'])
                        <input type="hidden" name="meal_id" value="{{ request()->query()['meal_id'] }}">
                    @endisset
                    <input type="text" name="quantity" class="border border-gray-100 w-25 rounded-md text-center"
                        value="100">
                    <select name="product_unit_id" id="" class="h-6.5 px-2 border border-gray-200 rounded-md">
                        @foreach ($units as $unit)
                            <option value="{{ $unit->id }}">{{ $unit->short_unit }}</option>
                        @endforeach
                    </select>
                    @if (!request()->has('meal_id'))
                        <select name="meal_id" id="" class="h-6.5 px-2 border border-gray-200 rounded-md">
                            @foreach ($meals as $meal)
                                <option value="{{ $meal->id }}">{{ $meal->title }}</option>
                            @endforeach
                        </select>
                    @endif
                    <button type="submit" class="px-3 py-1 bg-blue-50 text-blue-600 rounded text-sm hover:bg-blue-100"
                        onclick="">
                        <i class="fas fa-plus"></i>
                    </button>
                </form>
            </div>
        @endforeach
    </section>
    <section class="mx-auto container mt-10">
        {{ $products->links() }}
    </section>
@endsection
