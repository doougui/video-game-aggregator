<x-app-layout>
    <div class="w-2/4 container mx-auto my-5 px-4">
        <form action="{{ route('login') }}" method="POST">
            @csrf

            <div class="mb-6">
                <h1 class="text-blue-400 uppercase tracking-wide font-semibold text-xl">{{ __('Log in') }}</h1>
                <p class="text-gray-400">Log in to be able to track your gaming activity and share your experiences.</p>
            </div>

            <div class="mt-3">
                <label for="email" class="label">{{ __('Email') }}</label>
                <input id="email"
                       class="input @error('email') border-red-500 @enderror"
                       type="email"
                       name="email"
                       placeholder="email@email.com"
                       value="{{ old('email') }}"
                       autocomplete="email"
                       required
                >

                @error('email')
                    <p class="mt-2 text-red-500 text-xs">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-3">
                <label for="password" class="label">{{ __('Password') }}</label>
                <input id="password"
                       class="input @error('password') border-red-500 @enderror"
                       type="password"
                       name="password"
                       placeholder="********"
                       autocomplete="current-password"
                       required
                >

                @error('password')
                    <p class="mt-2 text-red-500 text-xs">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-3">
                <label for="remember" class="inline-flex items-center">
                    <input id="remember"
                           type="checkbox"
                           name="remember"
                           {{ old('remember') ? 'checked' : '' }}
                    >
                    <span class="label ml-2" style="margin-bottom: 0;">{{ __('Keep me logged in') }}</span>
                </label>
            </div>

            <div class="mt-4">
                <button type="submit" class="button w-full justify-center">
                    Log in
                </button>
            </div>

            <div class="mt-3 text-center">
                <p class="text-gray-300">Don't have an account? <a href="{{ route('register') }}" class="link text-blue-500">Sign up</a>.</p>
            </div>

            <div class="mt-3 text-center">
                <a href="{{ route('password.request') }}" class="link text-blue-500">Forgot your password?</a>
            </div>
        </form>
    </div>
</x-app-layout>
