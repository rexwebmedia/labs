<x-app-layout>
    <div class="container my-6 px-3">
        <div class="flex flex-wrap">
            <div class="w-full md:w-6/12">
                <h1 class="text-4xl leading-tight font-bold mb-3 text-gray-800">Virtual Lab System</h1>
                <p class="text-xl mb-8">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat, non!</p>
                <div class="flex flex-wrap gap-2">
                    <a href="{{ route('register') }}" class="px-5 py-4 leading-tight rounded-md shadow-sm hover:shadow-md text-xl font-semibold tracking-wide select-none focus:outline focus:outline-blue-500 text-white bg-blue-500">
                        <span>Register Today</span>
                    </a>
                </div>
            </div>
            <div class="w-full md:w-6/12"></div>
        </div>
    </div>
</x-app-layout>