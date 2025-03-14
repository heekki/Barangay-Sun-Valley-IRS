<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>

    @vite('resources/css/app.css')
    @vite('resources/js/app.jsx')

    <style>
        body {
            font-family: 'Helvetica Neue', Arial, sans-serif;
        }

        .nav-link:hover {
            background-color: #4a5568;
        }

        .btn {
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .btn:hover {
            background-color: #2d3748;
            transform: translateY(-2px);
        }
    </style>
</head>


<body class="bg-cover bg-center bg-fixed" style="background-image: url('/img/background.png');">
<nav class="bg-gray-800 shadow-md p-4 sticky top-0 z-50">
    <div class="flex items-center justify-between">
        <img src="/img/sun-valley-logo.jpg" alt="Sun Valley Logo" class="rounded-full h-10 w-10 ml-4">
        <p class="text-sm color white p-2 font-bold text-white">Sun Valley IRS</p>

        <div class="flex-1 text-center">
            <a href="{{ route('adminDashboard') }}" class="nav-link text-white px-3 py-2 rounded-md text-sm font-small">AdminDashTest</a>
            <a href="{{ route('report') }}" class="nav-link text-white px-3 py-2 rounded-md text-md font-small">Home</a>
            <a href="{{ route('track') }}" class="nav-link text-white px-3 py-2 rounded-md text-md font-small">Reports</a>
            <a href="{{ route('about') }}" class="nav-link text-white px-3 py-2 rounded-md text-md font-small">Contact</a>
        </div>

        <div class="flex items-center space-x-4">
            @guest
                <a href="{{ route('login') }}" class="btn text-white px-3 py-2 rounded-md text-lg font-medium hover:bg-gray-700">Login</a>
                <a href="{{ route('register') }}" class="btn text-white px-3 py-2 rounded-md text-lg font-medium hover:bg-gray-700">Register</a>
            @else
                <div class="relative group">
                    <button class="text-white px-3 py-2 rounded-md text-sm font-small hover:bg-gray-700 focus:outline-none">
                        {{ Auth::user()->name }}
                    </button>
                    <div class="absolute hidden group-hover:block bg-gray-800 text-white right-0 mt-2 w-48 rounded shadow-lg">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-2 hover:bg-gray-700">Logout</button>
                        </form>
                    </div>
                </div>
            @endguest
        </div>
    </div>
</nav>


    <div class="container mx-auto mt-8">
        <h1 class="text-3xl font-bold text-center text-white mb-4 border-1 border-blackpurple bg-gray-800 px-4 py-2 rounded-lg">Admin Incident Reports</h1>
        <div class="flex justify-end mb-4">
        @if(auth()->check() && auth()->user()->role_id >= 1 && auth()->user()->role_id <= 2)
            <button class="bg-green-600 hover:bg-green-900 text-yellow-100 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Add New Report
            </button>
        @else
            <button class="bg-green-600 hover:bg-green-900 text-yellow-100 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" disabled style="visibility: hidden;">
                Add New Report
            </button>
        @endif
        </div>
        <table class="min-w-full bg-white shadow-md rounded">
            <thead>
                <tr>
                    <th class="py-2 px-4 bg-gray-800 text-yellow-100">ID</th>
                    <th class="py-2 px-4 bg-gray-800 text-yellow-100">Reported Name</th>
                    <th class="py-2 px-4 bg-gray-800 text-yellow-100">Date Reported</th>
                    <th class="py-2 px-4 bg-gray-800 text-yellow-100">Location</th>
                    <th class="py-2 px-4 bg-gray-800 text-yellow-100">Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Example row -->
                <tr>
                    <td class="border px-4 py-2">1</td>
                    <td class="border px-4 py-2">John Doe</td>
                    <td class="border px-4 py-2">2023-10-01</td>
                    <td class="border px-4 py-2">New York</td>
                    <td class="border px-4 py-2">
                        @if(auth()->check() && auth()->user()->role_id >= 1 && auth()->user()->role_id <= 2)
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">Edit</button>
                            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Delete</button>
                        @else
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded" disabled style="visibility: hidden;">Edit</button>
                            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded" disabled style="visibility: hidden;">Delete</button>
                        @endif
                    </td>
                </tr>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>



</body>
</html>
