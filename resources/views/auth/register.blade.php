@extends('auth.layouts')

@section('content')
@vite('resources/css/app.css')
<main class="signup-form">
    <div class="container mx-auto">
        <div class="flex justify-center">
            <div class="w-full max-w-md">
                <div class="bg-white border-t-4 border-blue-500 rounded-t p-4">
                    <h3 class="text-center text-lg font-semibold">Register User</h3>
                </div>
                <div class="bg-white rounded-b p-4">
                    <form action="{{ route('register.custom') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <input type="text" placeholder="Name" id="name" class="form-input" name="name" required
                                autofocus>
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <input type="text" placeholder="Email" id="email_address" class="form-input" name="email"
                                required autofocus>
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <input type="text" placeholder="Role" id="role" class="form-input" name="role" required
                                autofocus>
                            @error('role')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <input type="password" placeholder="Password" id="password" class="form-input"
                                name="password" required>
                            @error('password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="inline-flex items-center">
                                <input type="checkbox" name="remember" class="form-checkbox">
                                <span class="ml-2">Remember Me</span>
                            </label>
                        </div>

                        <div class="grid place-items-center">
                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Sign Up</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
