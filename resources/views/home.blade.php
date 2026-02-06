<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Mes Amis / Posts</title>
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

<!-- Posts Feed -->
<main class="p-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse($posts as $post)
        <div class="bg-white text-gray-900 p-6 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 flex flex-col">
            
            <!-- Post Header -->
            <div class="flex items-center gap-4 mb-4">
                <div class="w-12 h-12 rounded-full overflow-hidden bg-gray-200 border-2 border-indigo-400 flex items-center justify-center">
                    <img src="{{ $post->user->photo ?? 'https://via.placeholder.com/48' }}" class="w-full h-full object-cover" alt="avatar">
                </div>
                <div>
                    <h3 class="font-semibold">{{ $post->user->name ?? 'Utilisateur' }}</h3>
                    <p class="text-gray-500 text-sm">{{ $post->created_at->diffForHumans() }}</p>
                </div>
            </div>

            <!-- Post Content -->
            <p class="mb-4">{{ $post->content }}</p>

            <!-- Post Image -->
            @if($post->image)
                <img src="{{ asset('storage/'.$post->image) }}" class="rounded-xl mb-4 shadow-md object-cover">
            @endif

            <!-- Post Actions -->
            <div class="flex items-center justify-between text-sm">
                <!-- Likes -->
                <form action="{{ route('like', $post->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="flex items-center gap-1 
                        {{ $post->likes->where('user_id', auth()->id())->count() ? 'text-blue-500' : 'text-gray-500' }}">
                        👍 <span>{{ $post->likes->count() }}</span>
                    </button>
                </form>

                <!-- Comments placeholder -->
                <button class="flex items-center gap-1 text-gray-500 hover:text-green-500 transition">
                    💬 <span>{{ $post->comments_count ?? 0 }}</span>
                </button>

                <!-- Edit / Delete -->
                <div class="flex gap-2">
                    @if(auth()->id() == $post->user_id)
                        <a href="{{ route('posts.edit', $post->id) }}" class="text-blue-500 hover:text-blue-700 transition">Modifier</a>

                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Supprimer ce post ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 transition">Supprimer</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    @empty
        <p class="text-gray-400 col-span-full text-center">Aucun post pour le moment.</p>
    @endforelse
</main>

</body>
</html>
