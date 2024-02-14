<x-admin-layout>
    <div class="xl:container px-3 py-4">
        <div class="flex mb-3 justify-between">
            <div class="">
                <h1 class="text-2xl font-semibold">Lab Test Categories</h1>
            </div>
            <div class="self-center">
                <form action="{{ route('lab-test-categories.store') }}" method="post" data-js="form-model-create">
                    <button type="submit" data-js="form-submit-btn" class="inline-flex items-center gap-2 px-2 py-2 leading-none rounded bg-primary text-white disabled:opacity-50">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" width="24" height="24" viewBox="0 -960 960 960"><path d="M440-440H240q-17 0-28.5-11.5T200-480q0-17 11.5-28.5T240-520h200v-200q0-17 11.5-28.5T480-760q17 0 28.5 11.5T520-720v200h200q17 0 28.5 11.5T760-480q0 17-11.5 28.5T720-440H520v200q0 17-11.5 28.5T480-200q-17 0-28.5-11.5T440-240v-200Z"/></svg>
                        <span>Add Category</span>
                    </button>
                </form>
            </div>
        </div>
        <div class="overflow-x-auto rounded">
            <table class="w-full bg-white">
                <thead>
                    <tr class="border-b">
                        <th scope="col" class="px-3 py-2 text-start">Name</th>
                        <th scope="col" class="px-3 py-2 text-start">Lab Tests</th>
                        <th scope="col" class="px-3 py-2 text-start">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(!empty($items) && count($items))
                        @foreach($items as $item)
                            <tr class="border-b">
                                <td class="px-3 py-2">{{ $item->name }}</td>
                                <td class="px-3 py-2">{{ $item->lab_tests_count }}</td>
                                <td class="px-3 py-2">
                                    <a href="{{ route('lab-test-categories.edit', $item) }}">Edit</a>
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