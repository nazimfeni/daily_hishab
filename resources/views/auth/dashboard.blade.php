@extends('auth.layouts')
@section('content')
@vite('resources/css/app.css')
<div class="flex justify-center items-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <div class="text-2xl font-semibold mb-6">Dashboard</div>

        @if ($message = Session::get('success'))
            <div class="bg-green-200 text-green-800 py-2 px-4 mb-4 rounded">
                {{ $message }}
            </div>
        @else
            <div class="bg-green-200 text-green-800 py-2 px-4 mb-4 rounded">
                Hello, Admin, You are logged in!
            </div>
        @endif

        <div class="card">
            <!-- Your card content goes here -->
        </div>
    </div>
</div>
@endsection
