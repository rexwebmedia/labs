<x-admin-layout>
    <div class="xl:container px-4 py-4">
        <div class="flex mb-3 justify-between">
            <div class="">
                <h1 class="text-2xl font-semibold">Create Staff Member</h1>
            </div>
            <div class="self-center">
            </div>
        </div>
        <div class="">
            <form action="{{ route('users.store') }}" method="post" data-js="app-form">
                <div class="flex flex-wrap -mx-2">
                    <div class="w-full sm:w-6/12 px-2 flex flex-col mb-3">
                        <label for="user-name">Name</label>
                        <input id="user-name" type="text" required name="name" value="" class="rounded" />
                    </div>
                    <div class="w-full sm:w-6/12 px-2 flex flex-col mb-3">
                        <label for="user-lastname">Lastname</label>
                        <input id="user-lastname" type="text" name="lastname" value="" class="rounded" />
                    </div>
                    <div class="w-full sm:w-6/12 px-2 flex flex-col mb-3">
                        <label for="user-email">Email</label>
                        <input id="user-email" type="email" name="email" required value="" class="rounded" />
                    </div>
                    <div class="w-full sm:w-6/12 px-2 flex flex-col mb-3">
                        <label for="user-password">Password</label>
                        <div x-data="{show:false}" class="relative">
                            <input id="user-password" :type="show ? 'text' : 'password'" name="password" required value="" class="rounded w-full" />
                            <button type="button" x-cloak @click="show = !show" :title="show ? 'Hide Password':'Show Password'" class="absolute top-0 bottom-0 right-0 inline-flex items-center justify-center mx-1 my-1 px-2 py-1 rounded-md border bg-gray-100 text-gray-700 focus:outline-primary-500">
                                <span :class="show ? 'inline-block' : 'hidden'">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" width="24" height="24" viewBox="0 -960 960 960"><path d="M607-627q29 29 42.5 66t9.5 76q0 15-11 25.5T622-449q-15 0-25.5-10.5T586-485q5-26-3-50t-25-41q-17-17-41-26t-51-4q-15 0-25.5-11T430-643q0-15 10.5-25.5T466-679q38-4 75 9.5t66 42.5Zm-127-93q-19 0-37 1.5t-36 5.5q-17 3-30.5-5T358-742q-5-16 3.5-31t24.5-18q23-5 46.5-7t47.5-2q137 0 250.5 72T904-534q4 8 6 16.5t2 17.5q0 9-1.5 17.5T905-466q-18 40-44.5 75T802-327q-12 11-28 9t-26-16q-10-14-8.5-30.5T753-392q24-23 44-50t35-58q-50-101-144.5-160.5T480-720Zm0 520q-134 0-245-72.5T60-463q-5-8-7.5-17.5T50-500q0-10 2-19t7-18q20-40 46.5-76.5T166-680l-83-84q-11-12-10.5-28.5T84-820q11-11 28-11t28 11l680 680q11 11 11.5 27.5T820-84q-11 11-28 11t-28-11L624-222q-35 11-71 16.5t-73 5.5ZM222-624q-29 26-53 57t-41 67q50 101 144.5 160.5T480-280q20 0 39-2.5t39-5.5l-36-38q-11 3-21 4.5t-21 1.5q-75 0-127.5-52.5T300-500q0-11 1.5-21t4.5-21l-84-82Zm319 93Zm-151 75Z"/></svg>
                                </span>
                                <span :class="show ? 'hidden' : 'inline-block'">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" width="24" height="24" viewBox="0 -960 960 960"><path d="M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-134 0-244.5-72T61-462q-5-9-7.5-18.5T51-500q0-10 2.5-19.5T61-538q64-118 174.5-190T480-800q134 0 244.5 72T899-538q5 9 7.5 18.5T909-500q0 10-2.5 19.5T899-462q-64 118-174.5 190T480-200Zm0-300Zm0 220q113 0 207.5-59.5T832-500q-50-101-144.5-160.5T480-720q-113 0-207.5 59.5T128-500q50 101 144.5 160.5T480-280Z"/></svg>
                                </span>
                            </button>
                        </div>
                    </div>
                    @if(!empty($userRoles))
                    <div class="w-full sm:w-6/12 px-2 flex flex-col mb-3">
                        <label for="user-role">Role</label>
                        <select id="user-role" name="role" class="rounded">
                             @foreach($userRoles as $userRole)
                                <option value="{{ $userRole }}">{{ $userRole }}</option>
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
                        <x-button data-js="app-form-btn">Save Details</x-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>