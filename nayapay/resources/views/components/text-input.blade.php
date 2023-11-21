@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-[#c2410c] focus:ring-[#fb923c] rounded-md shadow-sm']) !!}>
