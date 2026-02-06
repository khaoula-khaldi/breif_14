<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Créer un post - LINKUP</title>
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


<div class="max-w-2xl mx-auto p-6 bg-gray-800/70 rounded-3xl shadow-2xl mt-10">
    <h1 class="text-3xl font-bold text-pink-400 mb-6 text-center">Créer un nouveau post</h1>

    <form action="{{ route('post.store') }}" method="POST" class="space-y-6">
        @csrf
        <div>
            <label class="block text-gray-300 mb-2 font-medium">Titre</label>
            <input type="text" name="titre" placeholder="Titre du post"
                   class="w-full px-5 py-3 rounded-xl bg-gray-700 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-pink-400 transition"
                   required>
        </div>

        <div>
            <label class="block text-gray-300 mb-2 font-medium">Contenu</label>
            <textarea name="content" rows="5" placeholder="Écrivez votre post..."
                      class="w-full px-5 py-3 rounded-xl bg-gray-700 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-pink-400 transition"
                      required></textarea>
        </div>


        <div class="text-center">
            <button type="submit"
                    class="bg-pink-500 hover:bg-pink-600 px-8 py-3 rounded-2xl font-semibold transition text-white">
                Publier
            </button>
        </div>
    </form>
</div>

</body>
</html>
