<section class="max-w-xl mx-auto p-8 rounded-3xl 
bg-gradient-to-br from-red-500/10 via-pink-500/10 to-purple-500/10
backdrop-blur-xl shadow-2xl border border-white/10 space-y-8">

    <!-- Header -->
    <header class="text-center space-y-2">
        <h2 class="text-3xl font-bold text-red-400 tracking-wide">
            {{ __('Delete Account') }}
        </h2>

        <p class="text-sm text-gray-300 leading-relaxed">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please make sure to download anything important before continuing.') }}
        </p>
    </header>

    <!-- Delete Button -->
    <div class="flex justify-center">
        <x-danger-button
            x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
            class="px-8 py-3 rounded-xl
                   bg-red-500 hover:bg-red-600
                   text-white font-semibold tracking-wide
                   shadow-lg shadow-red-500/30
                   transition-all duration-300">
            Delete Account
        </x-danger-button>
    </div>

    <!-- Modal -->
    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>

        <form method="post" action="{{ route('profile.destroy') }}"
              class="p-8 rounded-2xl
                     bg-gray-900 text-white
                     space-y-6 border border-white/10 shadow-xl">

            @csrf
            @method('delete')

            <div class="text-center space-y-2">
                <h2 class="text-xl font-semibold text-red-400">
                    Confirm Deletion
                </h2>

                <p class="text-sm text-gray-400">
                    Please enter your password to permanently delete your account.
                </p>
            </div>

            <!-- Password -->
            <div>
                <input
                    id="password"
                    name="password"
                    type="password"
                    placeholder="Enter your password"
                    class="w-full px-4 py-3 rounded-xl
                           bg-gray-800 text-white
                           placeholder-gray-500
                           focus:outline-none
                           focus:ring-2 focus:ring-red-500"
                />

                <x-input-error
                    :messages="$errors->userDeletion->get('password')"
                    class="mt-2 text-sm text-red-400" />
            </div>

            <!-- Buttons -->
            <div class="flex justify-end gap-4">

                <x-secondary-button
                    x-on:click="$dispatch('close')"
                    class="px-6 py-2 rounded-xl
                           bg-gray-700 hover:bg-gray-600
                           text-white transition">
                    Cancel
                </x-secondary-button>

                <x-danger-button
                    class="px-6 py-2 rounded-xl
                           bg-red-500 hover:bg-red-600
                           text-white font-semibold
                           transition">
                    Delete
                </x-danger-button>

            </div>

        </form>
    </x-modal>

</section>
