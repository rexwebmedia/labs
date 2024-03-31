<x-admin-layout>
    <div class="xl:container px-3 py-4">
        <div class="flex mb-3 justify-between">
            <div class="">
                <h1 class="text-2xl font-semibold">Staff Members</h1>
            </div>
            <div class="self-center">
                <x-button href="{{ route('users.create') }}">
                    Add New
                </x-button>
            </div>
        </div>
        <div class="overflow-x-auto rounded">
            <table class="w-full bg-white">
                <thead>
                    <tr class="border-b">
                        <th scope="col" class="px-3 py-2 text-start">Name</th>
                        <th scope="col" class="px-3 py-2 text-start">Role</th>
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
                                <td>
                                    <span class="inline-block items-center rounded {{ $item->isDoctor() ? 'border-green-600 bg-green-50 text-green-700' : '' }} {{ $item->isPatient() ? 'border-blue-600 bg-blue-50 text-blue-700' : '' }} {{ $item->isAdmin() ? 'border-red-600 bg-red-50 text-red-700' : '' }} {{ $item->isSuperAdmin() ? 'border-gray-600 bg-gray-50 text-gray-700' : '' }} px-1 py-1 leading-none text-xs font-medium border">{{ $item->role }}</span>
                                </td>
                                <td class="px-3 py-2">
                                    <a href="{{ route('users.edit', $item) }}">Edit</a>
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