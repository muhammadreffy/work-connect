<x-app-layout title="Manage Tools Project | Work Connect">


    <x-slot:header>
        @include('components.dashboard.navbar')
    </x-slot:header>


    @include('components.dashboard.sidebar')

    <section class="p-4 mt-16 sm:ml-64">
        <div class="max-w-screen-md px-4 lg:px-0">

            <h2 class="mb-3 text-2xl font-bold">Manage Project Tools</h2>

            <x-toast.success session="successAddTool" />
            <x-toast.warning session="failedAddTool" />

            <x-toast.success session="successRemoveTool" />
            <x-toast.warning session="failedToRemoveTool" />

            <div class="p-6 bg-white rounded-lg shadow-md">

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

                <hr class="my-5">

                <h5 class="mb-2 font-semibold">Add Tools</h5>

                <form action="{{ route('admin.projects.tools-store', $project->slug) }}" method="POST"
                    class="grid grid-cols-12 space-y-3">
                    @csrf
                    <div class="col-span-12">
                        <label for="tool" class="block mb-2 text-sm font-medium text-gray-900">
                            Tools
                        </label>
                        <select name="tool_id" id="tool"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5">
                            <option selected disabled>Choose a tool</option>
                            @foreach ($tools as $tool)
                                <option value="{{ $tool->id }}">{{ $tool->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-span-12">
                        <x-forms.button-submit label="Add tool" />
                    </div>
                </form>
                <hr class="my-5">


                <h5 class="mb-5 font-semibold">Tools</h5>

                <div class="flex flex-col gap-3">
                    @forelse ($project->tools as $tool)
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-x-2">
                                <img src="{{ Storage::url($tool->icon) }}" alt="{{ $tool->name }}"
                                    class="object-cover w-6 h-6 aspect-square">

                                <div class="flex flex-col gap-x-2">
                                    <span class="font-bold">{{ $tool->name }}</span>
                                </div>
                            </div>

                            <button data-modal-target="{{ $tool->pivot->id }}"
                                data-modal-toggle="{{ $tool->pivot->id }}"
                                class="block px-2 py-1 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-500"
                                type="button">
                                <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>

                            <div id="{{ $tool->pivot->id }}" tabindex="-1"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative w-full max-w-md max-h-full p-4">
                                    <div class="relative bg-white rounded-lg shadow">
                                        <button type="button"
                                            class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                            data-modal-hide="{{ $tool->pivot->id }}">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="p-4 text-center md:p-5">
                                            <svg class="w-12 h-12 mx-auto mb-4 text-gray-400 dark:text-gray-200"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                                Are you sure you want to delete this tool?
                                            </h3>
                                            <div class="flex items-center justify-center gap-x-2">
                                                <form
                                                    action="{{ route('admin.project-tools.delete', [
                                                        'projectTool' => $tool->pivot->id,
                                                        'tool' => $tool->pivot->id,
                                                    ]) }}"
                                                    method="POST">

                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" data-modal-hide="{{ $tool->pivot->id }}"
                                                        type="button"
                                                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                        Yes, I'm sure
                                                    </button>
                                                </form>
                                                <button data-modal-hide="{{ $tool->pivot->id }}" type="button"
                                                    class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary focus:z-10 focus:ring-4 focus:ring-gray-100">
                                                    No, cancel
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-sm text-gray-600">
                            No tools have been added to this project yet
                        </p>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
