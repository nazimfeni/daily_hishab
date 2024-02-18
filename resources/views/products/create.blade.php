@extends('auth.layouts')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a Product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-semibold mb-8">Create a Product</h1>
        <div>
            @if($errors->any())
                <ul class="text-red-500">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
        <form action="{{ route('product.store') }}" method="post" class="max-w-md mx-auto">
            @csrf
            @method('post')

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-600">Name</label>
                <input type="text" name="name" id="name" placeholder="Name"
                       class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300">
            </div>
            <div class="mb-4">
                <label for="qty" class="block text-sm font-medium text-gray-600">Qty</label>
                <input type="text" name="qty" id="qty" placeholder="Qty"
                       class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300">
            </div>
            <div class="mb-4">
                <label for="price" class="block text-sm font-medium text-gray-600">Price</label>
                <input type="text" name="price" id="price" placeholder="Price"
                       class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300">
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-600">Description</label>
                <input type="text" name="description" id="description" placeholder="Description"
                       class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300">
            </div>
            <div class="mb-4">
                <label for="role" class="block text-sm font-medium text-gray-600">Role</label>
                <input type="text" name="role" id="role" placeholder="Role"
                       class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300">
            </div>
            <div>
                <button type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300">
                    Save a new product
                </button>
            </div>
        </form>
    </div>
</body>
</html>
@endsection
