@extends('template')

<style>
    .img {
        width: 300px;
        height: 300px;
        object-fit: cover;
    }

    #item-container>div>div>p {
        max-width: 300px;
    }
</style>

@section('content')
    <div id="search-container" class="flex items-center w-full p-3 bg-slate-200 justify-evenly">
        <h3>Search</h3>
        <select name="type" id="type" onchange="changePage(this.value)" class="p-1 pl-2 rounded-md">
            <option value="/search/All">All</option>
            @foreach ($types as $type)
                @if (isset($selectedType) && $type->name == $selectedType)
                    <option value="/search/{{ $type->name }}" selected>{{ $type->name }}</option>
                @else
                    <option value="/search/{{ $type->name }}">{{ $type->name }}</option>
                @endif
            @endforeach
        </select>
        <form method="GET" action="/search/{{ $selectedType }}" class="p-0 m-0">
            <input type="text" name="search" id="search" value="{{ isset($searchStr) ? $searchStr : '' }}"
                class="w-[300px] p-1 pl-2 mr-2 rounded-md">
            <button
                class="p-2 font-semibold text-white bg-blue-500 rounded-lg hover:bg-white hover:text-blue-500">Search</button>
        </form>
    </div>

    <div id="item-container" class="flex flex-wrap items-center justify-center w-full">
        @foreach ($products as $product)
            <div class="p-5 m-5 shadow-lg bg-slate-100 drop-shadow-lg">
                <img class="img" src="{{ \Illuminate\Support\Facades\URL::asset('storage/' . $product->image) }}"
                    alt="{{ '/' . $product->image }}">
                <div>
                    <p class="text-xl text-center">{{ $product->title }}</p>
                    <p class="mt-2 text-justify">{{ $product->description }}</p>
                    @if (\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->role == 'Admin')
                        <a href="/updateProduct/{{ $product->id }}"><button
                                class="w-full p-2 mt-2 font-semibold text-white bg-yellow-600 hover:text-yellow-600 hover:bg-white">Update
                                Product</button></a>
                    @endif
                    <a href="/detail/{{ $product->id }}"><button
                            class="w-full p-2 mt-2 font-semibold text-white bg-blue-600 hover:text-blue-600 hover:bg-white">Product
                            Detail</button></a>
                </div>
            </div>
        @endforeach
    </div>

    {{--    untuk pagination --}}
    @if ($products->hasPages())
        <div class="flex flex-row items-center justify-evenly w-[400px] py-3 m-auto">
            {{-- {{ $products->links('pagination::tailwind') }} --}}

            @if ($products->onFirstPage())
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 opacity-50">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M18.75 19.5l-7.5-7.5 7.5-7.5m-6 15L5.25 12l7.5-7.5" />
                </svg>

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 opacity-50">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg>
            @else
                <a href="{{ $products->url(1) }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M18.75 19.5l-7.5-7.5 7.5-7.5m-6 15L5.25 12l7.5-7.5" />
                    </svg>
                </a>

                <a href="{{ $products->previousPageUrl() }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                    </svg>
                </a>
            @endif

            @php
                $total_page = ceil($products->total() / $products->perPage());
            @endphp

            <p>Page {{ $products->currentPage() }} / {{ $total_page }}</p>

            @if ($products->hasMorePages())
                <a href="{{ $products->nextPageUrl() }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
                </a>
                <a href="{{ $products->url($total_page) }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5" />
                    </svg>
                </a>
            @else
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 opacity-50">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 opacity-50">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5" />
                </svg>
            @endif

        </div>
    @endif

    {{--    ini js untuk ngatur select biar pindah page --}}
    <script>
        function changePage(path) {
            window.location = path;
            return;
        }
    </script>
@endsection
