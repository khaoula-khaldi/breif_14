<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - LINKUP</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-black min-h-screen">

<!-- Navbar -->
<nav class="bg-black/30 backdrop-blur-md shadow-md p-5 flex justify-between items-center">
    <h1 class="text-2xl font-bold text-white">LINKUP Dashboard</h1>

    <div class="flex items-center gap-6">
        <a href="{{ route('profile.edit') }}" class="text-pink-400 hover:text-white font-medium">Profile</a>
        <a href="{{ route('dashboard') }}" class="text-pink-400 hover:text-white font-medium">Dashboard</a>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="text-red-500 hover:text-red-600 font-medium">
                Logout
            </button>
        </form>
    </div>
</nav>

<!-- Main -->
<div class="max-w-5xl mx-auto mt-10 px-4">

    <!-- Profile Card -->
    <div class="bg-white rounded-2xl shadow p-8 flex flex-col md:flex-row items-center gap-8">

        <!-- Avatar -->
        <div class="w-32 h-32 rounded-full bg-gray-300 overflow-hidden">
            <img 
                src="{{ auth()->user()->photo ?? 'https://via.placeholder.com/150' }}" 
                class="w-full h-full object-cover"
            >
        </div>

        <!-- Info -->
        <div class="text-center md:text-left">
            <h2 class="text-2xl font-bold text-gray-900">
                {{ auth()->user()->pseudo ?? auth()->user()->name }}
            </h2>

            <p class="text-gray-600 mt-1">
                {{ auth()->user()->bio ?? 'Aucune bio pour le moment.' }}
            </p>
        </div>
    </div>

    <!-- 🔍 Search Bar -->
    <div class="mt-10">
        <form action="{{ route('search') }}" method="GET" class="flex gap-4">
            <input 
                type="text"
                name="q"
                placeholder="Rechercher par pseudo ou email..."
                class="w-full px-5 py-3 rounded-xl bg-gray-900 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-pink-400"
            >

            <button class="bg-pink-500 hover:bg-pink-600 text-white px-6 py-3 rounded-xl font-semibold">
                Search
            </button>
        </form>
    </div>

    <!-- 👥 Results -->
    @if(isset($users))
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-10">

        @forelse($users as $user)
        <div class="bg-white rounded-2xl shadow p-6 text-center hover:scale-105 transition">

            <div class="w-24 h-24 mx-auto rounded-full overflow-hidden bg-gray-300">
                <img 
                    src="{{ $user->photo ?? 'https://via.placeholder.com/150' }}" 
                    class="w-full h-full object-cover"
                >
            </div>

            <h3 class="mt-4 text-lg font-bold">
                {{ $user->pseudo ?? $user->name }}
            </h3>

            <p class="text-gray-500 text-sm">
                {{ $user->email }}
            </p>

            <a href="#"
               class="inline-block mt-4 bg-pink-500 text-white px-5 py-2 rounded-full hover:bg-pink-600">
                View Profile
            </a>

        </div>
        @empty
            <p class="text-gray-400 col-span-3 text-center">
                Aucun utilisateur trouvé.
            </p>
        @endforelse

    </div>
    @endif

</div>

</body>
</html>
