@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'bg-gray-800 text-sm rounded-md focus:outline-none focus:shadow-outline w-full p-3']) !!}>
