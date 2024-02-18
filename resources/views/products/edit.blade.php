@extends('auth.layouts')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit a Product</title>

    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="font-sans bg-gray-100">

    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-4">Edit a Product</h1>

        @if($errors->any())
            <ul class="text-red-500">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form method="post" action="{{ route('product.update', ['product' => $product]) }}" class="space-y-4">
            @csrf
            @method('put')

            <div class="flex flex-col">
                <label class="mb-1">Name</label>
                <input type="text" name="name" placeholder="Name" value="{{ $product->name }}" class="py-2 px-3 border rounded">
            </div>
            <div class="flex flex-col">
                <label class="mb-1">Qty</label>
                <input type="text" name="qty" placeholder="Qty" value="{{ $product->qty }}" class="py-2 px-3 border rounded">
            </div>
            <div class="flex flex-col">
                <label class="mb-1">Price</label>
                <input type="text" name="price" placeholder="Price" value="{{ $product->price }}" class="py-2 px-3 border rounded">
            </div>
            <div class="flex flex-col">
                <label class="mb-1">Description</label>
                <input type="text" name="description" placeholder="Description" value="{{ $product->description }}" class="py-2 px-3 border rounded">
            </div>
            <div class="flex flex-col">
                <label class="mb-1">Role</label>
                <input type="text" name="role" placeholder="Role" value="{{ $product->role }}" class="py-2 px-3 border rounded">
            </div>
            <div>
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Update</button>
            </div>
        </form>
    </div>

</body>
</html>
@endsection
