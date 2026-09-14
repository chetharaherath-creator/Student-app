@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-3 py-2 border-b-2 border-skyblue text-sm font-semibold text-white bg-teal/30 rounded-t-md transition duration-150 ease-in-out'
            : 'inline-flex items-center px-3 py-2 border-b-2 border-transparent text-sm font-medium text-skyblue hover:text-white hover:border-skyblue/60 hover:bg-white/10 rounded-t-md transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

