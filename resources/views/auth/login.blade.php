<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - LINKUP</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-black min-h-screen flex items-center justify-center">

<div class="relative w-full max-w-md p-10 rounded-3xl shadow-2xl bg-black/20 overflow-hidden">

    <!-- Background gradient -->
    <div class="absolute inset-0 bg-gradient-to-br from-blue-200 via-pink-200 to-purple-200 opacity-50 -z-10 rounded-3xl"></div>

    <h2 class="text-3xl font-bold text-white text-center mb-6">
        Login to LINKUP
    </h2>

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <!-- Email -->
        <div>
            <label class="text-white">Email</label>
            <input type="email" name="email" required
                   class="w-full px-4 py-2 rounded-xl bg-white/80 focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <!-- Password -->
        <div>
            <label class="text-white">Password</label>
            <input type="password" name="password" required
                   class="w-full px-4 py-2 rounded-xl bg-white/80 focus:outline-none focus:ring-2 focus:ring-pink-400">
        </div>

        <!-- Button -->
        <button type="submit"
            class="w-full bg-blue-300 py-3 rounded-xl font-semibold hover:bg-blue-400 transition">
            Login
        </button>

        <!-- Link -->
        <p class="text-center text-white mt-4">
            You don't have an account?
            <a href="{{ route('register') }}" class="text-pink-300 hover:underline">
                Register
            </a>
        </p>
    </form>

</div>

</body>
</html>
