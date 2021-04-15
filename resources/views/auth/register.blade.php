<x-app-layout>
    <div class="w-2/4 container mx-auto my-5 px-4">
        <form action="{{ route('register') }}" method="POST">
            @csrf

            <div class="mb-6">
                <h1 class="text-blue-400 uppercase tracking-wide font-semibold text-xl">{{ __('Sign up') }}</h1>
                <p class="text-gray-400">Join us and enjoy your gaming hours with an awesome community of gamers.</p>
            </div>

            <div class="mt-3">
                <label for="name" class="label">{{ __('Name') }}</label>
                <input id="name"
                       class="input @error('name') border-red-500 @enderror"
                       type="text"
                       name="name"
                       placeholder="John Doe"
                       value="{{ old('name') }}"
                       autocomplete="name"
                       required
                >

                @error('name')
                    <p class="mt-2 text-red-500 text-xs">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-3">
                <label for="nickname" class="label">{{ __('Nickname') }}</label>
                <input id="nickname"
                       class="input @error('nickname') border-red-500 @enderror"
                       type="text"
                       name="nickname"
                       placeholder="johndoe"
                       value="{{ old('nickname') }}"
                       autocomplete="nickname"
                       required
                >

                @error('nickname')
                    <p class="mt-2 text-red-500 text-xs">{{ $message }}</p>
                @enderror
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
                <label for="password" class="label">{{ __('Password Confirmation') }}</label>
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

            <div class="mt-3">
                <label for="agreement" class="inline-flex items-center">
                    <input id="agreement"
                           type="checkbox"
                           name="agreement"
                           class="@error('agreement') border-red-500 @enderror"
                           {{ old('agreement') ? 'checked' : '' }}
                    >
                    <span class="label ml-2" style="margin-bottom: 0;">{{ __('I\'ve read and agree with the Terms of Service and our Privacy Policy') }}</span>
                </label>

                @error('agreement')
                    <p class="mt-1 text-red-500 text-xs">Field required</p>
                @enderror
            </div>

            <div class="mt-4">
                <button type="submit" class="button w-full justify-center">
                    Sign up
                </button>
            </div>

            <div class="mt-3 text-center">
                <p class="text-gray-300">Already have an account? <a href="{{ route('register') }}" class="link text-blue-500">Log in</a>.</p>
            </div>
        </form>
    </div>
</x-app-layout>
