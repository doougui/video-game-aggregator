<x-main-layout>
    <header class="border-b border-gray-800">
        <nav class="container mx-auto flex flex-col lg:flex-row items-center justify-between px-4 py-6">
            <div class="flex flex-col lg:flex-row items-center">
                <a href="{{ route('games.index') }}">
                    <img src="{{ asset('/img/laracasts-logo.svg') }}" alt="Video Game Aggregator" class="w-32 flex-none">
                </a>
                <ul class="flex ml-0 lg:ml-16 space-x-8 mt-6 lg:mt-0">
                    <li><a href="{{ route('games.index') }}" class="hover:text-gray-400">Games</a></li>
                    <li><a href="#" class="hover:text-gray-400">Reviews</a></li>
                    <li><a href="#" class="hover:text-gray-400">Coming Soon</a></li>
                </ul>
            </div>

            <div class="flex items-center mt-6 lg:mt-0">
                <livewire:search-dropdown />
                <div class="ml-6">
                    @auth
                        <div class="flex items-center">
                            <a href="{{ route('profiles.edit') }}" class="mr-3">
                                <img src="{{ auth()->user()->avatar }}" alt="Avatar" class="rounded-full w-8">
                            </a>

                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="link">Log out</button>
                            </form>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="link">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 link">Sign up</a>
                        @endif
                    @endauth
                </div>
            </div>
        </nav>
    </header>

    <main class="py-8">
        {{ $slot }}
    </main>
</x-main-layout>
