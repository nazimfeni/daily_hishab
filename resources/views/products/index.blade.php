@extends('auth.layouts')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>

    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="font-sans bg-gray-100">

    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-4">Product List</h1>

        @if(session()->has('success'))
            <div class="bg-green-200 p-2 mb-4">{{ session('success') }}</div>
        @endif

        <div class="mb-4">
            <a href="{{ route('product.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded">Create Product</a>
            <a href="{{ route('dashboard') }}" class="bg-blue-500 text-white py-2 px-4 rounded">Dashboard </a>
        </div>

        <div>
            <table class="table-auto border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="p- ">ID</th>
                        <th class="p-2 ">Name</th>
                        <th class="p-2 ">Qty</th>
                        <th class="p-2 ">Price</th>
                        <th class="p-2 ">Description</th>
                        <th class="p-2">Role</th>
                        <th class="p-2">Edit</th>
                        <th class="p-2">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr class="border-b border-gray-300">
                            <td class="p-2 ">{{ $product->id }}</td>
                            <td class="p-2 ">{{ $product->name }}</td>
                            <td class="p-2 ">{{ $product->qty }}</td>
                            <td class="p-2 ">{{ $product->price }}</td>
                            <td class="p-2 ">{{ $product->description }}</td>
                            <td class="p-2 ">{{ $product->role }}</td>
                            <td class="p-2 ">
                                <a href="{{ route('product.edit', ['product' => $product->id]) }}" class="bg-blue-500 text-white py-2 px-4 rounded">Edit</a>
                            </td>
                            <td class="p-2 ">
                                <form method="post" action="{{ route('product.destroy', ['product' => $product->id]) }}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
@endsection
