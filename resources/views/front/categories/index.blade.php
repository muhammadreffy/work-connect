<x-app-layout title="Categories | Work Connect">

    <x-slot:header>
        <x-front.navbar />
    </x-slot:header>

    <section class="container">
        <div class="px-4 py-6 md:px-16">
            <div class="flex flex-col justify-between lg:items-center gap-y-3 md:flex-row">
                <h5 class="text-xl font-extrabold">Browse Categories</h5>

                <form class="w-full lg:w-1/3">
                    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 flex items-center pointer-events-none start-0 ps-3">
                            <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="search" id="default-search"
                            class="block w-full p-3 font-semibold text-gray-900 transition-all duration-200 ease-in-out border-transparent rounded-3xl ps-10 bg-gray-50 focus:ring-primary focus:border-primary"
                            placeholder="Search your job categories..." required />

                    </div>
                </form>
            </div>

            <div class="grid grid-cols-5 gap-4 mt-5">
                <div class="col-span-12 lg:col-span-1">
                    <a href="#">
                        <div
                            class="p-5 transition-all duration-300 ease-in-out bg-white border-2 border-transparent rounded-3xl hover:border-primary">
                            <img src="{{ asset('img/icons-category/UIUX 1.png') }}" alt="" class="w-24 h-24">

                            <h4 class="mt-4 text-lg font-bold">App Developer</h4>
                            <p class="mt-1 text-sm text-gray-700">12.343 jobs available</p>
                        </div>
                    </a>
                </div>

                <div class="col-span-12 lg:col-span-1">
                    <a href="#">
                        <div
                            class="p-5 transition-all duration-300 ease-in-out bg-white border-2 border-transparent rounded-3xl hover:border-primary">
                            <img src="{{ asset('img/icons-category/UIUX 1.png') }}" alt="" class="w-24 h-24">

                            <h4 class="mt-4 text-lg font-bold">App Developer</h4>
                            <p class="mt-1 text-sm text-gray-700">12.343 jobs available</p>
                        </div>
                    </a>
                </div>

                <div class="col-span-12 lg:col-span-1">
                    <a href="#">
                        <div
                            class="p-5 transition-all duration-300 ease-in-out bg-white border-2 border-transparent rounded-3xl hover:border-primary">
                            <img src="{{ asset('img/icons-category/UIUX 1.png') }}" alt="" class="w-24 h-24">

                            <h4 class="mt-4 text-lg font-bold">App Developer</h4>
                            <p class="mt-1 text-sm text-gray-700">12.343 jobs available</p>
                        </div>
                    </a>
                </div>

                <div class="col-span-12 lg:col-span-1">
                    <a href="#">
                        <div
                            class="p-5 transition-all duration-300 ease-in-out bg-white border-2 border-transparent rounded-3xl hover:border-primary">
                            <img src="{{ asset('img/icons-category/UIUX 1.png') }}" alt="" class="w-24 h-24">

                            <h4 class="mt-4 text-lg font-bold">App Developer</h4>
                            <p class="mt-1 text-sm text-gray-700">12.343 jobs available</p>
                        </div>
                    </a>
                </div>

                <div class="col-span-12 lg:col-span-1">
                    <a href="#">
                        <div
                            class="p-5 transition-all duration-300 ease-in-out bg-white border-2 border-transparent rounded-3xl hover:border-primary">
                            <img src="{{ asset('img/icons-category/UIUX 1.png') }}" alt="" class="w-24 h-24">

                            <h4 class="mt-4 text-lg font-bold">App Developer</h4>
                            <p class="mt-1 text-sm text-gray-700">12.343 jobs available</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

</x-app-layout>
