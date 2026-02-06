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
<div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded-2xl shadow-lg">

    <h2 class="text-2xl font-bold mb-6 text-center">Modifier Post</h2>

    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Title -->
        <div class="mb-4">
            <label class="block text-gray-700 mb-1">Titre</label>
            <input type="text"
                   name="title"
                   value="{{ old('title', $post->title) }}"
                   class="text-black w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Content -->
        <div class="mb-4">
            <label class="block text-gray-700 mb-1">Contenu</label>
            <textarea name="content"
                      rows="4"
                      class="text-black w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('content', $post->content) }}</textarea>
        </div>

        <!-- Buttons -->
        <div class="flex justify-between">

            <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                Enregistrer
            </button>
        </div>

    </form>
</div>

</body>
</htmt>