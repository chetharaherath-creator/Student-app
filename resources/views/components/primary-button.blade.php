<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center px-5 py-2.5 bg-teal border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-wider hover:bg-navy focus:bg-navy active:bg-navy-dark focus:outline-none focus:ring-2 focus:ring-teal focus:ring-offset-2 shadow-md hover:shadow-lg transition duration-150 ease-in-out']) }}>
    {{ $slot }}
</button>
