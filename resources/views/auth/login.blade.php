<!-- resources/views/auth/login.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - LINKUP</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-b from-gray-900 to-gray-800 min-h-screen flex items-center justify-center">

    <div class="relative w-full max-w-md p-10 rounded-3xl shadow-2xl bg-black/70 backdrop-blur-lg overflow-hidden">
        <!-- Soft pastel gradient background -->
        <div class="absolute inset-0 bg-gradient-to-tr from-pink-400 via-blue-300 to-purple-400 opacity-20 -z-10 rounded-3xl"></div>

        <h2 class="text-4xl font-extrabold text-white text-center mb-6 tracking-wide">Se connecter</h2>

        <!-- Validation Errors -->
        @if ($errors->any())
            <div class="bg-red-200 p-4 rounded mb-4">
                <ul class="list-disc list-inside text-red-700 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            <!-- Email -->
            <div>
                <input type="email" name="email" placeholder="Email" required
                       class="w-full px-4 py-3 rounded-2xl bg-white/80 text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <!-- Password -->
            <div>
                <input type="password" name="password" placeholder="Mot de passe" required
                       class="w-full px-4 py-3 rounded-2xl bg-white/80 text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-pink-400">
            </div>

            <!-- Button -->
            <button type="submit"
                class="w-full bg-pink-500 hover:bg-pink-600 text-white py-3 rounded-2xl font-semibold shadow-lg transition">
                Se connecter
            </button>

            <!-- Link to Register -->
            <p class="text-center text-gray-300 mt-4 text-sm">
                Vous n'avez pas de compte ?
                <a href="{{ route('register') }}" class="text-blue-400 hover:underline font-medium">
                    S'inscrire
                </a>
            </p>
        </form>
    </div>

</body>
</html>
