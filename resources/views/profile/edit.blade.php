<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - LINKUP</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-black min-h-screen">

<!-- Navbar -->
<nav class="bg-black/30 backdrop-blur-md shadow-md p-5 flex justify-between items-center">
    <h1 class="text-2xl font-bold text-white">LINKUP Dashboard</h1>

    <div class="flex items-center gap-6">
        <a href="{{ route('profile.edit') }}" class="text-pink-400 hover:text-white font-medium">
            Profile
        </a>
        <a href="{{ route('dashboard') }}" class="text-pink-400 hover:text-white font-medium">
            dashboard
        </a>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="text-red-500 hover:text-red-600 font-medium">
                Logout
            </button>
        </form>
    </div>
</nav>

<!-- Page Content -->
<div class="pt-24 px-4">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">

        <!-- Update Profile Info -->
        <div class="p-6 bg-white/10 backdrop-blur-md rounded-3xl shadow-xl text-white">
            <h3 class="text-xl font-semibold text-pink-200 mb-4">Profile Info</h3>
            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <!-- Update Password -->
        <div class="p-6 bg-white/10 backdrop-blur-md rounded-3xl shadow-xl text-white">
            <h3 class="text-xl font-semibold text-blue-200 mb-4">Security</h3>
            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <!-- Delete Account -->
        <div class="p-6 bg-white/10 backdrop-blur-md rounded-3xl shadow-xl text-white">
            <h3 class="text-xl font-semibold text-red-400 mb-4">Delete Account</h3>
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>

    </div>
</div>

</body>
</html>
