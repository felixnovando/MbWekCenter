@extends('template')

@section('content')

    <div>
        <div>Insert Product</div>
        <form method="POST" action="/insertProduct" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="category">Category</label>
                <select name="category" id="category">
                    @foreach($types as $type)
                        <option value="{{$type->id}}">{{$type->name}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="title">Title</label>
                <input type="text" name="title" id="title">
            </div>
            <div>
                <label for="description">Description</label>
                <textarea name="description" id="description" cols="30" rows="10"></textarea>
            </div>
            <div>
                <label for="price">Price</label>
                <input type="number" name="price" id="price">
            </div>
            <div>
                <label for="stock">Stock</label>
                <input type="number" name="stock" id="stock">
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
