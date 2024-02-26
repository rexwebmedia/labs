@props([
    'href' => ''
])

@if( !empty($href) )
    <a href="{{ $href }}" {{ $attributes->merge(['class' => 'select-none inline-flex items-center gap-2 px-4 py-2 bg-gray-800 border border-transparent rounded font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
        <span data-js="btn-loader" class="hidden">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="animate-spin w-4 h-4" viewBox="0 0 24 24" width="24" height="24">
                <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" class="opacity-25"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
        </span>
        <span data-js="btn-text">{{ $slot }}</span>
    </a>
@else
    <button {{ $attributes->merge(['type' => 'submit', 'class' => 'select-none inline-flex items-center gap-2 px-4 py-2 bg-gray-800 border border-transparent rounded font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
        <span data-js="btn-loader" class="hidden">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="animate-spin w-4 h-4" viewBox="0 0 24 24" width="24" height="24">
                <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" class="opacity-25"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
        </span>
        <span data-js="btn-text">{{ $slot }}</span>
    </button>
@endif
