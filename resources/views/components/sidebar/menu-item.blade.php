@props([
    'href' => '',
    'active' => false,
])

<a href="{{ $href }}" class="{{ $active ? 'text-primary bg-primary-50' : 'text-gray-600 hover:bg-gray-100' }} flex px-2 py-2 border-b items-center gap-2 font-medium">
    @if( !empty($icon) ) {{ $icon }} @endif
    <span>{{ $slot }}</span>
</a>