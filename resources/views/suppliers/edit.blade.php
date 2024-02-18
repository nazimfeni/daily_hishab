@extends('auth.layouts')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit a Supplier</title>

    <!-- Include Tailwind CSS -->
    @vite('resources/css/app.css')
</head>
<body class="font-sans bg-gray-100 p-4">

    <h1 class="text-3xl font-bold mb-4">Edit a Supplier</h1>

    <div>
        @if($errors->any())
        <ul class="text-red-500">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
    </div>

    <form method="post" action="{{route('supplier.update', ['supplier' => $supplier])}}" class="max-w-md mx-auto">
        @csrf
        @method('put')

        <div class="mb-4">
            <label for="name" class="block text-gray-600">Name</label>
            <input type="text" name="name" placeholder="Name" value="{{$supplier->name}}" class="form-input mt-1 block w-full" required>
        </div>

        <div class="mb-4">
            <label for="contact_person" class="block text-gray-600">Contact Person</label>
            <input type="text" name="contact_person" placeholder="Contact Person" value="{{$supplier->contact_person}}" class="form-input mt-1 block w-full" required>
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-600">Email</label>
            <input type="text" name="email" placeholder="Email" value="{{$supplier->email}}" class="form-input mt-1 block w-full" required>
        </div>

        <div class="mb-4">
            <label for="phone_number" class="block text-gray-600">Phone Number</label>
            <input type="text" name="phone_number" placeholder="Phone Number" value="{{$supplier->phone_number}}" class="form-input mt-1 block w-full" required>
        </div>

        <div class="mb-4">
            <label for="address" class="block text-gray-600">Address</label>
            <input type="text" name="address" placeholder="Address" value="{{$supplier->address}}" class="form-input mt-1 block w-full" required>
        </div>

        <!-- Add more fields as needed -->

        <div class="mb-4">
            <input type="submit" value="Update" class="bg-blue-500 text-white py-2 px-4 rounded">
        </div>
    </form>

</body>
</html>
@endsection
