<!-- resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue - LINKUP</title>
   <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black min-h-screen flex items-center justify-center">

    <div class="relative text-center max-w-3xl mx-auto p-12 rounded-3xl shadow-2xl overflow-hidden bg-black/20">
        <!-- Background gradient pastel derrière la card -->
        <div class="absolute inset-0 bg-gradient-to-br from-blue-200 via-pink-200 to-purple-200 opacity-50 -z-10 rounded-3xl"></div>

        <h1 class="text-4xl font-bold text-white mb-6">Bienvenue sur LINKUP!</h1>

        <p class="text-white mb-8 text-lg">
            La société <strong>LINKUP</strong> est une jeune startup qui souhaite créer une plateforme simple et efficace, 
            elle cherche à créer un espace sécurisé où les utilisateurs peuvent s'inscrire, personnaliser leur profil et retrouver 
            facilement d'autres membres grâce à un système de recherche performant.
        </p>

        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="{{ route('login') }}" 
               class="bg-blue-300 text-black px-6 py-3 rounded-xl font-semibold hover:bg-blue-400 transition">
               Login
            </a>
            <a href="{{ route('register') }}" 
               class="bg-pink-300 text-black px-6 py-3 rounded-xl font-semibold hover:bg-pink-400 transition">
               Register
            </a>
        </div>
    </div>

</body>


</html>
