<div class="flex items-center @if(isset($game['rating'])) ml-12 lg:mr-12 @endif" wire:init="rate">
    <div id="{{ (isset($prefix) ? $prefix . '_' : '') . $game['slug'] }}" class="w-16 h-16 bg-gray-800 rounded-full relative text-xs"></div>
    <div class="ml-4 text-xs">Critic <br> Score</div>
</div>
