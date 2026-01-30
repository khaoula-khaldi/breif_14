<!-- resources/views/dashboard.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - LINKUP</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-900 min-h-screen text-white">

<!-- Navbar -->
<nav class="bg-black/30 backdrop-blur-md shadow-md p-5 flex justify-between items-center">
    <h1 class="text-2xl font-bold text-white tracking-wide">LINKUP Dashboard</h1>

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
<div class="max-w-6xl mx-auto mt-10 px-4 space-y-10">

    <!-- Profile Card -->
    <div class="bg-gray-800/70 rounded-3xl shadow-xl p-8 flex flex-col md:flex-row items-center gap-8">
        <!-- Avatar -->
        <div class="w-32 h-32 rounded-full overflow-hidden bg-gray-600">
            <img src="{{ auth()->user()->photo ?? 'https://via.placeholder.com/150' }}" class="w-full h-full object-cover">
        </div>

        <!-- Info -->
        <div class="text-center md:text-left">
            <h2 class="text-2xl font-bold">{{ auth()->user()->pseudo ?? auth()->user()->name }}</h2>
            <p class="text-gray-400 mt-2">{{ auth()->user()->bio ?? 'Aucune bio pour le moment.' }}</p>
        </div>
    </div>

    <!-- 🔍 Search Bar -->
    <div class="flex justify-center">
        <form action="{{ route('search') }}" method="GET" class="flex w-full max-w-lg gap-4">
            <input 
                type="text" name="q" placeholder="Rechercher par pseudo ou email..."
                class="flex-1 px-5 py-3 rounded-xl bg-gray-800 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-pink-400"
            >
            <button class="bg-pink-500 hover:bg-pink-600 px-6 py-3 rounded-xl font-semibold transition">
                Search
            </button>
        </form>
    </div>

    <!-- 👥 Search Results -->
    @if(isset($users))
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @forelse($users as $user)
            <div class="bg-gray-800/70 rounded-2xl shadow p-6 text-center hover:scale-105 transition transform">
                <div class="w-24 h-24 mx-auto rounded-full overflow-hidden bg-gray-600">
                    <img src="{{ $user->photo ?? 'https://via.placeholder.com/150' }}" class="w-full h-full object-cover">
                </div>
                <h3 class="mt-4 text-lg font-bold">{{ $user->pseudo ?? $user->name }}</h3>
                <p class="text-gray-400 text-sm">{{ $user->email }}</p>
                <a href="#" class="inline-block mt-4 bg-pink-500 hover:bg-pink-600 text-white px-5 py-2 rounded-full transition">
                    View Profile
                </a>
            </div>
        @empty
            <p class="text-gray-500 col-span-3 text-center">Aucun utilisateur trouvé.</p>
        @endforelse
    </div>
    @endif

</div>

</body>
</html>
