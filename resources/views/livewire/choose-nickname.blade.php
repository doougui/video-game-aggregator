<form wire:submit.prevent="updateNickname" action="{{ route('nickname') }}" method="POST">
    @csrf
    @method('PATCH')

    <div class="mb-6">
        <h1 class="text-blue-400 uppercase tracking-wide font-semibold text-xl">{{ __('Choose Your Nickname') }}</h1>
        <p class="text-gray-400">Choose your desired nickname so that your fellow gamers can recognize you.</p>
    </div>

    <div class="mt-3">
        <label for="nickname" class="label">{{ __('Nickname') }}</label>
        <input id="nickname"
               wire:model="nickname"
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

    <div class="flex flex-col lg:flex-row">
        <div class="mt-4 w-full @if(url()->previous() !== route('register')) lg:w-3/4 @endif">
            <button type="submit" class="button button--primary w-full justify-center">
                Choose Nickname
            </button>
        </div>

        @if(url()->previous() !== route('register'))
            <div class="mt-4 lg:w-1/4 lg:ml-3">
                <a href="{{ route('profiles.edit') }}" class="button button--cancel w-full justify-center">
                    Keep current
                </a>
            </div>
        @endif
    </div>
</form>
