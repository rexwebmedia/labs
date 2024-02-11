<nav x-data="{ open: false }" class="sticky top-0 h-12 px-2 flex justify-between bg-white shadow-sm border-gray-100">
    <div class="flex gap-2">
        <label for="app-sidebar-checkbox" title="Toggle sidebar" class="app-sidebar-btn lg:hidden group inline-flex items-center justify-center cursor-pointer text-gray-600 hover:text-gray-900 transition-colors">
            <span class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-gray-100 group-hover:bg-gray-300 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" width="24" height="24" viewBox="0 -960 960 960"><path d="M160-240q-17 0-28.5-11.5T120-280q0-17 11.5-28.5T160-320h640q17 0 28.5 11.5T840-280q0 17-11.5 28.5T800-240H160Zm0-200q-17 0-28.5-11.5T120-480q0-17 11.5-28.5T160-520h640q17 0 28.5 11.5T840-480q0 17-11.5 28.5T800-440H160Zm0-200q-17 0-28.5-11.5T120-680q0-17 11.5-28.5T160-720h640q17 0 28.5 11.5T840-680q0 17-11.5 28.5T800-640H160Z"/></svg>
            </span>
        </label>
        <div class="inline-flex items-center py-1">
            <a href="{{ route('dashboard') }}" class="inline-block w-9">
                <x-application-mark class="block h-9 w-auto" />
            </a>
        </div>
    </div>
    <div class="inline-flex gap-1">
        <div class="inline-flex relative" x-data="{open: false}" @click.away="open = false" @close.stop="open = false">
            <button type="button" @click="open = !open" title="Toggle user settings" class="group inline-flex items-center justify-center cursor-pointer text-gray-600 hover:text-gray-900 transition-colors">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <img src="{{ Auth::user()->profile_photo_url }}" alt="avatar" class="w-10 h-10 object-cover object-center rounded-full" />
                @else
                    <span class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-gray-100 group-hover:bg-gray-300 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" width="24" height="24" viewBox="0 -960 960 960"><path d="M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-240v-32q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v32q0 33-23.5 56.5T720-160H240q-33 0-56.5-23.5T160-240Zm80 0h480v-32q0-11-5.5-20T700-306q-54-27-109-40.5T480-360q-56 0-111 13.5T260-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T560-640q0-33-23.5-56.5T480-720q-33 0-56.5 23.5T400-640q0 33 23.5 56.5T480-560Zm0-80Zm0 400Z"/></svg>
                    </span>
                @endif
            </button>
            <div x-show="open" @click="open = false" style="display:none;"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="transform opacity-0 scale-95"
                x-transition:enter-end="transform opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75"
                x-transition:leave-start="transform opacity-100 scale-100"
                x-transition:leave-end="transform opacity-0 scale-95"
                class="absolute z-1 py-1 w-48 rounded shadow top-11 right-0 select-none text-sm bg-white">
                    <div class="flex flex-col">
                        <span class="inline-block w-full px-3 py-1 leading-tight text-xs text-gray-400 bg-gray-50">{{ Auth::user()->name }}</span>
                        <a href="{{ route('profile.show') }}" class="inline-block w-full px-3 py-2 leading-tight hover:bg-gray-100 transition-colors">Profile</a>
                        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                            <a href="{{ route('api-tokens.index') }}" class="inline-block w-full px-3 py-2 leading-tight hover:bg-gray-100 transition-colors">{{ __('API Tokens') }}</a>
                        @endif
                        @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                            <span class="inline-block w-full border-b"></span>
                            <span class="inline-block w-full px-3 py-1 leading-tight text-xs text-gray-400 bg-gray-50">{{ Auth::user()->currentTeam->name }}</span>
                            <a href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" class="inline-block w-full px-3 py-2 leading-tight hover:bg-gray-100 transition-colors">{{ __('Team Settings') }}</a>
                            @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                <a href="{{ route('teams.create') }}" class="inline-block w-full px-3 py-2 leading-tight hover:bg-gray-100 transition-colors">{{ __('Create New Team') }}</a>
                            @endcan
                            <!-- Team Switcher -->
                            @if (Auth::user()->allTeams()->count() > 1)
                                <span class="inline-block w-full border-b"></span>
                                <span class="inline-block w-full px-3 py-1 leading-tight text-xs text-gray-400 bg-gray-50">{{ __('Switch Teams') }}</span>
                                @foreach (Auth::user()->allTeams() as $team)
                                    <x-switchable-team :team="$team" />
                                @endforeach
                            @endif
                        @endif
                        <form method="POST" action="{{ route('logout') }}" class="w-full">
                            @csrf
                            <button type="submit" title="Logout" class="inline-block w-full text-left px-3 py-2 leading-tight text-red-500 hover:text-red-600 hover:bg-gray-100 transition-colors">Log out</button>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</nav>
