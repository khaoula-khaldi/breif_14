<section
class="max-w-xl mx-auto p-8 rounded-3xl
bg-gradient-to-br from-pink-500/10 via-purple-500/10 to-blue-500/10
backdrop-blur-xl shadow-2xl border border-white/10 space-y-8">

    <!-- Header -->
    <header class="text-center space-y-2">
        <h2 class="text-3xl font-bold text-pink-400 tracking-wide">
            {{ __('Profile Information') }}
        </h2>

        <p class="text-sm text-gray-300">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <!-- Verification -->
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <!-- Profile Form -->
    <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
        @csrf
        @method('patch')

        <!-- Name -->
        <div class="space-y-1">
            <label for="name" class="text-sm text-gray-300">Name</label>
            <input
                id="name"
                name="name"
                type="text"
                value="{{ old('name', $user->name) }}"
                class="w-full px-4 py-3 rounded-xl
                       bg-gray-800 text-white
                       focus:ring-2 focus:ring-pink-500 focus:outline-none"
                required
            >
            @error('name')
                <p class="text-red-400 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <!-- Pseudo -->
        <div class="space-y-1">
            <label for="pseudo" class="text-sm text-gray-300">Pseudo</label>
            <input
                id="pseudo"
                name="pseudo"
                type="text"
                value="{{ old('pseudo', $user->pseudo) }}"
                class="w-full px-4 py-3 rounded-xl
                       bg-gray-800 text-white
                       focus:ring-2 focus:ring-purple-500 focus:outline-none"
                required
            >
            @error('pseudo')
                <p class="text-red-400 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email -->
        <div class="space-y-1">
            <label for="email" class="text-sm text-gray-300">Email</label>
            <input
                id="email"
                name="email"
                type="email"
                value="{{ old('email', $user->email) }}"
                class="w-full px-4 py-3 rounded-xl
                       bg-gray-800 text-white
                       focus:ring-2 focus:ring-blue-500 focus:outline-none"
                required
            >

            @error('email')
                <p class="text-red-400 text-sm">{{ $message }}</p>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-2 text-sm text-yellow-400">
                    {{ __('Your email address is unverified.') }}

                    <button
                        form="send-verification"
                        class="underline text-blue-400 hover:text-blue-300 ml-1">
                        {{ __('Resend verification email') }}
                    </button>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-1 text-green-400">
                            Verification link sent 
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <!-- Bio -->
        <div class="space-y-1">
            <label for="bio" class="text-sm text-gray-300">Bio</label>
            <textarea
                id="bio"
                name="bio"
                rows="3"
                class="w-full px-4 py-3 rounded-xl
                       bg-gray-800 text-white
                       focus:ring-2 focus:ring-pink-500 focus:outline-none"
            >{{ old('bio', $user->bio) }}</textarea>

            @error('bio')
                <p class="text-red-400 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <!-- Photo -->
        <div class="space-y-2">
            <label class="text-sm text-gray-300">Profile Photo</label>

            <input
                type="file"
                name="photo"
                id="photo"
                class="block w-full text-sm text-gray-300
                       file:bg-blue-600 file:text-white
                       file:px-4 file:py-2 file:rounded-lg
                       file:border-0 file:cursor-pointer"
            >

            @if($user->photo)
                <img
                    src="{{ asset('storage/'.$user->photo) }}"
                    class="w-24 h-24 rounded-full object-cover border-2 border-pink-500"
                >
            @endif
        </div>

        <!-- Actions -->
        <div class="flex items-center gap-4">

            <button
                type="submit"
                class="px-8 py-3 rounded-xl
                       bg-pink-500 hover:bg-pink-600
                       text-white font-semibold
                       shadow-lg shadow-pink-500/30
                       transition-all">
                Save Changes
            </button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-green-400 text-sm"
                >
                    Saved 
                </p>
            @endif

        </div>

    </form>

</section>
