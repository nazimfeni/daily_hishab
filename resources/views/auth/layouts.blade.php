<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom Auth in Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body class="font-sans bg-gray-100">

    <nav class="bg-blue-100 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="#" class="text-xl font-bold">Menu</a>

            <button class="lg:hidden block text-blue-500 hover:text-blue-600 focus:outline-none focus:text-blue-600"
                type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="hidden  lg:flex space-x-4">
                @guest
                    <a href="{{ route('login') }}" class="text-blue-500 hover:text-blue-600 mt-2">Login</a>
                    <a href="{{ route('register') }}" class="text-blue-500 hover:text-blue-600 mt-2">Register</a>
                @else
                    <a href="{{ route('signout') }}" class="text-blue-500 hover:text-blue-600 mt-2">Logout</a>
                    <a href="{{ route('product.index') }}" class="text-blue-500 hover:text-blue-600 mt-2">Product</a>
                    <a href="{{ route('supplier.index') }}" class="text-blue-500 hover:text-blue-600 mt-2">Supplier</a>
                    <a href="{{ route('categories.index') }}" class="text-blue-500 hover:text-blue-600 mt-2">Category</a>
                    <a href="{{ route('customer.index') }}" class="text-blue-500 hover:text-blue-600 mt-2">Customer</a>
                    <a href="{{ route('hisab.index') }}" class="text-blue-500 hover:text-blue-600 mt-2">Hisab</a>
                    <div class="flex items-center">
                        <!-- Placeholder for profile icon -->
                        <span class="bg-secondary text-white p-2 rounded-full me-2">Profile</span>
                        {{ Auth::user()->name }}
                    </div>
                @endguest
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        @yield('content')
    </div>

</body>
</html>
