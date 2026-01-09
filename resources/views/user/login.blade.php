<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center">
    <div class="max-w-7xl w-full mx-auto px-4 py-12">
        @if(isset($error))
        <div class="mb-6 max-w-md mx-auto">
            <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg">
                {{$error}}
            </div>
        </div>
        @endif

        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <!-- Left Side - Title -->
            <div class="text-center lg:text-left">
                <h1 class="text-5xl font-bold text-gray-900 mb-4">Login</h1>
                <p class="text-xl text-gray-600">
                    by <a target="_blank" href="https://www.programmerzamannow.com/" class="text-blue-600 hover:text-blue-700 underline transition">Programmer Zaman Now</a>
                </p>
            </div>

            <!-- Right Side - Login Form -->
            <div class="max-w-md mx-auto w-full">
                <form class="bg-white p-8 rounded-xl shadow-sm border border-gray-200" method="post" action="/login">
                    @csrf
                    <div class="mb-4">
                        <label for="user" class="block text-sm font-medium text-gray-700 mb-2">User</label>
                        <input name="user" type="text" id="user" placeholder="Enter your username" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition">
                    </div>
                    <div class="mb-6">
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                        <input name="password" type="password" id="password" placeholder="Enter your password" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition">
                    </div>
                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-lg transition duration-200">
                        Sign In
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>