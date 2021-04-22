<x-app-layout>
    <div class="form-container">
        <form action="{{ route('password.update') }}" method="POST">
            @csrf

            <div class="mb-6">
                <h1 class="text-blue-400 uppercase tracking-wide font-semibold text-xl">{{ __('Reset Password') }}</h1>
                <p class="text-gray-400">{{ __('Confirm your email and type your new desired password.') }}</p>
            </div>

            @if(session('status'))
                <p class="mt-2 text-green-500 text-xs text-center">{{ session('status') }}</p>
            @endif

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="mt-3">
                <label for="email" class="label">{{ __('Confirm Email') }}</label>
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
                <label for="password" class="label">{{ __('Confirm Password') }}</label>
                <input id="password_confirmation"
                       class="input @error('password_confirmation') border-red-500 @enderror"
                       type="password"
                       name="password_confirmation"
                       placeholder="********"
                       required
                >

                @error('password_confirmation')
                    <p class="mt-2 text-red-500 text-xs">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-4">
                <button type="submit" class="button button--primary w-full justify-center">
                    {{ __('Reset Password') }}
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
