<x-admin-layout>
    <div class="xl:container px-4 py-4">
        <div class="flex justify-between">
            <div class="">
                <h1 class="text-2xl font-semibold">Lab Item</h1>
            </div>
            <div class="self-center">
            </div>
        </div>
        <div class="">
            <form action="{{ route('lab-items.update', $item) }}" method="post" data-js="app-form">
                <div class="flex flex-wrap -mx-2">
                    <div class="w-full sm:w-6/12 px-2 flex flex-col mb-3">
                        <label for="location-name">Name</label>
                        <input id="location-name" type="text" required name="name" value="{{ $item->name }}" class="rounded" />
                    </div>
                    <div class="w-full sm:w-6/12 px-2 flex flex-col mb-3">
                        <span>Price</span>
                        <input type="number" name="price" value="{{ $item->price }}" class="rounded" />
                    </div>
                    <div class="w-full sm:w-6/12 px-2 flex flex-col mb-3">
                        <span>Category</span>
                        @if( !empty($categories) && count($categories) )
                            <select name="category" title="Category" class="rounded">
                                <option value="">No Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" <?= $category->id == $item->lab_test_category_id ? 'selected' : '' ?>>{{ $category->name }}</option>
                                @endforeach
                        @else
                            <select name="category" disabled title="Category" class="rounded">
                                <option value="" selected disabled>Create categories to add here</option>
                        @endif
                        </select>
                    </div>
                    <div class="w-full sm:w-6/12 px-2 flex flex-col mb-3">
                        <span>Status</span>
                        <select name="status" required title="Status" class="rounded">
                            <option value="draft" <?= 'draft' == $item->status ? 'selected' : '' ?>>Draft</option>
                            <option value="published" <?= 'published' == $item->status ? 'selected' : '' ?>>Published</option>
                        </select>
                    </div>
                    <div class="w-full px-2">
                        <div data-js="app-form-status" class="px-2 font-semibold hidden w-full mb-3"></div>
                    </div>
                    @method('PUT')
                    <div class="w-full px-2 flex gap-2 flex-wrap">
                        <x-button href="{{ route('lab-items.index') }}">Back</x-button>
                        <x-button data-js="app-form-btn">Save Lab Item</x-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>