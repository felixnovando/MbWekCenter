@extends('template')

@section('content')
    <div class="bg-gray-400 w-[500px] m-auto p-5 rounded-xl my-8">
        <div class="text-2xl font-bold text-center">Update Product</div>
        <form method="POST" action="/updateProduct" enctype="multipart/form-data" class="text-lg">
            @method('PUT')
            @csrf
            <input type="hidden" name="id" value="{{ $product->id }}" class="hidden">
            <div class="flex flex-col px-2 my-3">
                <label for="category" class="mb-2">Category</label>
                <select name="category" id="category" class="p-1 pl-2 rounded-md">
                    @foreach ($types as $type)
                        @if ($type->id == $product->type_id)
                            <option value="{{ $type->id }}" selected>{{ $type->name }}</option>
                        @else
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="flex flex-col px-2 my-3">
                <label for="title" class="mb-2">Title</label>
                <input type="text" class="p-1 pl-2 rounded-md" name="title" id="title"
                    value="{{ $product->title }}">
            </div>
            <div class="flex flex-col px-2 my-3">
                <label for="description" class="mb-2">Description</label>
                <textarea class="p-1 pl-2 rounded-md" name="description" id="description" cols="30" rows="5">{{ $product->description }}</textarea>
            </div>
            <div class="flex flex-col px-2 my-3">
                <label for="price" class="mb-2">Price</label>
                <input class="p-1 pl-2 rounded-md" type="number" name="price" id="price"
                    value="{{ $product->price }}">
            </div>
            <div class="flex flex-col px-2 my-3">
                <label for="stock" class="mb-2">Stock</label>
                <input class="p-1 pl-2 rounded-md" type="number" name="stock" id="stock"
                    value="{{ $product->stock }}">
            </div>
            <div class="flex flex-col px-2 my-3">
                <label for="image" class="mb-2">Image</label>
                <input class="p-1 pl-0 rounded-md"type="file" name="image" id="image"
                    accept="image/png, image/gif, image/jpeg">
            </div>
            <div class="px-2 my-3">
                @if ($errors->any())
                    <p class="font-semibold text-red-600">{{ $errors->all()[0] }}</p>
                @endif
            </div>
            <div>
                <button
                    class="w-full p-2 font-semibold text-white bg-yellow-500 rounded-lg hover:bg-white hover:text-yellow-500">Update</button>
            </div>
        </form>
    </div>
@endsection
