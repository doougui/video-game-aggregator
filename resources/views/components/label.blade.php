<label {{ $attributes->merge(['class' => 'block text-sm mb-2 text-gray-200']) }}>
    {{ $value ?? $slot }}
</label>
