<x-app-layout>
    <div class="form-container">
        <form action="{{ route('login') }}" method="POST">
            @csrf

            <div class="mb-6">
                <h1 class="text-blue-400 uppercase tracking-wide font-semibold text-xl">{{ __('Log in') }}</h1>
                <p class="text-gray-400">Log in to be able to track your gaming activity and share your experiences.</p>
            </div>

            <div class="mt-3 flex">
                <a href="{{ route('auth.social.redirect', ['provider' => 'discord']) }}" class="button discord flex-1 justify-center mr-2">
                    <svg width="100" id="Layer_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 532 130"><style>.st0{fill:#FFFFFF;}</style><path class="st0" d="M53.2 20.3H20v37.6l22.1 20V41.4H54c7.5 0 11.2 3.7 11.2 9.5v27.9c0 5.8-3.5 9.7-11.2 9.7H20v21.2h33.2c17.8.1 34.5-8.8 34.5-29.4V50.2c0-20.8-16.7-29.9-34.5-29.9zm174.1 60.1V49.6c0-11.1 19.8-13.7 25.8-2.5l18.3-7.5C264.3 23.7 251.1 19 240.2 19c-17.8 0-35.4 10.4-35.4 30.6v30.8c0 20.3 17.6 30.6 35 30.6 11.2 0 24.6-5.6 32-20.1l-19.6-9.1c-4.8 12.4-24.9 9.4-24.9-1.4zm-60.6-26.6c-6.9-1.5-11.5-4-11.8-8.3.4-10.4 16.3-10.7 25.6-.8l14.7-11.4C186 22 175.6 19 164.8 19c-16.3 0-32.1 9.2-32.1 26.8 0 17.1 13 26.2 27.3 28.4 7.3 1 15.4 3.9 15.2 9-.6 9.6-20.2 9.1-29.1-1.8L132 94.8c8.3 10.7 19.6 16.2 30.2 16.2 16.3 0 34.4-9.5 35.1-26.8 1-22-14.8-27.5-30.6-30.4zm-66.9 55.9h22.4V20.3H99.8v89.4zm377.7-89.4h-33.2v37.6l22.1 20V41.4h11.8c7.5 0 11.2 3.7 11.2 9.5v27.9c0 5.8-3.5 9.7-11.2 9.7h-34v21.2h33.2c17.8.1 34.5-8.8 34.5-29.4V50.2c.1-20.8-16.6-29.9-34.4-29.9zM314.6 19c-18.4 0-36.7 10.1-36.7 30.7v30.6c0 20.5 18.4 30.7 36.9 30.7 18.4 0 36.7-10.2 36.7-30.7V49.7c0-20.5-18.5-30.7-36.9-30.7zM329 80.3c0 6.4-7.2 9.7-14.3 9.7-7.2 0-14.4-3.2-14.4-9.7V49.7c0-6.6 7-10.1 14-10.1 7.3 0 14.7 3.2 14.7 10.1v30.6zm102.8-30.6c-.5-21-14.7-29.4-33-29.4h-35.5v89.5H386V81.3h4l20.6 28.4h28L414.4 79c10.8-3.4 17.4-12.7 17.4-29.3zm-32.6 12.1H386V41.4h13.2c14.2 0 14.2 20.4 0 20.4z"/></svg>
                </a>

                <a href="{{ route('auth.social.redirect', ['provider' => 'twitch']) }}" class="button twitch flex-1 justify-center ml-2">
                    <svg version="1.1" width="80" class="ml-2" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         viewBox="0 0 8192 2500" style="enable-background:new 0 0 8192 2500;" xml:space="preserve">
                    <style type="text/css">
                        .st0{fill:#FFFFFF;}
                    </style>
                    <g>
                        <g id="Layer_1-2">
                            <polygon class="st0" points="596,840 595.8,319.1 0,319.1 0,1883 297.9,2180.9 1117,2181 1117,1585 596,1585 596,1436 1117,1436
                                1117,840 		"/>
                            <polygon class="st0" points="2755,840 2755,1585 2606,1585 2606,840 2011,840 2011,1585 1862,1585 1862,840 1266,840 1266,1883
                                1563.9,2180.9 3351,2181 3351,840 		"/>
                            <polygon class="st0" points="3500,840 4096,840 4096,2180.9 3500.2,2180.9 		"/>
                            <polygon class="st0" points="3500.2,319.1 4096,319.1 4096,692 3500,692 		"/>
                            <polygon class="st0" points="5809,840 5511,1138.3 5511,1883 5808.9,2180.9 6703,2181 6703,1585 6107,1585 6107,1436 6703,1436
                                6703,840 		"/>
                            <polygon class="st0" points="7894,840 7448,840 7448,319 6852,319 6852,2181 7447,2181 7447,1436 7596,1436 7596,2181
                                8192,2180.9 8192,1138.3 		"/>
                            <polygon class="st0" points="4841,840 4840.7,319.1 4245,319 4245,1883 4542.8,2180.9 5362,2180.9 5362,1585.1 4841,1585
                                4841,1436 5362,1436 5362,840 		"/>
                        </g>
                    </g>
                    </svg>
                </a>
            </div>

            <div class="mt-4 mb-3 form-separator text-center text-sm text-gray-300 relative">
                Or login with email
            </div>

            <div>
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
                <button type="submit" class="button button--primary w-full justify-center">
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
