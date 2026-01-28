<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - LINKUP</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-black min-h-screen flex items-center justify-center">

<div class="relative w-full max-w-md p-10 rounded-3xl shadow-2xl bg-black/20 overflow-hidden">

    <!-- Background gradient -->
    <div class="absolute inset-0 bg-gradient-to-br from-blue-200 via-pink-200 to-purple-200 opacity-50 -z-10 rounded-3xl"></div>

    <h2 class="text-3xl font-bold text-white text-center mb-6">
        Create Account
    </h2>

    <!-- Validation Errors -->
    @if ($errors->any())
        <div class="bg-red-200 p-4 rounded mb-4">
            <ul class="list-disc list-inside text-red-700">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        <!-- Name -->
        <div>
            <label class="text-white">Name</label>
            <input type="text" name="name" value="{{ old('name') }}" required
                   class="w-full px-4 py-2 rounded-xl bg-white/80 focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <!-- Pseudo -->
        <div>
            <label class="text-white">Pseudo</label>
            <input type="text" name="pseudo" value="{{ old('pseudo') }}" required
                   class="w-full px-4 py-2 rounded-xl bg-white/80 focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <!-- Email -->
        <div>
            <label class="text-white">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required
                   class="w-full px-4 py-2 rounded-xl bg-white/80 focus:outline-none focus:ring-2 focus:ring-pink-400">
        </div>

        <!-- Password -->
        <div>
            <label class="text-white">Password</label>
            <input type="password" name="password" required
                   class="w-full px-4 py-2 rounded-xl bg-white/80 focus:outline-none focus:ring-2 focus:ring-purple-400">
        </div>

        <!-- Confirm Password -->
        <div>
            <label class="text-white">Confirm Password</label>
            <input type="password" name="password_confirmation" required
                   class="w-full px-4 py-2 rounded-xl bg-white/80 focus:outline-none focus:ring-2 focus:ring-purple-400">
        </div>

        <!-- Bio -->
        <div>
            <label class="text-white">Bio</label>
            <textarea name="bio" class="w-full px-4 py-2 rounded-xl bg-white/80 focus:outline-none focus:ring-2 focus:ring-blue-400">{{ old('bio') }}</textarea>
        </div>

        <!-- Photo URL -->
        <div>
            <label class="text-white">Photo URL</label>
            <input type="text" name="photo" value="{{ old('photo') }}"
                   class="w-full px-4 py-2 rounded-xl bg-white/80 focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <!-- Button -->
        <button type="submit"
            class="w-full bg-pink-300 py-3 rounded-xl font-semibold hover:bg-pink-400 transition">
            Register
        </button>

        <!-- Link -->
        <p class="text-center text-white mt-4">
            Already have an account?
            <a href="{{ route('login') }}" class="text-blue-300 hover:underline">
                Login
            </a>
        </p>
    </form>

</div>

</body>
</html>
