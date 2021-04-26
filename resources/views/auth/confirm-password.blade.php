<x-app-layout>
    <div class="form-container">
        <form action="{{ route('password.confirm') }}" method="POST">
            @csrf

            <div class="mb-6">
                <h1 class="text-blue-400 uppercase tracking-wide font-semibold text-xl">{{ __('Confirm Password') }}</h1>
                <p class="text-gray-400">{{ __('This is a secure area of the application. Please confirm your password before continuing.') }}</p>
            </div>

            <div class="mt-3">
                <label for="password" class="label">{{ __('Password') }}</label>
                <input id="password"
                       class="input @error('password') border-red-500 @enderror"
                       type="password"
                       name="password"
                       placeholder="********"
                       autofocus
                       required
                >

                @error('password')
                    <p class="mt-2 text-red-500 text-xs">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-4">
                <button type="submit" class="button button--primary w-full justify-center">
                    {{ __('Confirm Password') }}
                </button>
            </div>

            <div class="mt-3 text-center">
                <a href="{{ route('password.request') }}" class="link text-blue-500">{{ __('Forgot your password?') }}</a>
            </div>
        </form>
    </div>
</x-app-layout>
