@extends('auth.layouts')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a Supplier</title>

    <!-- Include Tailwind CSS -->
    @vite('resources/css/app.css')
</head>
<body class="font-sans bg-gray-100">

    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold  text-center mb-4">Create a Supplier</h1>

        <div>
            @if($errors->any())
            <ul class="text-red-500">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            @endif
        </div>

        <form action="{{ route('supplier.store') }}" method="post" class="max-w-md mx-auto">
            @csrf
            @method('post')

            <div class="mb-4">
                <label for="name" class="block text-gray-600">Name</label>
                <input type="text" id="name" name="name" placeholder="Name" class="form-input mt-1 block w-full @error('name') border-red-500 @enderror" required value="{{ old('name') }}">
                @error('name')
                    <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="contact_person" class="block text-gray-600">Contact Person</label>
                <input type="text" id="contact_person" name="contact_person" placeholder="Contact Person" class="form-input mt-1 block w-full @error('contact_person') border-red-500 @enderror" required value="{{ old('contact_person') }}">
                @error('contact_person')
                    <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-600">Email</label>
                <input type="text" id="email" name="email" placeholder="Email" class="form-input mt-1 block w-full @error('email') border-red-500 @enderror" required value="{{ old('email') }}">
                @error('email')
                    <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="phone_number" class="block text-gray-600">Phone Number</label>
                <input type="text" id="phone_number" name="phone_number" placeholder="Phone Number" class="form-input mt-1 block w-full @error('phone_number') border-red-500 @enderror" required value="{{ old('phone_number') }}">
                @error('phone_number')
                    <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="address" class="block text-gray-600">Address</label>
                <input type="text" id="address" name="address" placeholder="Address" class="form-input mt-1 block w-full @error('address') border-red-500 @enderror" required value="{{ old('address') }}">
                @error('address')
                    <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="city" class="block text-gray-600">City</label>
                <input type="text" id="city" name="city" placeholder="City" class="form-input mt-1 block w-full @error('city') border-red-500 @enderror" required value="{{ old('city') }}">
                @error('city')
                    <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="state" class="block text-gray-600">State</label>
                <input type="text" id="state" name="state" placeholder="State" class="form-input mt-1 block w-full @error('state') border-red-500 @enderror" required value="{{ old('state') }}">
                @error('state')
                    <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="zip_code" class="block text-gray-600">ZIP Code</label>
                <input type="text" id="zip_code" name="zip_code" placeholder="ZIP Code" class="form-input mt-1 block w-full @error('zip_code') border-red-500 @enderror" required value="{{ old('zip_code') }}">
                @error('zip_code')
                    <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="country" class="block text-gray-600">Country</label>
                <input type="text" id="country" name="country" placeholder="Country" class="form-input mt-1 block w-full @error('country') border-red-500 @enderror" required value="{{ old('country') }}">
                @error('country')
                    <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="tax_id" class="block text-gray-600">Tax ID</label>
                <input type="text" id="tax_id" name="tax_id" placeholder="Tax ID" class="form-input mt-1 block w-full @error('tax_id') border-red-500 @enderror" required value="{{ old('tax_id') }}">
                @error('tax_id')
                    <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <input type="submit" value="Save a new supplier" class="bg-blue-500 text-white py-2 px-4 rounded">
            </div>
        </form>
    </div>
</body>
</html>
@endsection

