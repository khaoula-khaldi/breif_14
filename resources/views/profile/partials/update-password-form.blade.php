<section
class="max-w-xl mx-auto p-8 rounded-3xl
bg-gradient-to-br from-blue-500/10 via-pink-500/10 to-purple-500/10
backdrop-blur-xl shadow-2xl border border-white/10 space-y-8">

    <!-- Header -->
    <header class="text-center space-y-2">
        <h2 class="text-3xl font-bold text-blue-400 tracking-wide">
            {{ __('Update Password') }}
        </h2>

        <p class="text-sm text-gray-300">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <!-- Form -->
    <form method="post" action="{{ route('password.update') }}" class="space-y-6">
        @csrf
        @method('put')

        <!-- Current Password -->
        <div class="space-y-1">
            <label for="update_password_current_password"
                class="text-sm font-medium text-gray-300">
                Current Password
            </label>

            <input
                id="update_password_current_password"
                name="current_password"
                type="password"
                autocomplete="current-password"
                class="w-full px-4 py-3 rounded-xl
                       bg-gray-800 text-white
                       placeholder-gray-500
                       focus:outline-none
                       focus:ring-2 focus:ring-blue-500"
            >

            <x-input-error
                :messages="$errors->updatePassword->get('current_password')"
                class="text-red-400 text-sm" />
        </div>

        <!-- New Password -->
        <div class="space-y-1">
            <label for="update_password_password"
                class="text-sm font-medium text-gray-300">
                New Password
            </label>

            <input
                id="update_password_password"
                name="password"
                type="password"
                autocomplete="new-password"
                class="w-full px-4 py-3 rounded-xl
                       bg-gray-800 text-white
                       placeholder-gray-500
                       focus:outline-none
                       focus:ring-2 focus:ring-pink-500"
            >

            <x-input-error
                :messages="$errors->updatePassword->get('password')"
                class="text-red-400 text-sm" />
        </div>

        <!-- Confirm Password -->
        <div class="space-y-1">
            <label for="update_password_password_confirmation"
                class="text-sm font-medium text-gray-300">
                Confirm Password
            </label>

            <input
                id="update_password_password_confirmation"
                name="password_confirmation"
                type="password"
                autocomplete="new-password"
                class="w-full px-4 py-3 rounded-xl
                       bg-gray-800 text-white
                       placeholder-gray-500
                       focus:outline-none
                       focus:ring-2 focus:ring-purple-500"
            >

            <x-input-error
                :messages="$errors->updatePassword->get('password_confirmation')"
                class="text-red-400 text-sm" />
        </div>

        <!-- Actions -->
        <div class="flex items-center gap-4">

            <button
                type="submit"
                class="px-8 py-3 rounded-xl
                       bg-blue-500 hover:bg-blue-600
                       text-white font-semibold
                       shadow-lg shadow-blue-500/30
                       transition-all">
                Save Changes
            </button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-400"
                >
                    Saved ✔
                </p>
            @endif

        </div>

    </form>
</section>
