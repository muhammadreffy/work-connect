<x-app-layout>
    <x-slot:header>
        @include('components.front.navbar')
    </x-slot:header>

    <section class="container">
        <div class="px-4 py-6 md:px-16">
            <div class="grid grid-cols-12 gap-x-2 gap-y-3">
                <div class="col-span-12 lg:col-span-9">
                    <div class="p-4 bg-white rounded-3xl">
                        <span class="px-4 py-2 text-sm font-extrabold text-white rounded-3xl bg-primary">
                            HIRING
                        </span>

                        <h2 class="mt-3 mb-2 text-2xl font-black">
                            Education Commerce Website Low-Code
                        </h2>

                        <p class="flex items-center gap-x-2">
                            <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z"
                                    clip-rule="evenodd" />
                            </svg>

                            <span class="text-sm text-gray-500">
                                Posted 7h ago, 22 Apr 2024
                            </span>
                        </p>
                        <h6 class="mt-3 font-bold">
                            About Project
                        </h6>

                        <p class="mt-1 text-sm font-medium leading-7 tracking-wide">I'm seeking a proficient developer
                            to
                            create a
                            unique
                            opinion
                            collection app
                            without a user
                            registration feature. The primary aim of this app will be to collect user opinions on
                            specific topics while maintaining the anonymity of the users. The interface should be
                            user-friendly and intuitive to encourage consistent engagement. The ideal freelancer for
                            this project would have a strong background in mobile app development with particular
                            experience in creating apps that revolve around anonymity and user-generated content. A good
                            understanding of user interface design would be appreciated. Your input on ways to enhance
                            the user experience will be vital, so I value effective communication skills.
                        </p>
                    </div>
                </div>

                <div class="col-span-12 lg:col-span-3">
                    <div class="p-4 bg-white rounded-3xl">
                        <img src="{{ asset('img/thumbnails/thumbnail-1.png') }}" alt=""
                            class="object-cover w-full h-40 mb-7 rounded-3xl aspect-video">

                        <div class="flex flex-col gap-y-2">
                            <a href="#"
                                class="py-3 text-lg font-bold text-center text-white transition-all duration-300 ease-in-out bg-primary rounded-3xl hover:bg-hover">
                                Apply Now
                            </a>

                            <a href="#"
                                class="py-3 text-lg font-bold text-center text-white transition-all duration-300 ease-in-out bg-gray-900 rounded-3xl hover:bg-gray-950">
                                Save Bookmark
                            </a>
                        </div>

                        <h6 class="mt-5 mb-2 font-bold">About Client</h6>

                        <div class="flex gap-2">
                            <img src="{{ asset('img/avatars/profile.png') }}" alt=""
                                class="w-12 h-12 rounded-full">

                            <div>
                                <span class="font-semibold">Muhammad Reffy</span>
                                <p class="text-sm text-gray-500">25.000 Total Projects</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
