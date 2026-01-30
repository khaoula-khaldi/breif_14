<section class="p-6 bg-white/50 backdrop-blur-md rounded-3xl shadow-xl text-white max-w-xl mx-auto space-y-6">
    <!-- Header -->
    <header class="text-center">
        <h2 class="text-2xl font-bold text-pink-200">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 text-sm text-blue-200">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <!-- Delete Button -->
    <div class="flex justify-center">
        <x-danger-button
            x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
            class="px-6 py-2 bg-pink-200 hover:bg-pink-300 text-black font-semibold rounded-xl transition"
        >
            {{ __('Delete Account') }}
        </x-danger-button>
    </div>

    <!-- Confirmation Modal -->
    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6 space-y-4 bg-white/20 rounded-2xl text-black">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-pink-200">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-1 text-sm text-blue-200">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mt-4">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <input
                    id="password"
                    name="password"
                    type="password"
                    placeholder="{{ __('Password') }}"
                    class="mt-1 block w-full px-4 py-2 rounded-xl bg-white/20 text-black placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-200"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="text-red-400 text-sm mt-1" />
            </div>

            <div class="mt-6 flex justify-end gap-3">
                <x-secondary-button x-on:click="$dispatch('close')" class="px-4 py-2 rounded-xl bg-white/20 text-black hover:bg-white/30 transition">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="px-4 py-2 bg-pink-200 hover:bg-pink-300 text-black font-semibold rounded-xl transition">
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
