<section class="p-6 bg-white/50 backdrop-blur-md rounded-3xl shadow-xl text-white max-w-xl mx-auto">
    <!-- Header -->
    <header class="mb-6 text-center">
        <h2 class="text-2xl font-bold text-pink-200">
            {{ __('Profile Information') }}
        </h2>
        <p class="mt-1 text-sm text-blue-200">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <!-- Verification Form -->
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <!-- Profile Update Form -->
    <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
        @csrf
        @method('patch')

        <!-- Name -->
        <div>
            <label for="name" class="block text-sm font-medium text-pink-200">{{ __('Name') }}</label>
            <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}"
                   class="mt-1 block w-full px-4 py-2 rounded-xl bg-white/20 text-black placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-200"
                   required autofocus autocomplete="name">
            @error('name')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- pseudo -->
        <div>
            <label for="pseudo" class="block text-sm font-medium text-pink-200">{{ __('pseudo') }}</label>
            <input id="pseudo" name="pseudo" type="text" value="{{ old('pseudo', $user->pseudo) }}"
                   class="mt-1 block w-full px-4 py-2 rounded-xl bg-white/20 text-black placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-200"
                   required autofocus autocomplete="pseudo">
            @error('pseudo')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email -->
        <div>
            <label for="email" class="block text-sm font-medium text-pink-200">{{ __('Email') }}</label>
            <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}"
                   class="mt-1 block w-full px-4 py-2 rounded-xl bg-white/20 text-black placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-200"
                   required autocomplete="username">
            @error('email')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror

            <!-- Email verification notice -->
            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-2 text-sm text-gray-200">
                    {{ __('Your email address is unverified.') }}
                    <button form="send-verification" class="underline text-blue-200 hover:text-pink-200 ml-1">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-green-400 text-sm">{{ __('A new verification link has been sent to your email address.') }}</p>
                    @endif
                </div>
            @endif
        </div>

        <!-- bio -->
        <div>
            <label for="bio" class="block text-sm font-medium text-pink-200">{{ __('Bio') }}</label>
            <textarea id="bio" name="bio" rows="3"
                class="mt-1 block w-full px-4 py-2 rounded-xl bg-white/20 text-black placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-200"
                placeholder="{{ __('Tell us something about yourself...') }}">{{ old('bio', $user->bio) }}</textarea>
            @error('bio')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <x-input-label for="photo" value="Profile Photo"/>
            <input type="file" name="photo" id="photo" />
            @if($user->photo)
                <img src="{{ asset('storage/'.$user->photo) }}" class="w-20 h-20 rounded-full mt-2" />
            @endif
        </div>

        <!-- Buttons -->
        <div class="flex items-center gap-4">
            <button type="submit" class="px-6 py-2 bg-pink-200 hover:bg-pink-300 text-black font-semibold rounded-xl transition">
                {{ __('Save') }}
            </button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-blue-200"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
