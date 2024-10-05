<x-app-layout>
    <section class="flex items-center justify-center h-screen">
        <div class="max-w-screen-xl px-4 py-8 mx-auto lg:py-16 lg:px-6">
            <div class="max-w-screen-sm mx-auto text-center">
                <h1 class="mb-4 font-extrabold tracking-tight text-7xl lg:text-9xl text-primary">
                    403
                </h1>
                <p class="mb-4 text-3xl font-bold tracking-tight text-gray-900 md:text-4xl">
                    You are not authorized
                </p>
                <p class="mb-4 text-lg font-light text-gray-500">
                    You do not have permission to access this page
                </p>
                <a href="{{ route('home') }}"
                    class="inline-flex text-white bg-primary hover:bg-hover focus:ring-4 focus:outline-none focus:ring-dark_ring duration-300 transition-all ease-in-out font-medium rounded-lg text-sm px-5 py-2.5 text-center">Back
                    to Homepage
                </a>
            </div>
        </div>
    </section>
</x-app-layout>
