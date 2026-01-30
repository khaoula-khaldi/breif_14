<!-- resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue - LINKUP</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-b from-gray-900 to-gray-800 min-h-screen flex items-center justify-center">

    <div class="relative bg-black/70 backdrop-blur-lg rounded-3xl shadow-2xl max-w-2xl w-full p-10 text-center">
        <!-- Dégradé pastel derrière la card -->
        <div class="absolute inset-0 bg-gradient-to-tr from-pink-400 via-blue-300 to-purple-400 opacity-20 -z-10 rounded-3xl"></div>

        <!-- Logo / titre -->
        <h1 class="text-5xl font-extrabold text-white mb-6 tracking-wide">LINKUP</h1>

        <!-- Description courte -->
        <p class="text-gray-200 text-lg mb-8">
            Connectez-vous avec vos amis et découvrez de nouvelles personnes. Créez votre profil, partagez votre histoire et trouvez facilement d'autres membres.
        </p>

        <!-- Boutons Login / Register -->
        <div class="flex flex-col sm:flex-row justify-center gap-5">
            <a href="{{ route('login') }}"
               class="bg-white text-gray-900 font-semibold px-8 py-3 rounded-2xl shadow hover:shadow-lg hover:bg-gray-100 transition">
               Connexion
            </a>
            <a href="{{ route('register') }}"
               class="bg-pink-500 text-white font-semibold px-8 py-3 rounded-2xl shadow hover:shadow-lg hover:bg-pink-600 transition">
               Inscription
            </a>
        </div>

        <!-- Footer minimal -->
        <p class="text-gray-400 mt-8 text-sm">© 2026 LINKUP. Tous droits réservés.</p>
    </div>

</body>
</html>
