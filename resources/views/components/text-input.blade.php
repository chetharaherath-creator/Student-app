@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-skyblue/80 bg-white text-navy focus:border-teal focus:ring-teal rounded-lg shadow-sm']) }}>
