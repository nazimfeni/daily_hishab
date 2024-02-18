@extends('auth.layouts')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer List</title>

    <!-- Include Tailwind CSS -->
    @vite('resources/css/app.css')
</head>
<body class="font-sans bg-gray-100">

    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-4">Customer List</h1>

        @if(session()->has('success'))
            <div class="bg-green-200 p-2 mb-4">{{ session('success') }}</div>
        @endif

        <div class="mb-4">
            <a href="{{ route('customer.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded">Create Customer</a>
            <a href="{{ route('dashboard') }}" class="bg-blue-500 text-white py-2 px-4 rounded">Dashboard </a>
        </div>

        <div>
            <table class="table-auto  border-collapse border border-gray-300">
                <thead>
                    <tr class="border-b bg-gray-200">
                        <th class="p- ">ID</th>
                        <th class="p-2 ">Name</th>
                        <th class="p-2 ">Phone</th>
                        <th class="p-2 ">Email</th>
                        <th class="p-2 ">Address</th>
                        <th class="p-2 ">Status</th>
                        <th class="p-2">Edit</th>
                       
                    </tr>
                </thead>
                <tbody>
                    @foreach($customers as $customer)
                        <tr class="border-b border-gray-300">
                            <td class="p-2 ">{{ $customer->id }}</td>
                            <td class="p-2 ">{{ $customer->name }}</td>
                            <td class="p-2 ">{{ $customer->phone }}</td>
                            <td class="p-2 ">{{ $customer->email }}</td>
                            <td class="p-2 ">{{ $customer->address }}</td>
                            <td class="p-2 ">{{ $customer->status }}</td>
                            <td class="p-2 ">
                                <a href="{{ route('customer.edit', ['customer' => $customer->id]) }}" class="bg-blue-500 text-white py-2 px-4 rounded">Edit</a>
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
