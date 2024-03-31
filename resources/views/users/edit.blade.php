<x-admin-layout>
    <div class="xl:container px-4 py-4">
        <div class="flex mb-3 justify-between">
            <div class="">
                <h1 class="text-2xl font-semibold">Update Details</h1>
            </div>
            <div class="self-center">
            </div>
        </div>
        <div class="">
            <form action="{{ route('users.update', $item) }}" method="post" data-js="app-form">
                <div class="flex flex-wrap -mx-2">
                    <div class="w-full sm:w-6/12 px-2 flex flex-col mb-3">
                        <label for="user-name">Name</label>
                        <input id="user-name" type="text" name="name" value="{{ $item->name }}" required class="rounded" />
                    </div>
                    <div class="w-full sm:w-6/12 px-2 flex flex-col mb-3">
                        <label for="user-lastname">Lastname</label>
                        <input id="user-lastname" type="text" name="lastname" value="{{ $item->lastname }}" class="rounded" />
                    </div>
                    <div class="w-full sm:w-6/12 px-2 flex flex-col mb-3">
                        <label for="user-email">Email</label>
                        <input id="user-email" type="email" name="email" value="{{ $item->email }}" required class="rounded" />
                    </div>
                    @if(!empty($userRoles))
                    <div class="w-full sm:w-6/12 px-2 flex flex-col mb-3">
                        <label for="user-role">Role</label>
                        <select id="user-role" name="role" class="rounded">
                             @foreach($userRoles as $userRole)
                                <option value="{{ $userRole }}" <?php echo $userRole == $item->role->value ? 'selected' : ''; ?>>{{ $userRole }}</option>
                            @endforeach
                        </select>
                    </div>
                    @endif
                    <div class="w-full px-2">
                        <div data-js="app-form-status" class="px-2 font-semibold hidden w-full mb-3"></div>
                    </div>
                    <div class="w-full px-2 flex gap-2 flex-wrap">
                        <x-button href="{{ route('users.index') }}">
                            Back
                        </x-button>
                        <x-button data-js="app-form-btn">Update Details</x-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>