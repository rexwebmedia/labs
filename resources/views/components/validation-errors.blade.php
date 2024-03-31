@if ($errors->any())
    <div {{ $attributes->merge(['class'=> 'px-3 py-2 rounded border border-red-500 bg-red-50']) }}>
        <div class="mb-2 font-medium text-red-600">{{ __('Whoops! Something went wrong.') }}</div>
        <ul class="list-disc list-inside text-sm text-red-600">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
