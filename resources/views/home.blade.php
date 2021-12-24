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
</style>

@section('content')

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


@endsection
