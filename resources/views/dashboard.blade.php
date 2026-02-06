

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard - LINKUP</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white min-h-screen flex">

<!-- Sidebar Profil (à gauche) -->
<aside class="w-72 bg-gray-800/80 shadow-2xl p-6 flex flex-col items-center text-center sticky top-0 h-screen">
    <div class="w-32 h-32 rounded-full overflow-hidden bg-gray-600 flex items-center justify-center mb-4">
        @if(auth()->user()->image)
            <img src="{{ asset('storage/'.auth()->user()->image) }}" class="w-full h-full object-cover">
        @else
            <span class="text-gray-400 text-5xl">👤</span>
        @endif
    </div>
    <h2 class="text-2xl font-bold text-pink-400">{{ auth()->user()->pseudo ?? auth()->user()->name }}</h2>
    <p class="text-gray-400 mt-2">{{ auth()->user()->bio ?? 'Aucune bio pour le moment.' }}</p>
    <nav class="mt-10 flex flex-col gap-4 w-full">
        <a href="{{ route('profile.edit') }}" class="hover:text-pink-500 transition font-medium text-left">Profile</a>
        <a href="{{ route('dashboard') }}" class="hover:text-pink-500 transition font-medium text-left">Dashboard</a>
        <a href="{{ route('friendRequest.recevoir')}}" class="hover:text-pink-500 transition font-medium text-left">Demandes</a>
        <a href="{{ route('friendRequest.friends') }}" class="hover:text-pink-500 transition font-medium text-left">Amis</a>
        <a href="{{ route('home') }}" class="hover:text-pink-500 transition font-medium text-left">posts</a>
        <form action="{{ route('logout') }}" method="POST" class="mt-4">
            @csrf
            <button type="submit" class="text-red-500 hover:text-red-600 font-medium transition w-full text-left">
                Logout
            </button>
        </form>
    </nav>
</aside>

<!-- Main Content (à droite) -->
<main class="flex-1 p-8 space-y-8">

    <!-- Top Bar: Recherche + Ajouter un post -->
    <div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-6">
        <!-- Search -->
        <form action="{{ route('search') }}" method="GET" class="flex w-full md:w-2/3 gap-4">
            <input 
                type="text" name="q" placeholder="Rechercher par pseudo ou email..."
                class="flex-1 px-5 py-3 rounded-xl bg-gray-800 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-pink-400 transition"
            >
            <button class="bg-pink-500 hover:bg-pink-600 px-6 py-3 rounded-xl font-semibold transition">
                Rechercher
            </button>
        </form>

        <!-- Add Post Button -->
        <a href="{{ route('post.create') }}" class="mt-2 md:mt-0 bg-pink-500 hover:bg-pink-600 px-6 py-3 rounded-xl font-semibold transition">
            Ajouter un post
        </a>
    </div>

    <!-- Users List -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @if(isset($users))
            @forelse($users as $user)
                <div class="bg-gray-800/70 rounded-2xl shadow-lg p-6 text-center hover:scale-105 transition transform">
                    <div class="w-24 h-24 mx-auto rounded-full overflow-hidden bg-gray-600 flex items-center justify-center">
                        @if($user->image)
                            <img src="{{ asset('storage/'.$user->image) }}" class="w-full h-full object-cover">
                        @else
                            <span class="text-gray-400 text-4xl">👤</span>
                        @endif
                    </div>
                    <h3 class="mt-4 text-xl font-bold text-pink-400">{{ $user->pseudo ?? $user->name }}</h3>
                    <p class="text-gray-400 text-sm">{{ $user->email }}</p>
                    <form action="{{ route('friendRequest.send', $user->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="mt-4 bg-pink-500 hover:bg-pink-600 text-white px-5 py-2 rounded-full transition">
                            Ajouter
                        </button>
                    </form>
                </div>
            @empty
                <p class="text-gray-500 col-span-3 text-center">Aucun utilisateur trouvé.</p>
            @endforelse
        @endif
    </div>

         
</main>


</body>
</html>
