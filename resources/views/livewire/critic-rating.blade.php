<div class="flex items-center mr-12" wire:init="rate">
    <div id="{{ (isset($prefix) ? $prefix . '_' : '') . $game['slug'] }}" class="w-16 h-16 bg-gray-800 rounded-full relative text-xs"></div>
    <div class="ml-4 text-xs">{!! __('Critic <br> Score') !!}</div>
</div>
