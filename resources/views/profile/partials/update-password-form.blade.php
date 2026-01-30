<section class="p-6 bg-white/50 backdrop-blur-md rounded-3xl shadow-xl text-white max-w-xl mx-auto">
    <!-- Header -->
    <header class="mb-6 text-center">
        <h2 class="text-2xl font-bold text-pink-200">
            {{ __('Update Password') }}
        </h2>
        <p class="mt-1 text-sm text-blue-200">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <!-- Password Update Form -->
    <form method="post" action="{{ route('password.update') }}" class="space-y-6">
        @csrf
        @method('put')

        <!-- Current Password -->
        <div>
            <label for="update_password_current_password" class="block text-sm font-medium text-pink-200">
                {{ __('Current Password') }}
            </label>
            <input id="update_password_current_password" name="current_password" type="password"
                   class="mt-1 block w-full px-4 py-2 rounded-xl bg-white/20 text-black placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-200"
                   autocomplete="current-password">
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="text-red-400 text-sm mt-1" />
        </div>

        <!-- New Password -->
        <div>
            <label for="update_password_password" class="block text-sm font-medium text-pink-200">
                {{ __('New Password') }}
            </label>
            <input id="update_password_password" name="password" type="password"
                   class="mt-1 block w-full px-4 py-2 rounded-xl bg-white/20 text-black placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-200"
                   autocomplete="new-password">
            <x-input-error :messages="$errors->updatePassword->get('password')" class="text-red-400 text-sm mt-1" />
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="update_password_password_confirmation" class="block text-sm font-medium text-pink-200">
                {{ __('Confirm Password') }}
            </label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password"
                   class="mt-1 block w-full px-4 py-2 rounded-xl bg-white/20 text-black placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-200"
                   autocomplete="new-password">
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="text-red-400 text-sm mt-1" />
        </div>

        <!-- Buttons -->
        <div class="flex items-center gap-4">
            <button type="submit" class="px-6 py-2 bg-pink-200 hover:bg-pink-300 text-black font-semibold rounded-xl transition">
                {{ __('Save') }}
            </button>

            @if (session('status') === 'password-updated')
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
