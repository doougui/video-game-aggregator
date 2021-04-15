<x-app-layout>
    <div class="w-2/4 container mx-auto my-5 px-4">
        <div class="mb-6">
            <h1 class="text-blue-400 uppercase tracking-wide font-semibold text-xl">{{ __('Log in') }}</h1>
            <p class="text-gray-400">Log in to be able to track your gaming activity and share your experiences.</p>
        </div>

        <div class="mt-3">
            <x-label for="email" :value="__('Email')" />
            <x-input id="email"
                     type="email"
                     name="email"
                     placeholder="email@email.com"
                     value="{{ old('email') }}"
                     autocomplete="email"
                     required
            />
        </div>

        <div class="mt-3">
            <x-label for="password" :value="__('Password')" />
            <x-input id="password"
                     type="password"
                     name="password"
                     placeholder="********"
                     required
            />
        </div>
    </div>
</x-app-layout>
