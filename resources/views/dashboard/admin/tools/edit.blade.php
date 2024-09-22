<x-app-layout title="Edit Tool | Work Connect">


    <x-slot:header>
        @include('components.dashboard.navbar')
    </x-slot:header>


    @include('components.dashboard.sidebar')

    <section class="p-4 mt-16 sm:ml-64">

        <h2 class="text-xl font-bold lg:text-2xl">Edit tool</h2>

        <div class="max-w-xl">
            <form action="{{ route('admin.tool.update', $tool->slug) }}" method="POST" class="mt-3"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-12 gap-3">
                    <div class="col-span-12">
                        <x-forms.input-text label="Name" name="name" id="name"
                            placeholder="type your new category" value="{{ $tool->name }}" />
                    </div>

                    <div class="col-span-12">

                        <x-forms.input-file label="Icon" name="icon" value="{{ Storage::url($tool->icon) }}"
                            description="Your profile picture should have a 1:1 ratio and be no larger than 2MB." />


                    </div>

                    <div class="col-span-12">

                        <x-forms.button-submit label="Update Category" />
                    </div>
                </div>
            </form>
        </div>
    </section>
</x-app-layout>
