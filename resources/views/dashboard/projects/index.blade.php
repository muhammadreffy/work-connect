<x-app-layout title="Dashboard | Work Connect">


    <x-slot:header>
        @include('components.dashboard.navbar')
    </x-slot:header>


    @include('components.dashboard.sidebar')

    <section class="p-4 mt-16 sm:ml-64">
        <div class="max-w-screen-xl px-4 lg:px-0">

            <h2 class="mb-3 text-2xl font-bold">Manage Projects</h2>

            <x-toast.success session="successProjectAdded" />
            <x-toast.warning session="failedToAddProject" />

            <div class="relative overflow-hidden bg-white shadow-md sm:rounded-lg">
                <div
                    class="flex flex-col items-center justify-between p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
                    <div class="w-full md:w-1/2">
                        <form class="flex items-center">
                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="currentColor"
                                        viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="text" name="search" id="simple-search"
                                    class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-dark_ring focus:border-dark_ring"
                                    placeholder="Search" required>

                                <button type="submit" class="hidden">
                                    Search
                                </button>
                            </div>
                        </form>
                    </div>
                    <div
                        class="flex flex-col items-stretch justify-end flex-shrink-0 w-full space-y-2 md:w-auto md:flex-row md:space-y-0 md:items-center md:space-x-3">
                        @if (!Auth::user()->hasRole('super_admin'))
                            <a href="{{ route('admin.project.create') }}"
                                class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white transition-all duration-300 ease-in-out rounded-lg bg-primary hover:bg-hover focus:ring-4 focus:ring-dark_ring focus:outline-none">
                                <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path clip-rule="evenodd" fill-rule="evenodd"
                                        d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                                </svg>
                                Add project
                            </a>
                        @endif
                        <div class="flex items-center w-full space-x-3 md:w-auto">
                            <button id="actionsDropdownButton" data-dropdown-toggle="actionsDropdown"
                                class="flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg md:w-auto focus:outline-none hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200"
                                type="button">
                                <svg class="-ml-1 mr-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path clip-rule="evenodd" fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                </svg>
                                Actions
                            </button>
                            <div id="actionsDropdown"
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded shadow w-44">
                                <ul class="py-1 text-sm text-gray-700" aria-labelledby="actionsDropdownButton">
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100">Mass
                                            Edit
                                        </a>
                                    </li>
                                </ul>
                                <div class="py-1">
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Delete
                                        all</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-900 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-4 py-3">Thumbnail</th>
                                <th scope="col" class="px-4 py-3">Name</th>
                                <th scope="col" class="px-4 py-3">Budget</th>
                                <th scope="col" class="px-4 py-3">Applicants</th>
                                <th scope="col" class="px-4 py-3">Client</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($projects as $project)
                                <tr class="border-b">

                                    <td class="px-4 py-3">
                                        <img src="{{ Storage::url($project->thumbnail) }}" alt="{{ $project->name }}"
                                            class="h-12 aspect-video">
                                    </td>
                                    <td class="px-4 py-3">{{ $project->name }}</td>
                                    <td class="px-4 py-3">{{ number_format($project->budget, 0, ',', '.') }}</td>
                                    <td class="px-4 py-3">{{ $project->applicants->count() }}</td>
                                    <td class="px-4 py-3">{{ $project->owner->name }}</td>

                                    <td class="px-4 py-3">
                                        <a href="{{ route('admin.project.manage', $project->slug) }}"
                                            class="px-4 py-2 text-sm font-medium text-center transition-all duration-300 ease-in-out border rounded-lg border-primary text-primary hover:text-white hover:bg-primary focus:ring-4 focus:outline-none focus:ring-dark_ring">
                                            Manage
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <td colspan="4" class="px-4 py-2 text-center">
                                    No projects data has been added yet
                                </td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
