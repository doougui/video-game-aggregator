<x-app-layout>
    <div class="form-container">
        <form action="{{ route('profiles.edit') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-6">
                <h1 class="text-blue-400 uppercase tracking-wide font-semibold text-xl">{{ __('Edit Profile') }}</h1>
                <p class="text-gray-400">Edit your desired profile infos</p>
            </div>

            <div class="flex flex-col lg:flex-row">
                <div class="mt-3 lg:w-3/4">
                    <label for="name" class="label">{{ __('Name') }}</label>
                    <input id="name"
                           class="input @error('name') border-red-500 @enderror"
                           type="text"
                           name="name"
                           placeholder="John Doe"
                           value="{{ $user['name'] }}"
                           autocomplete="name"
                           required
                    >

                    @error('name')
                        <p class="mt-2 text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-3 lg:w-1/4 lg:ml-3">
                    <label for="change_nickname" class="label" onclick="document.querySelector('#change_nickname').click();">Nickname</label>
                    <a id="change_nickname"
                       href="{{ route('nickname') }}"
                       class="button button--primary border border-blue-500 w-full justify-center text-sm"
                    >
                        Change
                    </a>
                </div>
            </div>

            <div class="mt-3">
                <label for="email" class="label">{{ __('Email') }}</label>
                <input id="email"
                       class="input @error('email') border-red-500 @enderror"
                       type="email"
                       name="email"
                       placeholder="email@email.com"
                       value="{{ $user['email'] }}"
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
                       autocomplete="new-password"
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
                >

                @error('password_confirmation')
                    <p class="mt-2 text-red-500 text-xs">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col lg:flex-row">
                <div class="mt-4 lg:w-3/4">
                    <button type="submit" class="button button--primary w-full justify-center">
                        Edit
                    </button>
                </div>

                <div class="mt-4 lg:w-1/4 lg:ml-3">
                    <a href="{{ back()->getTargetUrl() }}" class="button button--cancel w-full justify-center">
                        Cancel
                    </a>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
