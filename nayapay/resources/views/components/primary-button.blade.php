<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-[#fb923c] border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#ea580c] focus:bg-[#ea580c] active:bg-[#ea580c] focus:outline-none focus:ring-2 focus:ring-[#9a3412] focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
