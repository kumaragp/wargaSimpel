<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login</title>
    <style>
        .font-inter {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body>
<nav class="w-full text-md flex justify-between items-center py-4 px-10 fixed top-0 left-0 right-0 bg-green-950 shadow-md z-50">
    <a href="{{ route('home') }}">
        <img src="images/wargasimpel.png" class="w-64 h-auto ml-6">
    </a>
    <ul class="flex space-x-8 ml-auto">
        <li><a href="{{ route('home') }}"
                class="bg-emerald-500 text-green-950 py-3 px-8 rounded-lg hover:bg-gray-300 transition-all duration-300">BERANDA</a>
        </li>
    </ul>
</nav>
</body>
