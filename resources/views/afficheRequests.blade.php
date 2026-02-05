
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
        <a href="{{ route('friendRequest.recevoir')}}" class="text-pink-400 hover:text-white font-medium">Demandes d'amis</a>
        <a href="{{ route('friendRequest.friends') }}" class="text-pink-400 hover:text-white font-medium">Mes amis</a>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="text-red-500 hover:text-red-600 font-medium">
                Logout
            </button>
        </form>
    </div>
</nav>

<h1 class="pt-10 text-3xl font-bold mb-6">Demandes d'amis reçues</h1>

@if($requests->count() > 0)
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach($requests as $request)
            <div class="bg-gray-800 p-4 rounded-xl flex justify-between items-center">
                <!-- Info de l'envoyeur -->
                <div>
                    <p class="font-bold">{{ $request->sender->pseudo ?? $request->sender->name }}</p>
                    <p class="text-gray-400 text-sm">{{ $request->sender->email }}</p>
                </div>

                <!-- Boutons Accepter / Refuser -->
                <div class="flex gap-2">
                    <form action="{{ route('friendRequest.accept', $request->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-green-500 px-4 py-2 rounded hover:bg-green-600">
                            Accepter
                        </button>
                    </form>

                    <form action="{{ route('friendRequest.refuse', $request->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-red-500 px-4 py-2 rounded hover:bg-red-600">
                            Refuser
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@else
    <p class="text-gray-400">Vous n'avez aucune demande en attente.</p>
@endif

</body>
</html>
