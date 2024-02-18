@extends('auth.layouts')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supplier List</title>

    <!-- Include Tailwind CSS -->
    @vite('resources/css/app.css')
</head>
<body class="font-sans bg-gray-100">

    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-4">Supplier List</h1>

        @if(session()->has('success'))
        <div class="bg-green-200 p-2 mb-4">{{ session('success') }}</div>
        @endif

        <div class="mb-4">
            <form method="get" action="{{ route('supplier.create') }}" class="mb-4">
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Create Supplier</button>
                <button><a href="{{ route('dashboard') }}" class="bg-blue-500 text-white py-2 px-4 rounded">Dashboard </a></button>
            </form>
        </div>

        <table class="table-auto border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="p-2">ID</th>
                    <th class="p-2">Name</th>
                    <th class="p-2">Contact Person</th>
                    <th class="p-2">Email</th>
                    <th class="p-2">Phone Number</th>
                    <th class="p-2">Address</th>
                    <th class="p-2">City</th>
                    <th class="p-2">State</th>
                    <th class="p-2">ZIP Code</th>
                    <th class="p-2">Country</th>
                    <th class="p-2">Tax ID</th>
                    <th class="p-2">Edit</th>
                    <th class="p-2">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($suppliers as $supplier)
                <tr class="border-b border-gray-300">
                    <td class="p-2">{{ $supplier->id }}</td>
                    <td class="p-2">{{ $supplier->name }}</td>
                    <td class="p-2">{{ $supplier->contact_person }}</td>
                    <td class="p-2">{{ $supplier->email }}</td>
                    <td class="p-2">{{ $supplier->phone_number }}</td>
                    <td class="p-2">{{ $supplier->address }}</td>
                    <td class="p-2">{{ $supplier->city }}</td>
                    <td class="p-2">{{ $supplier->state }}</td>
                    <td class="p-2">{{ $supplier->zip_code }}</td>
                    <td class="p-2">{{ $supplier->country }}</td>
                    <td class="p-2">{{ $supplier->tax_id }}</td>
                    <td class="p-2">
                        <a href="{{ route('supplier.edit', ['supplier' => $supplier->id]) }}" class="bg-blue-500 text-white py-2 px-4 rounded">Edit</a>
                    </td>
                    <td class="p-2">
                        <form method="post" action="{{ route('supplier.destroy', ['supplier' => $supplier->id]) }}">
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
</body>
</html>
@endsection
