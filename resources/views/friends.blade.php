<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Mes Amis</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white min-h-screen">

<!-- Navbar -->
<nav class="bg-black/30 backdrop-blur-md shadow-md p-5 flex justify-between items-center">
    <h1 class="text-2xl font-bold text-white tracking-wide">LINKUP Dashboard</h1>

    <div class="flex items-center gap-6">
        <a href="{{ route('profile.edit') }}" class="text-pink-400 hover:text-white font-medium">Profile</a>
        <a href="{{ route('dashboard') }}" class="text-pink-400 hover:text-white font-medium">Dashboard</a>
        <a href="{{ route('friendRequest.recevoir')}}" class="text-pink-400 hover:text-white font-medium">Demandes d'amis</a>
        <a href="{{ route('friendRequest.friends') }}" class="text-pink-400 hover:text-white font-medium">Mes amis</a>
        <a href="{{ route('home') }}" class="hover:text-pink-500 transition font-medium text-left">posts</a>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="text-red-500 hover:text-red-600 font-medium">
                Logout
            </button>
        </form>
    </div>
</nav>


<h1 class="text-3xl font-bold text-center mt-10 mb-10">👥 Mes amis</h1>

    <div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-6">

        @forelse($users as $user)
            <div class="bg-gray-800 p-6 rounded-xl text-center shadow">

                <div class="w-24 h-24 mx-auto rounded-full bg-gray-600 flex items-center justify-center overflow-hidden">
                    @if($user->image)
                        <img src="{{ asset('storage/'.$user->image) }}" class="w-full h-full object-cover">
                    @else
                        👤
                    @endif
                </div>

                <h2 class="mt-4 font-bold text-lg">{{ $user->pseudo ?? $user->name }}</h2>
                <p class="text-gray-400">{{ $user->email }}</p>

            </div>
        @empty
            <p class="col-span-3 text-center text-gray-500">Aucun ami pour le moment.</p>
        @endforelse

    </div>

</body>
</html>
