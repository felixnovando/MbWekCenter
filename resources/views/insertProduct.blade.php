@extends('template')

@section('content')
    <div class="bg-gray-400 w-[500px] m-auto p-5 rounded-xl my-8">
        <div class="text-2xl font-bold text-center">Insert Product</div>
        <form method="POST" action="/insertProduct" enctype="multipart/form-data" class="text-lg">
            @csrf
            <div class="flex flex-col px-2 my-3">
                <label for="category" class="mb-2">Category</label>
                <select name="category" id="category" class="p-1 pl-2 rounded-md">
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex flex-col px-2 my-3">
                <label for="title" class="mb-2">Title</label>
                <input type="text" name="title" id="title" class="p-1 pl-2 rounded-md">
            </div>
            <div class="flex flex-col px-2 my-3">
                <label for="description" class="mb-2">Description</label>
                <textarea name="description" id="description" cols="30" rows="5" class="p-1 pl-2 rounded-md"></textarea>
            </div>
            <div class="flex flex-col px-2 my-3">
                <label for="price" class="mb-2">Price</label>
                <input type="number" name="price" id="price" class="p-1 pl-2 rounded-md">
            </div>
            <div class="flex flex-col px-2 my-3">
                <label for="stock" class="mb-2">Stock</label>
                <input type="number" name="stock" id="stock" class="p-1 pl-2 rounded-md">
            </div>
            <div class="flex flex-col px-2 my-3">
                <label for="image" class="mb-2">Image</label>
                <input type="file" name="image" id="image" accept="image/png, image/gif, image/jpeg">
            </div>
            <div class="px-2 my-3">
                @if ($errors->any())
                    <p class="font-semibold text-red-600">{{ $errors->all()[0] }}</p>
                @endif
            </div>
            <div>
                <button
                    class="w-full p-2 font-semibold text-white bg-green-500 rounded-lg hover:bg-white hover:text-green-500">Insert</button>
            </div>
        </form>
    </div>
@endsection
