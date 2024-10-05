<x-app-layout title="Manage Project | Work Connect">


    <x-slot:header>
        @include('components.dashboard.navbar')
    </x-slot:header>


    @include('components.dashboard.sidebar')

    <section class="p-4 mt-16 sm:ml-64">
        <div class="max-w-screen-md px-4 lg:px-0">

            <h2 class="mb-3 text-2xl font-bold">Manage Project</h2>

            <div class="p-6 bg-white rounded-lg shadow-md">

                <div class="flex flex-col justify-between lg:flex-row lg:items-center gap-y-3 lg:gap-y-0">
                    <div class="flex items-center gap-x-3">
                        <div>
                            <img src="{{ Storage::url($project->thumbnail) }}" alt="{{ $project->name }}"
                                class="object-cover w-24 h-16 rounded">
                        </div>

                        <div>
                            <h5 class="font-bold">{{ $project->name }}</h5>
                            <span class="text-sm text-gray-600">
                                {{ $project->category->name }}
                            </span>
                        </div>
                    </div>

                    <div class="flex flex-col gap-2 lg:flex-row">
                        <a href="{{ route('dashboard.wallet.topup') }}"
                            class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100  text-center font-medium rounded-full text-sm px-4 py-2 lg:px-5 lg:py-2.5">
                            Preview
                        </a>

                        <a href="{{ route('admin.project.manage-tools', $project->slug) }}"
                            class="px-4 py-2 text-sm font-medium text-center text-white transition-all duration-300 ease-in-out rounded-full bg-primary hover:bg-hover focus:outline-none focus:ring-4 focus:ring-dark_ring lg:px-5 lg:py-2.5">
                            Add Tools
                        </a>
                    </div>
                </div>

                <hr class="my-5">

                <h5 class="mb-5 font-semibold">Applicants</h5>

                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-x-2">
                        <img src="{{ Storage::url($project->owner->avatar) }}" alt="{{ $project->owner->name }}"
                            class="object-cover w-6 h-6 rounded-full">

                        <div class="flex flex-col gap-x-2">
                            {{-- <h5 class="text-sm font-medium text-gray-600">Client</h5> --}}
                            <span class="font-bold">{{ $project->owner->name }}</span>
                        </div>
                    </div>

                    <div>
                        <span
                            class="px-4 py-2 text-sm font-medium text-green-400 bg-green-100 border border-green-400 rounded-full">
                            Hired
                        </span>
                    </div>

                    <div>
                        <span
                            class="px-4 py-2 text-sm font-medium text-orange-400 bg-orange-100 border border-orange-400 rounded-full">
                            Waiting For Approval
                        </span>
                    </div>

                    <div>
                        <span
                            class="px-4 py-2 text-sm font-medium text-red-400 bg-red-100 border border-red-400 rounded-full">
                            Rejected
                        </span>
                    </div>

                    <div>
                        <a href="#"
                            class="block px-2 py-1 text-sm font-medium text-center text-white transition-all duration-300 ease-in-out rounded-lg bg-primary hover:bg-hover focus:outline-none focus:ring-4 focus:ring-dark_ring">

                            <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-width="2"
                                    d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                                <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
