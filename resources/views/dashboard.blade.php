<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen">

    <!-- Navbar -->
    <nav class="bg-white shadow-md p-4 flex justify-between items-center">
        <h1 class="text-xl font-bold text-gray-800">Dashboard</h1>
        <div class="flex gap-4">
            <a href="{{ route('profile.edit') }}" class="text-blue-500 hover:underline">Profile</a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="text-red-500 hover:underline">Logout</button>
            </form>
        </div>
    </nav>

    <!-- Welcome message -->
    <div class="max-w-4xl mx-auto mt-10 text-center">
        <h2 class="text-3xl font-semibold text-gray-800 mb-2">Bienvenue, {{ auth()->user()->pseudo ?? auth()->user()->name }} !</h2>
        <p class="text-gray-600">Voici votre dashboard, vous pouvez gérer votre profil et vos informations.</p>
    </div>

    <!-- Cards / Stats -->
    <div class="max-w-4xl mx-auto mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
            <h3 class="text-lg font-semibold text-gray-700 mb-2">Messages</h3>
            <p class="text-2xl font-bold text-gray-900">12</p>
        </div>
        <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
            <h3 class="text-lg font-semibold text-gray-700 mb-2">Notifications</h3>
            <p class="text-2xl font-bold text-gray-900">5</p>
        </div>
        <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
            <h3 class="text-lg font-semibold text-gray-700 mb-2">Tâches</h3>
            <p class="text-2xl font-bold text-gray-900">8</p>
        </div>
    </div>

</body>
</html>
