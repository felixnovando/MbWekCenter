@extends('template')

<style>
    .img{
        width: 300px;
        height: 300px;
        object-fit: cover;
    }
    #item-container{
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
    }
    #item-container > div{
        padding: 5%;
    }
    #item-container > div > div > p{
        max-width: 300px;
    }
    #search-container{
        width: 100%;
        display: flex;
        justify-content: space-evenly;
        align-items: center;
    }
</style>

@section('content')

    <div id="search-container">
        <h3>Search</h3>
        <select name="type" id="type" onchange="changePage(this.value)">
            <option value="/search/All">All</option>
            @foreach($types as $type)
                @if(isset($selectedType) && $type->name == $selectedType)
                    <option value="/search/{{$type->name}}" selected>{{$type->name}}</option>
                @else
                    <option value="/search/{{$type->name}}">{{$type->name}}</option>
                @endif
            @endforeach
        </select>
        <form method="GET" action="/search/{{$selectedType}}">
            <input type="text" name="search" id="search" value="{{isset($searchStr) ? $searchStr : ''}}">
            <button>Search</button>
        </form>
    </div>

    <div id="item-container">
        @foreach($products as $product)
            <div>
                <img class="img" src="{{\Illuminate\Support\Facades\URL::asset('storage/' . $product->image)}}" alt="{{'/' . $product->image}}">
                <div>
                    <p>{{$product->title}}</p>
                    <p>{{$product->description}}</p>
                    @if(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->role == "Admin")
                        <a href="/updateProduct/{{$product->id}}"><button>Update Product</button></a>
                    @endif
                    <a href="/detail/{{$product->id}}"><button>Product Detail</button></a>
                </div>
            </div>
        @endforeach
    </div>

{{--    untuk pagination--}}
    <div style="display: flex; justify-content: center">
        {{$products->links()}}
    </div>

{{--    ini js untuk ngatur select biar pindah page--}}
    <script>
        function changePage(path){
            window.location = path;
            return;
        }
    </script>


@endsection
