<x-app-layout>
    <div class="form-container">
        <form action="{{ route('profiles.edit') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-6">
                <h1 class="text-blue-400 uppercase tracking-wide font-semibold text-xl">{{ __('Edit Profile') }}</h1>
                <p class="text-gray-400">Edit your desired profile infos</p>
            </div>

            @if(session('success'))
                <div class="mt-3">
                    <p class="mt-2 text-green-500 text-xs text-center">{{ session('success') }}</p>
                </div>
            @endif

            <div class="mt-3 flex justify-center">
                <label for="avatar" class="relative cursor-pointer">
                    <img src="{{ $user->avatar }}" alt="{{ $user->name }}'s avatar" id="avatar-preview" class="rounded-full w-32" title="Preview image may not be completely accurate">
                    <span class="w-8 h-8 block bg-blue-500 hover:bg-blue-600 duration-150 rounded-full absolute right-0 bottom-2 flex justify-center items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2">
                            <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                        </svg>
                    </span>
                </label>

                <input type="file" name="avatar" id="avatar" class="hidden">
            </div>

            @error('avatar')
                <p class="mt-2 text-red-500 text-xs text-center">{{ $message }}</p>
            @enderror

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
                       class="button button--primary border border-blue-500 hover:border-blue-600 w-full justify-center text-sm"
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
                <label for="bio" class="label">{{ __('bio') }}</label>
                <textarea
                    name="bio"
                    id="bio"
                    cols="30"
                    rows="5"
                    placeholder="I'm a gamer, a natural gamer"
                    class="input @error('bio') border-red-500 @enderror"
                >{{ $user->bio }}</textarea>

                @error('bio')
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
                    <a href="{{ cancel() }}" class="button button--cancel w-full justify-center">
                        Cancel
                    </a>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
