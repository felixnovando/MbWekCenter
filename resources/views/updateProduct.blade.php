@extends('template')

@section('content')

    <div>
        <div>Update Product</div>
        <form method="POST" action="/updateProduct" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <input type="hidden" name="id" value="{{$product->id}}">
            <div>
                <label for="category">Category</label>
                <select name="category" id="category">
                    @foreach($types as $type)
                        @if($type->id == $product->type_id)
                            <option value="{{$type->id}}" selected>{{$type->name}}</option>
                        @else
                            <option value="{{$type->id}}">{{$type->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div>
                <label for="title">Title</label>
                <input type="text" name="title" id="title" value="{{$product->title}}">
            </div>
            <div>
                <label for="description">Description</label>
                <textarea name="description" id="description" cols="30" rows="10">{{$product->description}}</textarea>
            </div>
            <div>
                <label for="price">Price</label>
                <input type="number" name="price" id="price" value="{{$product->price}}">
            </div>
            <div>
                <label for="stock">Stock</label>
                <input type="number" name="stock" id="stock" value="{{$product->stock}}">
            </div>
            <div>
                <label for="image">Image</label>
                <input type="file" name="image" id="image" accept="image/png, image/gif, image/jpeg">
            </div>
            <div>
                @if($errors->any())
                    <p style="color: red">{{$errors->all()[0]}}</p>
                @endif
            </div>
            <div>
                <button>Submit</button>
            </div>
        </form>
    </div>

@endsection
