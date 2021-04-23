<x-main-layout>
    <header class="border-b border-gray-800">
        <nav class="container mx-auto flex flex-col lg:flex-row items-center justify-between px-4 py-6">
            <div class="flex flex-col lg:flex-row items-center">
                <a href="{{ route('games.index') }}">
                    <img src="{{ asset('/img/laracasts-logo.svg') }}" alt="Video Game Aggregator" class="w-32 flex-none">
                </a>
                <ul class="flex ml-0 lg:ml-16 space-x-8 mt-6 lg:mt-0">
                    <li><a href="{{ route('games.index') }}" class="hover:text-gray-400">{{ __('Games') }}</a></li>
                    <li><a href="#" class="hover:text-gray-400">{{ __('Reviews') }}</a></li>
                    <li><a href="#" class="hover:text-gray-400">{{ __('Coming Soon') }}</a></li>
                </ul>
            </div>

            <div class="flex items-center mt-6 lg:mt-0">
                <livewire:search-dropdown />
                <div class="ml-6 flex items-center">
                    @auth
                        <div class="flex items-center relative" x-data="{ isOpen: false }" @click.away="isOpen = false">
                            <a href="#" @click.prevent="isOpen = ! isOpen" aria-haspopup="true" :aria-expanded="isOpen">
                                <img src="{{ auth()->user()->avatar }}" alt="{{ auth()->user()->name }}'s avatar" class="rounded-full w-8">
                            </a>

                            <div class="absolute right-0 top-7 z-50 bg-gray-800 text-xs rounded whitespace-nowrap w-32 mt-2" x-show.transition.opacity.duration.200="isOpen">
                                <ul>
                                    <li class="list-item">
                                        <a href="{{ route('profiles.edit') }}" class="list-link w-full">
                                            {{ __('My Profile') }}
                                        </a>
                                    </li>
                                    <li class="list-item">
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf

                                            <button
                                                type="submit"
                                                class="list-link text-red-500 w-full"
                                                @keydown.tab="isOpen = false"
                                            >
                                                {{ __('Log out') }}
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="link">{{ __('Log in') }}</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 link">{{ __('Sign up') }}</a>
                        @endif
                    @endauth

                    <div class="flex items-center relative ml-4 mr-3" x-data="{ isOpen: false }" @click.away="isOpen = false">
                        <a href="#" class="flex items-center" @click.prevent="isOpen = ! isOpen" aria-haspopup="true" :aria-expanded="isOpen">
                            <img src="{{ asset('/img/brazil.svg') }}" alt="Brazil" class="w-8 mr-2">
                            <span class="w-1">&#9662;</span>
                        </a>

                        <div class="absolute right-0 top-7 z-50 bg-gray-800 text-xs rounded w-max mt-2" x-show.transition.opacity.duration.200="isOpen">
                            <ul>
                                <li class="list-item">
                                    <a href="#" class="list-link w-full">
                                        <img src="{{ asset('/img/united-states.svg') }}" alt="United States" class="w-8">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main class="py-8">
        {{ $slot }}
    </main>
</x-main-layout>
