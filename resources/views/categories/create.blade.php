@extends('auth.layouts')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a Category</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-semibold mb-8">Create a Category</h1>
        <div>
            @if($errors->any())
                <ul class="text-red-500">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
        <form action="{{ route('categories.store') }}" method="post" class="max-w-md mx-auto">
            @csrf
            @method('post')

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-600">Name</label>
                <input type="text" name="name" id="name" placeholder="Name"
                       class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300">
            </div>
            <div class="mb-4">
                <label for="type" class="block text-sm font-medium text-gray-600">Type</label>
                <select name="type" id="type" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300">
                    <option value="Income">Income</option>
                    <option value="Expense">Expense</option>
                   
                </select>
            </div>
            <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-gray-600">Status</label>
                <select name="status" id="status" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300">
                    <option value="active">YES</option>
                    <option value="inactive">NO</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="action" class="block text-sm font-medium text-gray-600">Action</label>
                <input type="text" name="action" id="action" placeholder="Action"
                       class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300">
            </div>
            <div>
                <button type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300">
                    Save a new category
                </button>
            </div>
        </form>
    </div>
</body>
</html>
@endsection
