<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50">
    <!-- Todolist Section -->
    <div class="max-w-7xl mx-auto px-4 py-12">
        @if(isset($error))
        <div class="mb-6 max-w-md mx-auto">
            <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg">
                {{$error}}
            </div>
        </div>
        @endif

        <!-- Logout Button -->
        <div class="mb-8">
            <form method="post" action="/logout">
                @csrf
                <button type="submit"
                    class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-6 rounded-lg transition duration-200">
                    Sign Out
                </button>
            </form>
        </div>

        <!-- Add Todo Form -->
        <div class="grid lg:grid-cols-2 gap-8 items-center py-12">
            <div class="text-center lg:text-left">
                <h1 class="text-5xl font-bold text-gray-900 mb-4">Todolist</h1>
                <p class="text-xl text-gray-600">
                    by <a target="_blank" href="https://www.programmerzamannow.com/"
                        class="text-blue-600 hover:text-blue-700 underline">Programmer Zaman Now</a>
                </p>
            </div>
            <div class="max-w-md mx-auto w-full">
                <form class="bg-white p-8 rounded-xl shadow-sm border border-gray-200" method="post" action="/todolist">
                    @csrf
                    <div class="mb-6">
                        <label for="todo" class="block text-sm font-medium text-gray-700 mb-2">Todo</label>
                        <input type="text" name="todo" id="todo" placeholder="Enter your todo"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition">
                    </div>
                    <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-lg transition duration-200">
                        Add Todo
                    </button>
                </form>
            </div>
        </div>

        <!-- Todo List Table -->
        <div class="py-12">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <form id="deleteForm" method="post" class="hidden"></form>
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Todo</th>
                            <th scope="col"
                                class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($todolist as $todo)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $todo['id'] }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $todo['todo'] }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm">
                                <button type="submit"
                                    class="bg-red-600 hover:bg-red-700 text-white font-medium py-2 px-4 rounded-lg transition duration-200">
                                    Remove
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>