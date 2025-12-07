<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 pizzaria-color border border-transparent rounded-md font-semibold text-xs pizzaria-text-color uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>

<style>
            .pizzaria-color {
                background-color: #ff0000ff
            }

            .pizzaria-text-color {
                color: #bda000ff
            }

            .pizzaria-text-color-2 {
                color: #ff0000ff
            }

            .btn-icon-pizzaria {
                background-color: #ff0000ff;
            }
</style>