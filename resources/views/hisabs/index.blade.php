@extends('auth.layouts')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hisab List</title>

    <!-- Include Tailwind CSS -->
    @vite('resources/css/app.css')
</head>
<body class="font-sans bg-gray-100">

    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-4">Hisab List</h1>

        @if(session()->has('success'))
            <div class="bg-green-200 p-2 mb-4">{{ session('success') }}</div>
        @endif

        <div class="mb-4">
            <a href="{{ route('hisab.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded">Create Hisab</a>
            <a href="{{ route('dashboard') }}" class="bg-blue-500 text-white py-2 px-4 rounded">Dashboard </a>
        </div>

        <div>
            <table class="table-auto  border-collapse border border-gray-300">
                <thead>
                    <tr class="border-b bg-gray-200">
                     
                        <th class="p-2 ">Date</th>
                        <th class="p-2 ">Category</th>
                        <th class="p-2 ">Amount</th>
                        <th class="p-2 ">Type</th>
                        <th class="p-2">Edit</th>
                       
                    </tr>
                </thead>
                <tbody>
                    @foreach($hisabs as $hisab)
                        <tr class="border-b border-gray-300">
                          
                            <td class="p-2">{{ $hisab->created_at->format('d-M-y') }}</td>
                            <td class="p-2 ">{{ $hisab->category }}</td>
                            <td class="p-2 ">{{ $hisab->amount }}</td>
                            <td class="p-2 ">{{ $hisab->category_type }}</td>
                            <td class="p-2 ">
                            <a href="{{ route('hisab.edit', ['hisab' => $hisab->id]) }}" class="bg-blue-500 text-white py-2 px-4 rounded">Edit</a>
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
