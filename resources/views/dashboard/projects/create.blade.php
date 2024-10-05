<x-app-layout title="Create a new Project | Work Connect">

    <x-slot:header>
        @include('components.dashboard.navbar')
    </x-slot:header>

    @include('components.dashboard.sidebar')

    <section class="p-4 mt-16 sm:ml-64">
        <div class="max-w-2xl p-6 bg-white rounded-lg shadow-md">

            <x-toast.warning session="balanceInsufficient" />


            <div class="flex items-center justify-between">
                <div class="flex items-center gap-x-2">
                    <svg class="text-gray-800 w-14 h-14" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M12 14a3 3 0 0 1 3-3h4a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2h-4a3 3 0 0 1-3-3Zm3-1a1 1 0 1 0 0 2h4v-2h-4Z"
                            clip-rule="evenodd" />
                        <path fill-rule="evenodd"
                            d="M12.293 3.293a1 1 0 0 1 1.414 0L16.414 6h-2.828l-1.293-1.293a1 1 0 0 1 0-1.414ZM12.414 6 9.707 3.293a1 1 0 0 0-1.414 0L5.586 6h6.828ZM4.586 7l-.056.055A2 2 0 0 0 3 9v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2h-4a5 5 0 0 1 0-10h4a2 2 0 0 0-1.53-1.945L17.414 7H4.586Z"
                            clip-rule="evenodd" />
                    </svg>
                    <div>
                        <h5 class="text-sm font-medium text-gray-600">Total Balance</h5>
                        <span class="font-bold">Rp
                            {{ number_format(Auth::user()->wallet->balance, 0, ',', '.') }}
                        </span>
                    </div>
                </div>
            </div>

            <hr class="my-5">

            <h2 class="text-xl font-bold lg:text-2xl">Add a new project</h2>
            <div class="max-w-2xl">
                <form action="{{ route('admin.project.store') }}" method="POST" class="mt-3"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-12 gap-3">
                        <div class="col-span-12">
                            <x-forms.input-text label="Name" name="name" id="name"
                                placeholder="type your new project name" />
                        </div>

                        <div class="col-span-12">
                            <x-forms.input-text type="number" label="Budget" name="budget" id="budget"
                                placeholder="type your new project budget" />
                        </div>

                        <div class="col-span-12">
                            <label for="category" class="block mb-2 text-sm font-medium text-gray-900">
                                Category
                            </label>
                            <select name="category_id" id="category"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5">
                                <option selected disabled>Select a category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="col-span-12">
                            <x-forms.input-text label="About" name="about" id="about"
                                placeholder="type your new project about" />
                        </div>

                        <div class="col-span-12">
                            <label for="skill_level" class="block mb-2 text-sm font-medium text-gray-900">
                                Skill Level
                            </label>
                            <select name="skill_level" id="skill_level"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5">
                                <option selected disabled>Select a choose skill</option>
                                <option value="Beginner">Beginner</option>
                                <option value="Intermediate">Intermediate</option>
                                <option value="Expert">Expert</option>
                            </select>
                        </div>

                        <div class="col-span-12">
                            <x-forms.input-file label="Thumbnail" name="thumbnail"
                                description="Your thumbnail should have a 16:9 ratio and be no larger than 2MB." />
                        </div>

                        <div class="col-span-12">
                            <x-forms.button-submit label="Create" />
                        </div>
                    </div>
                </form>
            </div>
    </section>
</x-app-layout>
