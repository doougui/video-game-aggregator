<x-app-layout>
    <div class="form-container">
        <form action="{{ route('password.email') }}" method="POST">
            @csrf

            <div class="mb-6">
                <h1 class="text-blue-400 uppercase tracking-wide font-semibold text-xl">{{ __('Forgot My Password') }}</h1>
                <p class="text-gray-400">{{ __('Enter your email and follow the instructions to recover your account.') }}</p>
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

                @if(session('status'))
                    <p class="mt-2 text-green-500 text-xs">{{ session('status') }}</p>
                @endif

                @error('email')
                    <p class="mt-2 text-red-500 text-xs">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-4">
                <button type="submit" class="button button--primary w-full justify-center">
                    {{ __('Recover') }}
                </button>
            </div>

            <div class="mt-3 text-center">
                <a href="{{ route('login') }}" class="link text-blue-500">{{ __('Log in') }}</a>
            </div>
        </form>
    </div>
</x-app-layout>
