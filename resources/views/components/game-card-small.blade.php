<div class="game flex">
    <a href="#">
        <img src="{{ $game['coverImageUrl'] }}" alt="{{ $game['name'] }}" class="w-16 hover:opacity-75 transition ease-in-out duration-150">
    </a>

    <div class="ml-4">
        <a href="#" class="hover:text-gray-300">{{ $game['name'] }}</a>
        <div class="text-gray-400 text-sm mt-1">
            {{ $game['first_release_date'] }}
        </div>
    </div>
</div>
