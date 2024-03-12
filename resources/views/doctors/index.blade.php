<x-admin-layout>
    <div class="xl:container px-3 py-4">
        <div class="flex mb-3 justify-between">
            <div class="">
                <h1 class="text-2xl font-semibold">Doctors</h1>
            </div>
            <div class="self-center">
                <form action="{{ route('doctors.store') }}" method="post" data-js="form-model-create">
                    <x-button type="submit" data-js="form-submit-btn">
                        Add New
                    </x-button>
                </form>
            </div>
        </div>
        <div class="overflow-x-auto rounded">
            <table class="w-full bg-white">
                <thead>
                    <tr class="border-b">
                        <th scope="col" class="px-3 py-2 text-start">Name</th>
                        <th scope="col" class="px-3 py-2 text-start">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(!empty($items) && count($items))
                        @foreach($items as $item)
                            <tr class="border-b">
                                <td class="px-3 py-2">
                                    {{ $item->name }}
                                    <div class="text-xs text-gray-500">{{ $item->email }}</div>
                                </td>
                                <td class="px-3 py-2">
                                    <a href="{{ route('doctors.edit', $item) }}">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr class="border-b">
                            <td colspan="2" class="px-3 py-2">Nothing found.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>